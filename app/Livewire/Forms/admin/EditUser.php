<?php

namespace App\Livewire\Forms\Admin;

use App\Models\User;
use Livewire\Component;

class EditUser extends Component
{
    public ?User $user = null;
    public string $name = '';
    public string $email = '';

    public function mount(?User $user = null): void
    {
        $this->user = $user;

        if ($user) {
            $this->name = $user->name;
            $this->email = $user->email;
        }
    }

    public function save(): void
    {
        if (!$this->user) {
            return;
        }

        $validated = $this->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email'],
        ]);

        $this->user->update($validated);
        $this->dispatch('user-updated');
    }

    public function render()
    {
        return view('livewire.forms.admin.edit-user');
    }
}
