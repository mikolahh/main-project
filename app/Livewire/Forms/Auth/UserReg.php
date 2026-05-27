<?php

namespace App\Livewire\Forms\Auth;

use Livewire\Component;
use Livewire\Attributes\Validate;
use App\Models\User;

class UserReg extends Component
{
    #[Validate('required|min:2|max:30')]
    public $name = '';

    #[Validate('required|email|max:255|unique:users,email')]
    public $email = '';

    #[Validate('nullable|regex:/^@[a-zA-Z0-9_]{5,32}$/|max:255|unique:users,tg_link')]
    public $tg_link = '';

    #[Validate('required|string|min:4|max:8|confirmed')]
    public $password = '';

    public $password_confirmation = '';

    public function submit()
    {        
        $valid = $this->validate(); 
        User::create($valid); 
                  
        $this->dispatch('event-flow', domain: 'reg-auth', type: 'registered');
        $this->reset();     
    } 


    public function render()
    {
        return view('livewire.forms.auth.user-reg');
    }
}
