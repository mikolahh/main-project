<div class="admin-table-wrapper-container">
    <div
        wire:loading.flex
        wire:target="search,sortBy,gotoPage,nextPage,previousPage"
        class="admin-table-loader"
        >
        <div class="admin-table-loader__content">
            <div class="admin-table-loader__spinner"></div>
            <span>
                Loading...
            </span>
        </div>
    </div>
    <div
        wire:loading.class="admin-table-wrapper--loading"
        wire:target="search,sortBy,gotoPage,nextPage,previousPage"
        class="admin-table-wrapper"
        >
    </div>
    <div class="admin-table-section">
        <div class="admin-table-toolbar">
            <div class="admin-table-toolbar__search">
                <input
                    type="text"
                    wire:model.live.debounce.300ms="search"
                    placeholder="Search users..."
                    class="admin-input"
                >
            </div>
        </div>
        <div class="admin-table-wrapper">
            <div class="admin-table-container">
                <table class="admin-table">
                    <thead class="admin-table__head">
                        <tr class="admin-table__row">                        
                            <x-admin.sortable-header
                                field="id"
                                :sort-field="$sortField"
                                :sort-direction="$sortDirection"
                                >
                                ID
                            </x-admin.sortable-header>
                            <x-admin.sortable-header
                                field="name"
                                :sort-field="$sortField"
                                :sort-direction="$sortDirection"
                                >
                                Name
                            </x-admin.sortable-header>
                            <x-admin.sortable-header
                                field="email"
                                :sort-field="$sortField"
                                :sort-direction="$sortDirection"
                                >
                                Email
                            </x-admin.sortable-header>
                            <x-admin.sortable-header
                                field="role"
                                :sort-field="$sortField"
                                :sort-direction="$sortDirection"
                                >
                                Role                                    
                            </x-admin.sortable-header>
                            <th class="admin-table__th admin-table__th--actions">
                                Actions
                            </th>
                        </tr>
                    </thead>
                    <tbody class="admin-table__body">
                        @forelse($users as $user)
                            <tr class="admin-table__row">
                                <td class="admin-table__cell">
                                    {{ $user->id }}
                                </td>
                                <td class="admin-table__cell">
                                    {{ $user->name }}
                                </td>
                                <td class="admin-table__cell">
                                    {{ $user->email }}
                                </td>
                                <td class="admin-table__cell">
                                    {{ $user->role->label() }}
                                </td>
                                <td class="admin-table__cell">                                   
                                    <div
                                        x-data="{ open: false }"
                                        x-cloak
                                        class="admin-dropdown"
                                        >                                        
                                        <button
                                            type="button"
                                            @click="open = ! open"
                                            class="admin-icon-button"
                                            >
                                            <x-lucide-ellipsis class="admin-icon-button__icon" />
                                        </button>
                                        <div
                                            x-show="open"
                                            @click.outside="open = false"
                                            x-transition
                                            class="admin-dropdown__menu"
                                            >
                                            <button
                                                type="button"
                                                wire:click="openEditModal({{ $user->id }})"
                                                class="admin-dropdown__item"
                                                >
                                                <x-lucide-pencil class="admin-dropdown__icon" />
                                                <span>
                                                    Edit
                                                </span>
                                            </button>
                                            <button
                                                type="button"
                                                class="admin-dropdown__item admin-dropdown__item--danger"
                                                >
                                                <x-lucide-trash-2 class="admin-dropdown__icon" />
                                                <span>
                                                    Delete
                                                </span>
                                            </button>
                                        </div>
                                    </div>                                    
                                </td>
                            </tr>
                        @empty
                            <tr class="admin-table__row">
                                <td colspan="4">
                                    <div class="admin-empty-state">
                                        <div class="admin-empty-state__content">
                                            @if($search)
                                                <h3 class="admin-empty-state__title">
                                                    Nothing found
                                                </h3>
                                                <p class="admin-empty-state__description">
                                                    No users found for
                                                    "<strong>{{ $search }}</strong>".
                                                </p>
                                            @else
                                                <h3 class="admin-empty-state__title">
                                                    No users yet
                                                </h3>
                                                <p class="admin-empty-state__description">
                                                    Users will appear here after registration.
                                                </p>
                                            @endif
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            @endforelse
                    </tbody>
                </table>
            </div>
            @if($users->hasPages())
            <div class="admin-table-pagination">
                {{ $users->links() }}
            </div>
            @endif
        </div>
    </div>    
    <div
        x-data="{
            open: @entangle('showEditModal')
        }"
        >
        <x-ui.modal
            show="open"
            close="open = false"
            maxWidth="2xl"
            >
            <livewire:forms.admin.edit-user
                :user="$editingUser"
                :key="'edit-user-'.$editingUser?->id"
                />
        </x-ui.modal>
    </div>    
</div>


