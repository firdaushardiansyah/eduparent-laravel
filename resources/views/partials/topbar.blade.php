<!-- Topbar Start -->
<header class="navbar-header">
    <div class="page-container topbar-menu">
        <div class="d-flex align-items-center gap-2">

            <!-- Logo -->
            <a href="{{ route('dashboard') }}" class="logo">
                <!-- Logo Normal -->
                <span class="logo-light">
                    <span class="logo-lg"><img src="{{ asset('assets/img/logo.svg') }}" alt="EduParent Logo"></span>
                    <span class="logo-sm"><img src="{{ asset('assets/img/logo-small.svg') }}" alt="EduParent Small Logo"></span>
                </span>

                <!-- Logo Dark -->
                <span class="logo-dark">
                    <span class="logo-lg"><img src="{{ asset('assets/img/logo-white.svg') }}" alt="EduParent Dark Logo"></span>
                </span>
            </a>

            <!-- Sidebar Mobile Button -->
            <a id="mobile_btn" class="mobile-btn" href="#sidebar">
                <i class="ti ti-menu-deep fs-24"></i>
            </a>

            <button class="sidenav-toggle-btn btn p-0" id="toggle_btn2">
                <i class="ti ti-chevron-left-pipe"></i>
            </button>

            <!-- Search -->
            <div class="me-auto d-flex align-items-center header-search d-lg-flex d-none">
                <div class="input-icon-start position-relative">
                    <span class="input-icon-addon">
                        <i class="ti ti-search"></i>
                    </span>
                    <input type="text" class="form-control" placeholder="Search Keyword">
                    <span class="input-icon-addon text-dark fs-18 d-inline-flex p-0 header-search-icon"><i class="ti ti-command"></i></span>
                </div>
            </div>

        </div>

        <div class="d-flex align-items-center">

            <!-- Search for Mobile -->
            <div class="header-item d-flex d-lg-none me-2">
                <button class="topbar-link btn btn-icon" data-bs-toggle="modal" data-bs-target="#searchModal" type="button">
                    <i class="ti ti-search fs-16"></i>
                </button>
            </div>

            <!-- Full Screen -->
            <div class="header-item">
                <div class="me-2">
                    <a href="javascript:void(0);" class="btn topbar-link" id="btnFullscreen"><i class="ti ti-maximize fs-16"></i></a>
                </div>
            </div>

            <!-- Light/Dark Mode Button -->
            <div class="header-item d-none d-sm-flex me-2">
                <button class="topbar-link btn btn-icon topbar-link" id="light-dark-mode" type="button">
                    <i class="ti ti-moon fs-16"></i>
                </button>
            </div>

            <!-- Notification Dropdown -->
            <div class="header-item">
                <div class="dropdown me-2">
                    <button class="topbar-link btn btn-icon topbar-link dropdown-toggle drop-arrow-none" data-bs-toggle="dropdown" data-bs-offset="0,24" type="button" aria-haspopup="false" aria-expanded="false">
                        <i class="ti ti-bell fs-16 animate-ring fs-16"></i>
                        <span class="notification-badge"></span>
                    </button>

                    <div class="dropdown-menu p-0 dropdown-menu-end dropdown-menu-lg" style="min-height: 300px;">
                        <div class="p-2 border-bottom">
                            <div class="row align-items-center">
                                <div class="col">
                                    <h6 class="m-0 fs-16 fw-semibold"> Notifications</h6>
                                </div>
                            </div>
                        </div>

                        <!-- Notification Body -->
                        <div class="notification-body position-relative z-2 rounded-0" data-simplebar>
                            <div class="dropdown-item notification-item py-3 text-wrap border-bottom" id="notification-1">
                                <div class="d-flex">
                                    <div class="me-2 position-relative flex-shrink-0">
                                        <img src="{{ asset('assets/img/users/avatar-2.jpg') }}" class="avatar-md rounded-circle" alt="">
                                    </div>
                                    <div class="flex-grow-1">
                                        <p class="mb-0 fw-medium text-dark">System</p>
                                        <p class="mb-1 text-wrap">No new notifications</p>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <span class="fs-12"><i class="ti ti-clock me-1"></i>Just now</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- View All-->
                        <div class="p-2 rounded-bottom border-top text-center">
                            <a href="#" class="text-center text-decoration-underline fs-14 mb-0">
                                View All Notifications
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Settings -->
            <div class="header-item">
                <div>
                    <a href="#" class="btn topbar-link"><i class="ti ti-settings fs-16"></i></a>
                </div>
            </div>

        </div>
    </div>
</header>
<!-- Topbar End -->
