<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class LogoutOtherBrowserSessionsForm extends Component
{
    public $password = '';
    public $confirmingLogout = false;

    protected $rules = [
        'password' => ['required', 'string', 'current_password'],
    ];

    public function confirmLogout()
    {
        $this->confirmingLogout = true;
    }

    public function logoutOtherBrowserSessions()
    {
        $this->validate();

        Auth::logoutOtherDevices($this->password);

        $this->deleteOtherSessionRecords();

        $this->confirmingLogout = false;
        $this->reset('password');
        $this->dispatch('logout-other-browser-sessions');
    }

    protected function deleteOtherSessionRecords()
    {
        if (config('session.driver') !== 'database') {
            return;
        }

        DB::connection(config('session.connection'))->table(config('session.table', 'sessions'))
            ->where('user_id', Auth::user()->getAuthIdentifier())
            ->where('id', '!=', request()->session()->getId())
            ->delete();
    }

    public function render()
    {
        return view('livewire.profile.logout-other-browser-sessions-form');
    }
}
