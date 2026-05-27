<?php

namespace App\Livewire\Forms\Auth;
use Livewire\Component;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Hash;


class UserResPsw extends Component
{
    public $token;
    public $email = '';
    public $password = '';
    public $password_confirmation = '';

    public function mount($token)
    {
        $this->token = $token;
        $this->email = request()->query('email');
    }

    public function submit()
    {
             $this->validate([
            'email' => ['required', 'email'],
            'password' => ['required', 'confirmed', 'min:4', 'max:8'],
        ]);     

        $status = Password::reset(
            [
                'email' => $this->email,
                'password' => $this->password,
                'password_confirmation' => $this->password_confirmation,
                'token' => $this->token,
            ],
            function ($user, $password) {
                $user->forceFill([
                    'password' => Hash::make($password),
                ])->save();
            }
        );

        if ($status === Password::PASSWORD_RESET) {
            $this->dispatch('event-flow', domain: 'reg-auth', type: 'password-reset');
            return $this->redirect('/', navigate: true);
        } else {
            $this->addError('email', 'Ссылка устарела или недействительна');
        }
    }

    public function render()
    {
        return view('livewire.forms.auth.user-res-psw');
    }
}
