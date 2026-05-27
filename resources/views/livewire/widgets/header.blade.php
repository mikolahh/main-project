<header class="site-header">
    <div class="my-container">
        <nav class="header-nav">
            {{-- Логотип --}}
            <a
                href="{{ route('home') }}"
                class="header-logo"
                aria-label="Главная"
                >
            </a>
            {{-- Desktop --}}
            @include('templates.navigation.desktop-menu')
            {{-- Mobile --}}
            @include('templates.navigation.mobile-menu')
        </nav>
    </div>
</header>