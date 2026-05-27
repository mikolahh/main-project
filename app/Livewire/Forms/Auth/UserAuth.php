<?php

namespace App\Livewire\Forms\Auth;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\Auth;

use Livewire\Component;

class UserAuth extends Component
{
    #[Validate('required|email|max:255')]
    public $email = '';

    #[Validate('required|string|min:4|max:8')]
    public $password = '';

    public function submit()
    {
        $valid = $this->validate();
        if (Auth::attempt($valid)) {
            // важно: регенерация сессии
            session()->regenerate();
            $this->dispatch('event-flow', domain: 'reg-auth', type: 'authenticated');
            // Создаем событие во всех компонентах livewire
            // $this->dispatch('authChanged');
            $this->reset();
        } else {
            // ошибка авторизации
            $this->addError('email', 'Неверный email или пароль');
            // можно также отправить событие
            $this->dispatch('event-flow', domain: 'reg-auth', type: 'auth-error');
        }
    }


    public function render()
    {
        return view('livewire.forms.auth.user-auth');
    }
}
