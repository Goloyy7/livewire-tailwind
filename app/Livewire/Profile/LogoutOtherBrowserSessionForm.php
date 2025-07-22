<?php

namespace App\Livewire\Profile;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Carbon;

class LogoutOtherBrowserSessionForm extends Component
{
    public $password = '';
    public $sessions = [];
    public $confirmingLogout = false;

    public function mount()
    {
        $this->sessions = $this->getSessionsProperty();
    }

    public function getSessionsProperty()
    {
        if (config('session.driver') !== 'database') {
            return collect();
        }

        return collect(
            DB::connection(config('session.connection'))
                ->table(config('session.table', 'sessions'))
                ->where('user_id', Auth::user()->getAuthIdentifier())
                ->orderBy('last_activity', 'desc')
                ->get()
        )->map(function ($session) {
            return (object) [
                'agent' => $this->createAgent($session),
                'ip_address' => $session->ip_address,
                'is_current_device' => $session->id === request()->session()->getId(),
                'last_active' => Carbon::createFromTimestamp($session->last_activity)->diffForHumans(),
            ];
        });
    }

    protected function createAgent($session)
    {
        $userAgent = $session->user_agent;
        return (object) [
            'isDesktop' => !$this->isMobile($userAgent),
            'platform' => $this->getPlatform($userAgent),
            'browser' => $this->getBrowser($userAgent)
        ];
    }

    protected function getBrowser($userAgent)
    {
        $browsers = [
            'Chrome' => '/Chrome/i',
            'Firefox' => '/Firefox/i',
            'Safari' => '/Safari/i',
            'Edge' => '/Edge/i',
            'Opera' => '/Opera|OPR/i',
            'IE' => '/MSIE|Trident/i'
        ];

        foreach ($browsers as $browser => $pattern) {
            if (preg_match($pattern, $userAgent)) {
                return $browser;
            }
        }

        return 'Unknown';
    }

    protected function getPlatform($userAgent)
    {
        $platforms = [
            'Windows' => '/Windows/i',
            'Mac OS' => '/Macintosh|Mac OS X/i',
            'Linux' => '/Linux/i',
            'iOS' => '/iPhone|iPad|iPod/i',
            'Android' => '/Android/i'
        ];

        foreach ($platforms as $platform => $pattern) {
            if (preg_match($pattern, $userAgent)) {
                return $platform;
            }
        }

        return 'Unknown';
    }

    protected function isMobile($userAgent)
    {
        $mobilePatterns = [
            '/Mobile/i',
            '/Android/i',
            '/iPhone/i',
            '/iPad/i',
            '/iPod/i',
            '/webOS/i',
            '/BlackBerry/i'
        ];

        foreach ($mobilePatterns as $pattern) {
            if (preg_match($pattern, $userAgent)) {
                return true;
            }
        }

        return false;
    }

    public function logoutOtherBrowserSessions($password)
    {
        $this->resetErrorBag();

        if (! Hash::check($password, Auth::user()->password)) {
            return $this->addError('password', __('This password does not match our records.'));
        }

        DB::table(config('session.table', 'sessions'))
            ->where('user_id', Auth::user()->getAuthIdentifier())
            ->where('id', '!=', request()->session()->getId())
            ->delete();

        $this->sessions = $this->getSessionsProperty();

        $this->dispatch('other-browser-sessions-logged-out');
    }

    public function render()
    {
        return view('livewire.profile.logout-other-browser-session-form');
    }
}
