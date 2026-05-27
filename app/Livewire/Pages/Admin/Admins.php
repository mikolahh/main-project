<?php

namespace App\Livewire\Pages\Admin;
use Livewire\Attributes\Layout;
use Livewire\Component;
use App\Enums\UserRole;

#[Layout('components.layouts.admin')]
class Admins extends BaseAdminPage
{
    public function render()
    {
        return view('livewire.pages.admin.admins');
    }
}
