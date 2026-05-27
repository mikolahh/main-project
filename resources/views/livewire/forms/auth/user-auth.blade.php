<div class="modal-content">
    <div class="modal-content__header">
        <h3 class="modal-content__title text-center">Вход</h3>
    </div>
    <div class="modal-content__body">
        <form wire:submit="submit" class="form-stack">
            <div class="form-group">
                <label class="form-label" for="email">Email</label>
                <input 
                    class="form-input" 
                    type="email" 
                    id="email"
                    wire:model.defer="email"
                    placeholder="example@email.com"
                >
                @error('email') <span class="form-error">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label class="form-label" for="password">Пароль</label>
                <input 
                    class="form-input" 
                    type="password" 
                    id="password"
                    wire:model.defer="password"
                    placeholder="••••••"
                >
                @error('password') <span class="form-error">{{ $message }}</span> @enderror
            </div>            
            <div class="form-actions">
                <button class="button button--success" type="submit">
                    Войти
                </button>
            </div>            
        </form>        
    </div>
    <div class="modal-content__footer text-end">
        <button 
            type="button"
            @click="$store.uiLayer.openScreen('forg_psw')"
            class="button-link"
            >
            Забыли пароль?
        </button>
    </div>    
</div>