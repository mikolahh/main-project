<?php

namespace App\Livewire\Widgets\Tables;
use Livewire\WithPagination;
use Livewire\Attributes\Url;
use Livewire\Attributes\On;
use Livewire\Component;
use App\Models\User;

class UsersTable extends Component
{
    public bool $showEditModal = false;
    public ?User $editingUser = null;

    use WithPagination;
    protected string $paginationTheme = 'tailwind';

    #[Url]
    public string $search = ''; // Даёт: /admin/users?search=john    

    #[Url]
    public string $sortField = 'id'; // Даёт: ?sortField=name

    #[Url]
    public string $sortDirection = 'desc'; // Даёт: ?sortDirection=asc

    public int $perPage = 10;

    // Зачем URL sync настолько важен
    // Потому что:
    // можно делиться ссылками
    // browser back работает правильно
    // refresh не сбрасывает state
    // UX становится production-level

    // Почему perPage пока БЕЗ #[Url]
    // Потому что:
    // это secondary preference
    // позже можно вынести в user settings/session
    // Пока не надо усложнять.

    

    // Добавь reset pagination hook
    // Очень важный момент.
    // Почему это нужно
    // Если пользователь:
    // находится на page=5
    // ввёл search
    // а результатов всего 1 страница —
    // получишь пустую таблицу.
    public function updatingSearch(): void
    {
        $this->resetPage();
    }

    // Позже аналогично: filters, perPage

    // Добавь sort method
    // Это foundation для clickable sortable headers
    // Почему это правильная логика
    // Поведение будет:
    // первый клик → asc
    // второй клик → desc
    // новая колонка → asc
    // Это стандарт UX для admin tables.  
    protected array $sortableFields = [
        'id',
        'name',
        'email',
        'role',
    ];  
    public function sortBy(string $field): void
    {
        if (! in_array($field, $this->sortableFields)) {
            return;
        }
        if ($this->sortField === $field) {
            $this->sortDirection =
                $this->sortDirection === 'asc'
                    ? 'desc'
                    : 'asc';
            return;
        }
        $this->sortField = $field;
        $this->sortDirection = 'asc';
    }

    // Создай computed property
    // Я рекомендую уже сейчас использовать:
    // computed property
    // а не query внутри render()
    // Почему
    // Потому что:
    // cleaner architecture
    // reusable
    // легче расширять
    // проще debugging
    // filters/scopes потом добавляются естественно
    public function getUsersProperty()
    {
        return User::query()
            ->when(
                $this->search,
                function ($query) {

                    $query->where(function ($query) {

                        $query->where('name', 'like', "%{$this->search}%")
                            ->orWhere('email', 'like', "%{$this->search}%");

                    });
                }
            )
            ->orderBy(
                    in_array($this->sortField, $this->sortableFields)
                        ? $this->sortField
                        : 'id',
                    $this->sortDirection === 'asc'
                        ? 'asc'
                        : 'desc'
                )
            ->paginate($this->perPage);
    }

    public function openEditModal(int $userId): void
    {
        $this->editingUser = User::findOrFail($userId);
        $this->showEditModal = true;
    }
    // public function closeEditModal(): void
    // {
    //     $this->reset([
    //         'showEditModal',
    //         'editingUser',
    //     ]);
    // }

    // protected $listeners = [
    //     'close-edit-modal' => 'closeEditModal',
    //     'user-updated' => '$refresh',
    // ];

    // #[On('close-edit-modal')]
    // public function closeEditModal(): void
    // {
    //     $this->showEditModal = false;
    // }

    #[On('user-updated')]
    public function afterUserUpdate(): void
    {
        $this->showEditModal = false;
        $this->editingUser = null;
    }
    
    public function render()
    {
        return view('livewire.widgets.tables.users-table', [
            'users' => $this->users,
        ]);
    }
}
