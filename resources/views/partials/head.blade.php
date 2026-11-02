<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0">
<meta name="csrf-token" content="{{ csrf_token() }}">
<meta name="description" content="{{ $metaDescription ?? 'EduParent - Platform Manajemen Edukasi TK / PAUD' }}">
<meta name="author" content="EduParent Team">

<title>@yield('title', 'Dashboard') | EduParent</title>

<!-- Favicon -->
<link rel="shortcut icon" href="{{ asset('assets/img/favicon.png') }}">
<link rel="apple-touch-icon" href="{{ asset('assets/img/apple-icon.png') }}">

<!-- Theme Config JS -->
<script src="{{ asset('assets/js/theme-script.js') }}"></script>

<!-- Bootstrap Core CSS -->
<link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">

<!-- FontAwesome Icons -->
<link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome/css/fontawesome.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome/css/all.min.css') }}">

<!-- Tabler Icons -->
<link rel="stylesheet" href="{{ asset('assets/plugins/tabler-icons/tabler-icons.min.css') }}">

<!-- Simplebar Scrollbar CSS -->
<link rel="stylesheet" href="{{ asset('assets/plugins/simplebar/simplebar.min.css') }}">

@stack('styles')

<!-- Main CSS -->
<link rel="stylesheet" href="{{ asset('assets/css/style.css') }}" id="app-style">

<!-- Custom Theme Override (Teal) -->
<link rel="stylesheet" href="{{ asset('assets/css/custom-theme.css') }}">

<!-- Mobile First & Hardening Styles -->
<style>
    /* iOS Auto-zoom prevention & min touch targets */
    input.form-control, select.form-select, textarea.form-control {
        font-size: 16px !important;
        min-height: 44px;
    }
    .btn, .mobile-btn, .sidenav-toggle-btn, .topbar-link {
        min-height: 44px;
        min-width: 44px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
    }
    /* Prevent horizontal overflow on small viewports */
    html, body {
        max-width: 100%;
        overflow-x: hidden;
    }
    /* Responsive card-view table mode on mobile */
    @media (max-width: 767.98px) {
        .table-card-view thead, .table-card-view-wrapper table thead {
            display: none;
        }
        .table-card-view tr, .table-card-view-wrapper table tr {
            display: block;
            margin-bottom: 1rem;
            background: #fff;
            border: 1px solid #e9ecef;
            border-radius: 0.5rem;
            padding: 0.75rem;
            box-shadow: 0 1px 3px rgba(0,0,0,0.05);
        }
        .table-card-view td, .table-card-view-wrapper table td {
            display: flex;
            justify-content: space-between;
            align-items: center;
            border: none;
            border-bottom: 1px dashed #f0f0f0;
            padding: 0.5rem 0;
            text-align: right;
            word-break: break-word;
        }
        .table-card-view td:last-child, .table-card-view-wrapper table td:last-child {
            border-bottom: none;
        }
        .table-card-view td::before, .table-card-view-wrapper table td::before {
            content: attr(data-label);
            font-weight: 600;
            text-align: left;
            padding-right: 1rem;
            color: #6c757d;
            font-size: 0.85rem;
        }
    }
    /* Respect reduced motion */
    @media (prefers-reduced-motion: reduce) {
        * {
            animation-duration: 0.01ms !important;
            animation-iteration-count: 1 !important;
            transition-duration: 0.01ms !important;
            scroll-behavior: auto !important;
        }
    }
</style>
