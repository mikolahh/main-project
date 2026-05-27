<ul class="desktop-menu">
    <li>
        <a
            href="{{ route('home') }}"
            class="{{ request()->is('/') ? 'menu-item-active' : '' }}"
            >
            Главная
        </a>
    </li>
    {{-- Услуги --}}
    <li
        x-data="{ open: false }"
        x-cloak
        class="menu-dropdown"
        @mouseleave="open = false"
        >
        <div class="menu-dropdown-trigger">
            <a
                href="{{ route('services') }}"
                class="{{ request()->is('uslugi*') ? 'menu-item-active' : '' }}"
                >
                Услуги
            </a>
            <button
                @mouseenter="if(window.matchMedia('(hover:hover)').matches) open = true"
                @click="open = !open"
                :class="{ 'dropdown-open': open }"
                type="button"
                >
                ∨
            </button>
        </div>
        <ul
            x-show="open"
            x-transition
            @click.outside="open = false"
            class="dropdown-menu"
            >
            <li
                x-data="{ open: false }"
                class="submenu-item"
                >
                <div class="submenu-trigger">
                    <a href="{{ route('serviceSites') }}">
                        Разработка сайтов
                    </a>
                    <button
                        @mouseenter="if(window.matchMedia('(hover:hover)').matches) open = true"
                        @click="open = !open"
                        :class="{ 'dropdown-open': open }"
                        type="button"
                        >
                        →
                    </button>
                </div>
                <ul
                    x-show="open"
                    x-transition
                    class="submenu"
                    >
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
    </li>
    <li>
        <a
            href="{{ route('portfolio') }}"
            class="{{ request()->is('portfolio') ? 'menu-item-active' : '' }}"
            >
            Портфолио
        </a>
    </li>
    <li>
        <a
            href="{{ route('about') }}"
            class="{{ request()->is('about') ? 'menu-item-active' : '' }}"
            >
            О компании
        </a>
    </li>    
    {{-- Auth --}}
    @if ($this->user)
        <li class="menu-user">
            <span>
                {{ $this->user->name }}
            </span>
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
            <button @click="$store.uiLayer.openScreen('reg')">
                Регистрация
            </button>
        </li>
        <li>
            <button @click="$store.uiLayer.openScreen('auth')">
                Войти
            </button>
        </li>
    @endif
</ul>