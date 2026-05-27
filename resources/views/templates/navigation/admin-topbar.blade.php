<header class="admin-topbar">
    <div class="admin-topbar__left">
        {{-- Breadcrumbs placeholder --}}
        <div class="admin-breadcrumbs">
            <span class="admin-breadcrumbs__current">
                {{ str(request()->route()?->getName())
                    ->after('admin.')
                    ->replace('.', ' ')
                    ->title() }}
            </span>
        </div>
    </div>
    <div class="admin-topbar__right">
        <div
            x-data="{ open: false }"
            class="admin-user-menu"
            >
            <button
                @click="open = !open"
                class="admin-user-menu__trigger"
                type="button"
                >
                <div class="admin-user-menu__info">
                    <span class="admin-user-menu__name">
                        {{ auth()->user()->name }}
                    </span>
                    <span class="admin-user-menu__role">
                        {{ auth()->user()->role->label() }}
                    </span>
                </div>
                <svg
                    class="admin-user-menu__icon"
                    xmlns="http://www.w3.org/2000/svg"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke-width="1.5"
                    stroke="currentColor"
                    >
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        d="m19.5 8.25-7.5 7.5-7.5-7.5"
                    />
                </svg>
            </button>
            <div
                x-show="open"
                @click.outside="open = false"
                x-transition
                class="admin-user-menu__dropdown"
                >
                <a
                    href="{{ route('home') }}"
                    class="admin-user-menu__link"
                    >
                    Перейти на сайт
                </a>
                <form
                    method="POST"
                    action=""
                    >
                    @csrf
                    <button
                        type="submit"
                        class="admin-user-menu__logout"
                        >
                        Выход
                    </button>
                </form>
            </div>
        </div>
    </div>
</header>