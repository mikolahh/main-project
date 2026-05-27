<div class="modal-content">
    <div class="modal-content__header">
        <h2 class="modal-content__title">
            Edit User
        </h2>
    </div>
    <div class="modal-content__body">
        <form
            wire:submit="save"
            class="form-stack"
            >
            <div class="form-group">
                <label class="form-label">
                    Name
                </label>
                <input
                    type="text"
                    wire:model.defer="name"
                    class="form-input"
                    >
                @error('name')
                    <div class="form-error">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-group">
                <label class="form-label">
                    Email
                </label>
                <input
                    type="email"
                    wire:model.defer="email"
                    class="form-input"
                    >
                @error('email')
                    <div class="form-error">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-group">
                <label class="form-label">
                    Role
                </label>
                <select
                    wire:model.defer="role"
                    class="form-input"
                    >
                    @foreach(App\Enums\UserRole::cases() as $role)
                        <option value="{{ $role->value }}">
                            {{ $role->label() }}
                        </option>
                    @endforeach
                </select>
                @error('role')
                    <div class="form-error">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-actions">
                <button
                    type="submit"
                    class="button button--primary"
                    wire:loading.attr="disabled"
                    >
                    <span wire:loading.remove>
                        Сохранить
                    </span>
                    <span wire:loading>
                        Сохранение...
                    </span>
                </button>
            </div>
        </form>
    </div>
</div>