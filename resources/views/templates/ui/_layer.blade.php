<section x-data x-cloak>
    <!-- overlay-->
    <div
        x-show="$store.uiLayer.open.overlay"
        class="fixed inset-0 bg-black/50 z-30"
    ></div>

    <!-- uiLayer-flow  сообщения о результатах для uiLayer -->
    <div
        x-show="$store.uiLayer.message.show"
        x-on:click="$store.uiLayer.closeModal()"
        x-text="$store.uiLayer.message.text"            
        :class="$store.uiLayer.styles"
        class="absolute w-1/2 top-0 left-0 translate-x-1/2 translate-y-20 z-40 border text-xl text-center px-4 py-2 rounded-xl shadow opacity-80"
    ></div>

    <!-- modals -->
    <x-ui.modal
        show="$store.uiLayer.isOpen('reg')"
        close="$store.uiLayer.closeScreen()"
        maxWidth="lg"
        >
        <livewire:forms.auth.user-reg/>
    </x-ui.modal>
    <x-ui.modal
        show="$store.uiLayer.isOpen('auth')"
        close="$store.uiLayer.closeScreen()"
        maxWidth="lg"
        >
        <livewire:forms.auth.user-auth/>
    </x-ui.modal>
    <x-ui.modal
        show="$store.uiLayer.isOpen('forg_psw')"
        close="$store.uiLayer.closeScreen()"
        maxWidth="lg"
        >
        <livewire:forms.auth.user-forg-psw/>
    </x-ui.modal>
    <x-ui.modal
        show="$store.uiLayer.isOpen('callback')"
        close="$store.uiLayer.closeScreen()"
        maxWidth="lg"
        >
        <livewire:forms.callback/>
    </x-ui.modal>
</section>