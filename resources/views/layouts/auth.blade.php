<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @include('partials.head')
</head>

<body class="bg-light">

    <!-- Begin Wrapper -->
    <div class="main-wrapper auth-bg position-relative overflow-hidden min-vh-100 d-flex flex-column justify-content-center">

        <!-- Start Content -->
        <div class="container position-relative z-1 py-4">
            @include('partials.flash-messages')
            @yield('content')
        </div>
        <!-- End Content -->

    </div>
    <!-- End Wrapper -->

    <!-- Core Scripts -->
    @include('partials.scripts')

</body>

</html>
