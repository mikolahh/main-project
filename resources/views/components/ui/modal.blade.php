@props([
    'show' => false,
    'close' => null,
    'maxWidth' => 'lg',
])
@php
$maxWidthClasses = match($maxWidth) {
    'sm' => 'max-w-sm',
    'md' => 'max-w-md',
    'lg' => 'max-w-lg',
    'xl' => 'max-w-xl',
    '2xl' => 'max-w-2xl',
    default => 'max-w-lg',
};
@endphp

<div
    x-cloak
    x-show="{{ $show }}"
    class="modal-wrapper"
    >
    {{-- Overlay --}}
    <div
        x-show="{{ $show }}"
        x-transition.opacity.duration.200ms
        class="modal-overlay"
        >
    </div>
    {{-- Modal --}}
    <div
        x-show="{{ $show }}"
        x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0 translate-y-4 scale-95"
        x-transition:enter-end="opacity-100 translate-y-0 scale-100"
        x-transition:leave="transition ease-in duration-200"
        x-transition:leave-start="opacity-100 translate-y-0 scale-100"
        x-transition:leave-end="opacity-0 translate-y-4 scale-95"
        @if($close)
            @click.outside="{{ $close }}"
        @endif
        class="modal-window {{ $maxWidthClasses }}"
        >
        {{-- Close button --}}
        @if($close)
            <button
                type="button"
                @click="{{ $close }}"
                class="button-close button-close--md modal-close"
                >
                <x-lucide-x class="w-5 h-5"/>
            </button>
        @endif
        {{ $slot }}
    </div>
</div>