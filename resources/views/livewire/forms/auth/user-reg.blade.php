<div class="modal-content">
    <div class="modal-content__header">
        <h3 class="modal-content__title text-center">
            Регистрация
        </h3>
    </div>
    <div class="modal-content__body">
        <form wire:submit="submit" class="form-stack">
            <div class="form-group">
                <label class="form-label" for="name">Имя</label>
                <input class="form-input" type="text" id="name" wire:model.defer="name">
                @error('name') <span class="form-error">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label class="form-label" for="email">Email</label>
                <input class="form-input" type="email" id="email" wire:model.defer="email">
                @error('email') <span class="form-error">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label class="form-label" for="tg_link">Telegram</label>
                <input class="form-input" type="text" id="tg_link" placeholder="@username" wire:model.defer="tg_link">
                @error('tg_link') <span class="form-error">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label class="form-label" for="password">Пароль</label>
                <input class="form-input" type="password" id="password" wire:model.defer="password">
                @error('password') <span class="form-error">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label class="form-label" for="password_confirmation">Подтверждение</label>
                <input class="form-input" type="password" id="password_confirmation" wire:model.defer="password_confirmation">
                @error('password_confirmation') <span class="form-error">{{ $message }}</span> @enderror
            </div>
            <div class="form-actions">
                <button class="button button--success" type="submit">
                    Зарегистрироваться
                </button>
            </div>            
        </form>
    </div>    
</div>