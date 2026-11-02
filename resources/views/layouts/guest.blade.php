<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @include('partials.head')
</head>

<body class="bg-light">

    <!-- Guest / Auth Wrapper -->
    <div class="main-wrapper auth-bg min-vh-100 d-flex flex-column justify-content-between position-relative overflow-hidden">

        <!-- Header / Brand -->
        <header class="py-3 px-4 text-center">
            <a href="{{ url('/') }}" class="d-inline-flex align-items-center text-decoration-none">
                <img src="{{ asset('assets/img/logo.svg') }}" alt="EduParent" height="38">
            </a>
        </header>

        <!-- Main Guest Content -->
        <main class="container py-4 my-auto">
            <div class="row justify-content-center">
                <div class="col-12 col-sm-10 col-md-8 col-lg-6 col-xl-5">
                    @include('partials.flash-messages')
                    @yield('content')
                </div>
            </div>
        </main>

        <!-- Guest Footer -->
        <footer class="py-3 text-center text-muted fs-13">
            <p class="mb-0">&copy; {{ date('Y') }} EduParent. Sistem Manajemen Terpadu TK / PAUD.</p>
        </footer>

    </div>
    <!-- Guest Wrapper End -->

    <!-- Core Scripts -->
    @include('partials.scripts')

</body>

</html>

