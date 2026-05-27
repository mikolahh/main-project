<?php

namespace App\Livewire\Forms\Admin;

use App\Models\User;
use Livewire\Component;
use App\Enums\UserRole;

class EditUser extends Component
{
    public ?User $user = null;
    public string $name = '';
    public string $email = '';
    public int $role = 1;

    public function mount(?User $user = null): void
    {
        $this->user = $user;

        if ($user) {
            $this->name = $user->name;
            $this->email = $user->email;
            $this->role = $user->role->value;
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
            'role' => ['required', 'integer'],
        ]);

        $this->user->update([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'role' => $validated['role'],
        ]);
        $this->dispatch('user-updated');
        // $this->dispatch('close-edit-modal');
    }

    public function render()
    {
        return view('livewire.forms.admin.edit-user');
    }
}
