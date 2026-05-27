<div class="modal-content">
    <div class="modal-content__header">
        <h3 class="modal-content__title text-center">
            Свяжитесь с нами
        </h3>
    </div>
    <div class="modal-content__body">
        <form wire:submit="submit" class="form-stack">
            <div class="form-group">
                <label class="form-label" for="name">Имя</label>
                <input 
                    class="form-input @error('name') border-red-500 focus:ring-red-500 @enderror"
                    type="text"
                    id="name"
                    wire:model.defer="name"
                    placeholder="Ваше имя"
                >
                @error('name') <span class="form-error">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label class="form-label" for="phone">Телефон</label>
                <input 
                    class="form-input @error('phone') border-red-500 focus:ring-red-500 @enderror"
                    type="text"
                    id="phone"
                    wire:model.defer="phone"
                    placeholder="+375..."
                    >
                @error('phone') <span class="form-error">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label class="form-label" for="text">Сообщение</label>
                <textarea 
                    class="form-input min-h-[100px] resize-none @error('text') border-red-500 focus:ring-red-500 @enderror"
                    id="text"
                    wire:model.defer="text"
                    placeholder="Опишите задачу..."
                ></textarea>
                @error('text') <span class="form-error">{{ $message }}</span> @enderror
            </div>
            <div class="form-actions">
                <button 
                    class="button button--success"
                    type="submit"
                    wire:loading.attr="disabled"
                    >
                    <span wire:loading.remove>Отправить сообщение</span>
                    <span wire:loading>Отправка...</span>
                </button>
            </div>            
        </form>        
    </div>     
</div>