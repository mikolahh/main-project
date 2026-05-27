<div class="modal-content">
    <div class="modal-content__body">
        <form wire:submit="submit" class="form-stack">
            <div class="form-group">
                <label class="form-label" for="email">Email</label>
                <input 
                    class="form-input @error('email') border-red-500 focus:ring-red-500 @enderror"
                    type="email"
                    id="email"
                    wire:model.defer="email"
                    placeholder="example@email.com"
                >
                @error('email') <span class="form-error">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label class="form-label" for="password">Новый пароль</label>
                <input 
                    class="form-input @error('password') border-red-500 focus:ring-red-500 @enderror"
                    type="password"
                    id="password"
                    wire:model.defer="password"
                    placeholder="••••••"
                >
                @error('password') <span class="form-error">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label class="form-label" for="password_confirmation">
                    Подтверждение пароля
                </label>
                <input 
                    class="form-input @error('password_confirmation') border-red-500 focus:ring-red-500 @enderror"
                    type="password"
                    id="password_confirmation"
                    wire:model.defer="password_confirmation"
                    placeholder="••••••"
                >
                @error('password_confirmation') <span class="form-error">{{ $message }}</span> @enderror
            </div>
            <div class="form-actions">
                <button 
                    class="button button--success disabled:opacity-50"
                    type="submit"
                    wire:loading.attr="disabled"
                    >
                    <span wire:loading.remove>Сбросить пароль</span>
                    <span wire:loading>Сохранение...</span>
                </button>
            </div>            
        </form>
    </div>    
</div>