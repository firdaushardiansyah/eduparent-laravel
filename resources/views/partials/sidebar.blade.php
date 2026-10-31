<!-- Sidenav Menu Start -->
<div class="sidebar" id="sidebar">

    <!-- Start Logo -->
    <div class="sidebar-logo">
        <div>
            <!-- Logo Normal -->
            <a href="{{ route('dashboard') }}" class="logo logo-normal">
                <img src="{{ asset('assets/img/logo.svg') }}" alt="EduParent Logo">
            </a>

            <!-- Logo Small -->
            <a href="{{ route('dashboard') }}" class="logo-small">
                <img src="{{ asset('assets/img/logo-small.svg') }}" alt="EduParent Logo">
            </a>

            <!-- Logo Dark -->
            <a href="{{ route('dashboard') }}" class="dark-logo">
                <img src="{{ asset('assets/img/logo-white.svg') }}" alt="EduParent Logo">
            </a>
        </div>
        <button class="sidenav-toggle-btn btn p-0" id="toggle_btn">
            <i class="ti ti-chevron-left-pipe"></i>
        </button>

        <!-- Sidebar Menu Close -->
        <button class="sidebar-close">
            <i class="ti ti-x align-middle"></i>
        </button>
    </div>
    <!-- End Logo -->

    <!-- Sidenav Menu -->
    <div class="sidebar-inner" data-simplebar>
        <div id="sidebar-menu" class="sidebar-menu">
            <ul>
                {{-- ===== Main Menu ===== --}}
                <li class="menu-title"><span>Main Menu</span></li>
                <li>
                    <ul>
                        <li class="{{ request()->routeIs('dashboard') ? 'active' : '' }}">
                            <a href="{{ route('dashboard') }}" class="{{ request()->routeIs('dashboard') ? 'active' : '' }}">
                                <i class="ti ti-layout-dashboard"></i><span>Dashboard</span>
                            </a>
                        </li>
                    </ul>
                </li>

                {{-- ===== Peoples & Teams ===== --}}
                <li class="menu-title"><span>Peoples & Teams</span></li>
                <li>
                    <ul>
                        <li>
                            <a href="#">
                                <i class="ti ti-building-community"></i><span>Companies</span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="ti ti-users-group"></i><span>Employee</span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="ti ti-calendar-star"></i><span>Leaves</span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="ti ti-user-bolt"></i><span>Reviews</span>
                            </a>
                        </li>
                    </ul>
                </li>

                {{-- ===== Utilities & Reports ===== --}}
                <li class="menu-title"><span>Utilities & Reports</span></li>
                <li>
                    <ul>
                        <li>
                            <a href="#">
                                <i class="ti ti-calendar-event"></i><span>Calendar</span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="ti ti-report"></i><span>Reports</span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="ti ti-settings-2"></i><span>Manage</span>
                            </a>
                        </li>
                    </ul>
                </li>

                {{-- ===== Settings ===== --}}
                <li class="menu-title"><span>Settings</span></li>
                <li>
                    <ul>
                        <li>
                            <a href="#">
                                <i class="ti ti-settings"></i><span>Settings</span>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>

        {{-- Sidebar Footer / User --}}
        <div class="sidebar-footer">
            <div class="bg-light p-2 rounded d-flex align-items-center">
                <a href="#" class="avatar avatar-md me-2">
                    <img src="{{ asset('assets/img/users/avatar-2.jpg') }}" alt="User Avatar">
                </a>
                <div>
                    <h6 class="fs-14 fw-semibold mb-1"><a href="#">{{ Auth::user()->name ?? 'Admin User' }}</a></h6>
                    <p class="fs-13 mb-0">{{ Auth::user()->email ?? 'admin@eduparent.com' }}</p>
                </div>
            </div>
        </div>
        <div class="p-3 pt-0">
            <a href="{{ route('login') }}" class="btn btn-danger w-100">
                <i class="ti ti-logout-2 me-1"></i>Logout
            </a>
        </div>
    </div>

</div>
<!-- Sidenav Menu End -->
