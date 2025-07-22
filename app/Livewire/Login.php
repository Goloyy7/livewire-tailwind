<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\WebSetting;

class Login extends Component
{
    public $email;
    public $password;

    protected $rules = [
        'email' => 'required|email',
        'password' => 'required',
    ];

    public function render()
    {
        $websiteSettings = WebSetting::first();
        return view('livewire.auth.login')
            ->layout('layouts.authentication')
             ->with([
                'currentLogo' => $this->getCurrentLogo(),
                'websiteSettings' => $websiteSettings,
            ]);;
    }

    public function login()
    {
        $this->validate();

        if (Auth::attempt(['email' => $this->email, 'password' => $this->password])) {
            return redirect()->route('dashboard');
        } else {
            session()->flash('error', 'Alamat Email atau Password Anda salah!.');
            return redirect()->route('login');
        }
    }

        public function getCurrentLogo()
    {
        $websiteSettings = WebSetting::first();
        if (!$websiteSettings || empty($websiteSettings->getLogo())) {
            return asset('images/default-logo.png');
        }
        return asset('storage/' . $websiteSettings->getLogo());
    }
}
