@props([
    'show' => false
])
<div
    x-show="{{ $show }}"
    x-transition:enter="transition ease-out duration-300"
    x-transition:enter-start="opacity-0 scale-95"
    x-transition:enter-end="opacity-100 scale-100"
    x-transition:leave="transition ease-in duration-200"
    x-transition:leave-start="opacity-100 scale-100"
    x-transition:leave-end="opacity-0 scale-95"
    class="fixed inset-0 flex items-center justify-center z-40"
    >
    <div        
        @click.outside="$store.uiLayer.closeScreen()"        
        class="bg-white rounded-2xl shadow-2xl p-6 w-full max-w-lg relative"
        >
        <!-- Крестик -->
        <button 
            @click="$store.uiLayer.closeScreen()"
            class="absolute top-4 right-4 text-2xl text-gray-400 hover:text-red-500"
            >
            &times;
        </button>
        {{ $slot }}
    </div>
</div>