<aside class="admin-sidebar">
    <nav class="admin-nav">
        <ul class="admin-nav__list">
            <li class="admin-nav__item">
                <a
                    href="{{ route('admin.dashboard') }}"
                    class="admin-sidebar__link {{ request()->routeIs('admin.dashboard') ? 'admin-sidebar__link--active' : '' }}"
                    >
                    <x-lucide-layout-dashboard class="admin-sidebar__icon" />
                    <span>
                        Dashboard
                    </span>
                </a>
            </li>
            @if(auth()->user()->role->isAdmin())
                <li class="admin-nav__item">
                    <a
                        href="{{ route('admin.users') }}"
                        class="admin-sidebar__link {{ request()->routeIs('admin.users') ? 'admin-sidebar__link--active' : '' }}"
                        >
                        <x-lucide-users class="admin-sidebar__icon" />
                        <span>
                            Users
                        </span>
                    </a>
                </li>
            @endif
            @if(auth()->user()->isOwner())
                <li class="admin-nav__item">
                    <a
                        href="{{ route('admin.admins') }}"
                        class="admin-sidebar__link {{ request()->routeIs('admin.admins') ? 'admin-sidebar__link--active' : '' }}"
                        >
                        <x-lucide-shield class="admin-sidebar__icon" />
                        <span>
                            Admins
                        </span>
                    </a>
                </li>
            @endif
        </ul>
    </nav>
</aside>