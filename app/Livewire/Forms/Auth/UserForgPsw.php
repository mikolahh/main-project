<?php

namespace App\Livewire\Forms\Auth;

use Livewire\Component;
use Illuminate\Support\Facades\Password;
use Livewire\Attributes\Validate;

class UserForgPsw extends Component
{
    #[Validate('required|email|max:255')]
    public $email = '';

    public function submit()
    {
       $email = $this->validate()['email'];

        $status = Password::sendResetLink([
            'email' => $email
        ]);

        if ($status === Password::RESET_LINK_SENT) {
            $this->dispatch('event-flow', domain: 'reg-auth', type: 'reset-link-sent');
        } else {
            $this->addError('email', 'Email не найден');
        }
    }

    public function render()
    {
        return view('livewire.forms.auth.user-forg-psw');
    }
}
