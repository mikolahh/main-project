<?php

namespace App\View\Components\Admin;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class SortableHeader extends Component
{
    public function __construct(
        public string $field,
        public string $sortField,
        public string $sortDirection,
    ) {}

    public function isActive(): bool
    {
        return $this->field === $this->sortField;
    }

    public function isAsc(): bool
    {
        return $this->sortDirection === 'asc';
    }

    public function render(): View|Closure|string
    {
        return view('components.admin.sortable-header');
    }
}