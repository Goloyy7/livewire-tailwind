<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\WebSetting;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class Settings extends Component
{
    use WithFileUploads;

    public $name;
    public $newLogo;
    public $currentLogo;
    public $websiteSettings;
    public $tempLogoPath;
    public $previewLogo;

    protected $rules = [
        'name' => 'required|string|max:255',
        'newLogo' => 'nullable|image|max:2048', // 2MB Max
    ];

    public function mount()
    {
        $this->websiteSettings = WebSetting::first() ?? WebSetting::create(['name' => '', 'logo' => '']);
        $this->name = $this->websiteSettings->getName();
        $this->currentLogo = $this->getLogoUrl($this->websiteSettings->getLogo());
        $this->previewLogo = $this->currentLogo;
    }

    protected function getLogoUrl($path)
    {
        if (!$path) {
            return asset('images/default-logo.png');
        }
        return asset('storage/' . $path);
    }

    public function updatedNewLogo()
    {
        $this->validate([
            'newLogo' => 'required|image|max:2048',
        ]);

        try {
            // Store the new logo temporarily
            $this->tempLogoPath = $this->newLogo->store('temp-logos', 'public');
            
            // Update preview
            $this->previewLogo = asset('storage/' . $this->tempLogoPath);
            
            // Reset the file input
            $this->reset('newLogo');
        } catch (\Exception $e) {
            $this->addError('newLogo', 'Failed to upload logo: ' . $e->getMessage());
        }
    }

    public function updateSettings()
    {
        $this->validate();

        try {
            DB::beginTransaction();

            if (!$this->websiteSettings) {
                $this->websiteSettings = new WebSetting();
            }

            // Update name
            $this->websiteSettings->setName($this->name);

            // Update logo if a new one was uploaded
            if ($this->tempLogoPath) {
                // Delete old logo if exists
                if ($this->websiteSettings->getLogo()) {
                    Storage::disk('public')->delete($this->websiteSettings->getLogo());
                }

                // Move temp logo to permanent location
                $permanentPath = 'logos/' . basename($this->tempLogoPath);
                Storage::disk('public')->move($this->tempLogoPath, $permanentPath);
                
                $this->websiteSettings->setLogo($permanentPath);
                $this->currentLogo = $this->getLogoUrl($permanentPath);
                $this->previewLogo = $this->currentLogo;
                $this->tempLogoPath = null;
            }

            $this->websiteSettings->save();
            
            DB::commit();
            $this->dispatch('settings-updated');
            
            // Force a complete page reload to update title and favicon
            $this->redirect(request()->header('Referer'), navigate: false);
        } catch (\Exception $e) {
            DB::rollBack();
            
            // Clean up temp file if exists
            if ($this->tempLogoPath) {
                Storage::disk('public')->delete($this->tempLogoPath);
            }
            throw $e;
        }
    }

    public function render()
    {
        return view('livewire.settings');
    }
}
