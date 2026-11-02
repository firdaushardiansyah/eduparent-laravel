<!-- Topbar / Navbar Start -->
<header class="navbar-header" role="banner">
    <div class="page-container topbar-menu px-2 px-sm-3 d-flex align-items-center justify-content-between">
        
        <!-- Left Section: Mobile Button, Logo & Search -->
        <div class="d-flex align-items-center gap-2">

            <!-- Sidebar Mobile Hamburger Button (min 44x44px) -->
            <button id="mobile_btn" class="mobile-btn btn p-0 border-0 d-inline-flex d-lg-none align-items-center justify-content-center"
                    type="button"
                    aria-label="Buka navigasi menu"
                    aria-expanded="false"
                    aria-controls="sidebar"
                    style="min-width: 44px; min-height: 44px; background: transparent;">
                <i class="ti ti-menu-2 fs-24"></i>
            </button>

            <!-- Desktop Toggle Button -->
            <button class="sidenav-toggle-btn btn p-0 d-none d-lg-inline-flex align-items-center justify-content-center" 
                    id="toggle_btn2" 
                    type="button" 
                    aria-label="Kecilkan sidebar"
                    style="min-width: 44px; min-height: 44px;">
                <i class="ti ti-chevron-left-pipe fs-18"></i>
            </button>

            <!-- Mobile Brand Title / Logo -->
            <a href="{{ route('dashboard') }}" class="d-flex d-lg-none align-items-center text-decoration-none">
                <img src="{{ asset('assets/img/logo-small.svg') }}" alt="EduParent" height="32" class="me-1">
                <span class="fw-bold fs-15 text-dark d-none d-sm-inline">EduParent</span>
            </a>

            <!-- Search (Desktop) -->
            <div class="header-search d-none d-lg-flex align-items-center ms-2">
                <div class="input-icon-start position-relative">
                    <span class="input-icon-addon">
                        <i class="ti ti-search"></i>
                    </span>
                    <input type="text" class="form-control" placeholder="Cari siswa, modul..." aria-label="Cari">
                </div>
            </div>

        </div>

        <!-- Right Section: Actions & User Dropdown -->
        <div class="d-flex align-items-center gap-1 gap-sm-2">

            <!-- Mobile Search Trigger Button -->
            <button class="topbar-link btn btn-icon d-flex d-lg-none align-items-center justify-content-center" 
                    data-bs-toggle="modal" 
                    data-bs-target="#searchModal" 
                    type="button"
                    aria-label="Buka pencarian"
                    style="min-width: 44px; min-height: 44px;">
                <i class="ti ti-search fs-18"></i>
            </button>

            <!-- Full Screen Toggle -->
            <button class="topbar-link btn btn-icon d-none d-sm-inline-flex align-items-center justify-content-center" 
                    id="btnFullscreen" 
                    type="button"
                    aria-label="Mode layar penuh"
                    style="min-width: 44px; min-height: 44px;">
                <i class="ti ti-maximize fs-18"></i>
            </button>

            <!-- Light/Dark Mode Switcher -->
            <button class="topbar-link btn btn-icon d-none d-sm-inline-flex align-items-center justify-content-center" 
                    id="light-dark-mode" 
                    type="button"
                    aria-label="Ubah tema terang/gelap"
                    style="min-width: 44px; min-height: 44px;">
                <i class="ti ti-moon fs-18"></i>
            </button>

            <!-- User Dropdown Menu -->
            <div class="dropdown">
                <button class="topbar-link btn p-1 border-0 d-flex align-items-center dropdown-toggle drop-arrow-none" 
                        data-bs-toggle="dropdown" 
                        type="button" 
                        aria-expanded="false"
                        aria-label="Menu akun pengguna"
                        style="min-width: 44px; min-height: 44px;">
                    <img src="{{ asset('assets/img/users/avatar-2.jpg') }}" alt="Avatar" class="avatar-sm rounded-circle border">
                    <span class="d-none d-md-inline-block ms-2 text-start">
                        <span class="d-block fs-13 fw-semibold text-dark text-truncate" style="max-width: 110px;">
                            {{ auth()->user()->name ?? 'Admin User' }}
                        </span>
                        <span class="d-block fs-11 text-muted text-capitalize">
                            {{ auth()->user()->role ?? 'Administrator' }}
                        </span>
                    </span>
                    <i class="ti ti-chevron-down fs-12 ms-1 text-muted d-none d-md-inline-block"></i>
                </button>

                <div class="dropdown-menu dropdown-menu-end shadow-sm mt-2 py-2" style="min-width: 200px; max-width: 280px;">
                    <div class="px-3 py-2 border-bottom">
                        <h6 class="fs-14 fw-semibold mb-0 text-truncate">{{ auth()->user()->name ?? 'Admin User' }}</h6>
                        <small class="text-muted text-truncate d-block">{{ auth()->user()->email ?? 'admin@eduparent.test' }}</small>
                    </div>

                    <a class="dropdown-item py-2 d-flex align-items-center" href="{{ route('dashboard') }}">
                        <i class="ti ti-layout-dashboard me-2 fs-16 text-muted"></i>Dashboard
                    </a>
                    
                    @if (Route::has('layout-check') && app()->environment('local'))
                        <a class="dropdown-item py-2 d-flex align-items-center text-primary" href="{{ route('layout-check') }}">
                            <i class="ti ti-device-desktop-analytics me-2 fs-16"></i>Layout Check
                        </a>
                    @endif

                    <div class="dropdown-divider my-1"></div>

                    <!-- Logout Form (POST with @csrf) -->
                    <form action="{{ route('logout') }}" method="POST" class="m-0 p-0">
                        @csrf
                        <button type="submit" class="dropdown-item py-2 text-danger d-flex align-items-center w-100 border-0 bg-transparent" style="cursor: pointer;">
                            <i class="ti ti-logout-2 me-2 fs-16"></i>Keluar
                        </button>
                    </form>
                </div>
            </div>

        </div>

    </div>
</header>
<!-- Topbar / Navbar End -->

