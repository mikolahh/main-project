<?php

namespace App\Livewire\Widgets;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\Attributes\On;

class Header extends Component
{
    // При совершении события authChanged происходит вызов  refreshMenu()
    #[On('authChanged')]
    public function anyMethodName()
    {
        // просто триггер рендера
    }

    public function getUserProperty()
    {
        return Auth::user();
    }
     public function logout()
    {
        Auth::logout();
        session()->invalidate();
        session()->regenerateToken();
        $this->dispatch('event-flow', domain: 'reg-auth', type: 'logout');        
    }

    public function render()
    {
        return view('livewire.widgets.header');
    }
}
