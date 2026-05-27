@props([
    'title',
    'description' => null,
])

<div class="admin-page-header">
    <div class="admin-page-header__content">
        <h1 class="admin-page-header__title">
            {{ $title }}
        </h1>
        @if($description)
            <p class="admin-page-header__description">
                {{ $description }}
            </p>
        @endif
    </div>
    @isset($actions)
        <div class="admin-page-header__actions">
            {{ $actions }}
        </div>
    @endisset
</div>