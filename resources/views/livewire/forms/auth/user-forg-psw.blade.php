<div class="modal-content">
    <div class="modal-content__header">
        <h3 class="modal-content__title text-center">
        Восстановление доступа
        </h3>
        <p class="text-sm text-gray-500 text-center mt-2">
            Введите email, указанный при регистрации. Мы отправим ссылку для сброса пароля.
        </p>
    </div>
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
            <div class="form-actions">
                <button class="button button--success" type="submit">
                    Отправить ссылку
                </button>
            </div>            
        </form>
    </div>
    <div class="modal-content__footer text-start">
        <button 
            type="button"
            @click="$store.uiLayer.openScreen('auth')"
            class="button-link"
            >
            ← Вернуться ко входу
        </button>
    </div>    
</div>
