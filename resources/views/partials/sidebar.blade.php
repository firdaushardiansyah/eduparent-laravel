<!-- Sidenav Menu Start -->
<aside class="sidebar" id="sidebar" aria-label="Sidebar Navigation">

    <!-- Start Logo -->
    <div class="sidebar-logo d-flex align-items-center justify-content-between">
        <div>
            <!-- Logo Normal -->
            <a href="{{ route('dashboard') }}" class="logo logo-normal" aria-label="EduParent Beranda">
                <img src="{{ asset('assets/img/logo.svg') }}" alt="EduParent Logo" height="32">
            </a>

            <!-- Logo Small -->
            <a href="{{ route('dashboard') }}" class="logo-small" aria-label="EduParent Beranda">
                <img src="{{ asset('assets/img/logo-small.svg') }}" alt="EduParent Small Logo" height="28">
            </a>

            <!-- Logo Dark -->
            <a href="{{ route('dashboard') }}" class="dark-logo" aria-label="EduParent Beranda">
                <img src="{{ asset('assets/img/logo-white.svg') }}" alt="EduParent Dark Logo" height="32">
            </a>
        </div>
        <button class="sidenav-toggle-btn btn p-0 d-none d-lg-inline-flex" id="toggle_btn" type="button" aria-label="Toggle Sidenav Mini">
            <i class="ti ti-chevron-left-pipe fs-18"></i>
        </button>

        <!-- Sidebar Menu Close (Mobile) -->
        <button class="sidebar-close btn btn-sm p-0 d-lg-none" type="button" aria-label="Tutup Menu Sidebar">
            <i class="ti ti-x align-middle fs-20"></i>
        </button>
    </div>
    <!-- End Logo -->

    <!-- Sidenav Menu -->
    <div class="sidebar-inner" data-simplebar>
        <div id="sidebar-menu" class="sidebar-menu">
            <ul>
                @php
                    $currentRole = auth()->check() ? auth()->user()->role->value : null;
                    $menuGroups = config('menu.items', []);
                @endphp

                @foreach ($menuGroups as $group)
                    @php
                        // Filter menu items by role and environment
                        $allowedMenus = array_filter($group['menus'] ?? [], function ($item) use ($currentRole) {
                            if (isset($item['env']) && !in_array(app()->environment(), (array) $item['env'])) {
                                return false;
                            }
                            if (isset($item['roles']) && !in_array($currentRole, (array) $item['roles'])) {
                                return false;
                            }
                            return true;
                        });
                    @endphp

                    @if (count($allowedMenus) > 0)
                        <li class="menu-title"><span>{{ $group['header'] }}</span></li>
                        <li>
                            <ul>
                                @foreach ($allowedMenus as $menu)
                                    @php
                                        $routeExists = Route::has($menu['route']);
                                        $url = $routeExists ? route($menu['route']) : url($menu['route']);
                                        $isActive = $routeExists && request()->routeIs($menu['route']);
                                    @endphp
                                    <li class="{{ $isActive ? 'active' : '' }}">
                                        <a href="{{ $url }}" class="{{ $isActive ? 'active' : '' }}" style="min-height: 44px; display: flex; align-items: center;">
                                            <i class="{{ $menu['icon'] }}"></i><span>{{ $menu['label'] }}</span>
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </li>
                    @endif
                @endforeach
            </ul>
        </div>

        {{-- Sidebar Footer / User Profile & Logout --}}
        <div class="sidebar-footer">
            <div class="bg-light p-2 rounded d-flex align-items-center mb-2">
                <div class="avatar avatar-md me-2 flex-shrink-0">
                    <img src="{{ asset('assets/img/users/avatar-2.jpg') }}" alt="User Avatar" class="rounded-circle">
                </div>
                <div class="overflow-hidden">
                    <h6 class="fs-14 fw-semibold mb-0 text-truncate">{{ auth()->user()->name ?? 'Admin User' }}</h6>
                    <p class="fs-12 text-muted mb-0 text-truncate">{{ auth()->user()->email ?? 'admin@eduparent.test' }}</p>
                </div>
            </div>

            <!-- Logout via Form POST with @csrf -->
            <form action="{{ route('logout') }}" method="POST" class="d-block w-100">
                @csrf
                <button type="submit" class="btn btn-danger w-100 d-inline-flex align-items-center justify-content-center" style="min-height: 44px;">
                    <i class="ti ti-logout-2 me-1"></i>Keluar
                </button>
            </form>
        </div>
    </div>

</aside>
<!-- Sidenav Menu End -->
