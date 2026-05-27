<div
    x-data="mobileMenu"
    x-cloak
    class="md:hidden"
    >
    {{-- Burger --}}
    <button
        @click="openMenu()"
        class="burger-btn"
        >
        <span></span>
        <span></span>
        <span></span>
    </button>
    {{-- Overlay --}}
    <div
        x-show="open"       
        class="mobile-overlay"
        >
        {{-- Close --}}
        <button
            @click="closeMenu()"
            class="mobile-close"
            >
            &times;
        </button>
        {{-- Screens --}}
        <div class="mobile-screen-wrapper">
            {{-- MAIN --}}
            <div
                x-show="screen === 'main'"
                x-transition:enter="transition-transform duration-300"
                x-transition:enter-start="translate-x-full"
                x-transition:enter-end="translate-x-0"
                x-transition:leave="transition-transform duration-300"
                x-transition:leave-start="translate-y-0"
                x-transition:leave-end="translate-y-full"
                class="mobile-screen"
                >
                <ul class="mobile-list">
                    <li>
                        <a href="{{ route('home') }}">
                            Главная
                        </a>
                    </li>
                    <li class="mobile-row">
                        <a href="{{ route('services') }}">
                            Услуги
                        </a>
                        <button
                            @click="show('services')"
                        >
                            →
                        </button>
                    </li>
                    <li>
                        <a href="{{ route('portfolio') }}">
                            Портфолио
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('about') }}">
                            О компании
                        </a>
                    </li>                    
                    @if ($this->user)
                        <li class="mobile-user">
                            {{ $this->user->name }}
                        </li>
                        @if($this->user->role->isAdmin())
                        <li>
                            <a href="{{ route('admin.dashboard') }}">
                                Админпанель
                            </a>
                        </li>
                        @endif
                        <li>
                            <button wire:click="logout">
                                Выход
                            </button>
                        </li>
                    @else
                        <li>
                            <button
                                @click="$store.uiLayer.openScreen('reg')"
                            >
                                Регистрация
                            </button>
                        </li>
                        <li>
                            <button
                                @click="$store.uiLayer.openScreen('auth')"
                            >
                                Войти
                            </button>
                        </li>
                    @endif
                </ul>
            </div>
            {{-- SERVICES --}}
            <div
                x-show="screen === 'services'"
                x-transition:enter="transition-transform duration-300"
                x-transition:enter-start="translate-x-full"
                x-transition:enter-end="translate-x-0"
                x-transition:leave="transition-transform duration-300"
                x-transition:leave-start="translate-y-0"
                x-transition:leave-end="translate-y-full" 
                class="mobile-screen"
                >
                <button
                    @click="show('main')"
                    class="mobile-back"
                    >
                    ← Услуги
                </button>
                <ul class="mobile-list">
                    <li class="mobile-row">
                        <a href="{{ route('serviceSites') }}">
                            Разработка сайтов
                        </a>
                        <button
                            @click="show('sites')"
                            >
                            →
                        </button>
                    </li>
                    <li>
                        <a href="{{ route('serviceBots') }}">
                            Чат-боты
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('serviceCont') }}">
                            Контекстная реклама
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('serviceParsing') }}">
                            Парсинг
                        </a>
                    </li>
                </ul>
            </div>
            {{-- SITES --}}
            <div
                x-show="screen === 'sites'"
                x-transition:enter="transition-transform duration-300"
                x-transition:enter-start="translate-x-full"
                x-transition:enter-end="translate-x-0"
                x-transition:leave="transition-transform duration-300"
                x-transition:leave-start="translate-y-0"
                x-transition:leave-end="translate-y-full"     
                class="mobile-screen"
                >
                <button
                    @click="show('services')"
                    class="mobile-back"
                >
                    ← Разработка сайтов
                </button>
                <ul class="mobile-list">
                    <li>
                        <a href="{{ route('serviceLanding') }}">
                            Лендинг
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('serviceCutaway') }}">
                            Визитка
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('serviceCatalog') }}">
                            Каталог
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>