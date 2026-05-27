<?php

namespace App\Livewire\Pages\Admin;
use Livewire\Attributes\Layout;
use Livewire\Component;
use App\Enums\UserRole;

#[Layout('components.layouts.admin')]
class Users extends BaseAdminPage
{
    public function render()
    {
        return view('livewire.pages.admin.users');
    }
}
