<section class="my-container"
        x-data
    >
    <!-- Кнопка для открытия окна callback пользовательского итерфейса -->
    <div class="form-actions">
        <button 
            x-on:click="$store.uiLayer.openScreen('callback')"
            class="button button--success"
            >
            Связаться с нами
        </button>  
    </div>              
</section>