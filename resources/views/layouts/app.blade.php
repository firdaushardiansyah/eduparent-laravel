<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @include('partials.head')
</head>

<body>

    <!-- Main Wrapper Start -->
    <div class="main-wrapper">

        <!-- Topbar / Navbar -->
        @include('partials.navbar')

        <!-- Search Modal -->
        @include('partials.search-modal')

        <!-- Sidenav / Sidebar -->
        @include('partials.sidebar')

        <!-- Page Wrapper Content Area -->
        <div class="page-wrapper">
            <div class="content pb-0">
                <!-- Global Flash Messages -->
                @include('partials.flash-messages')

                <!-- Main Content Yield -->
                @yield('content')
            </div>

            <!-- Global Footer -->
            @include('partials.footer')
        </div>

        @stack('modals')

    </div>
    <!-- Main Wrapper End -->

    <!-- Core Scripts -->
    @include('partials.scripts')

</body>

</html>
