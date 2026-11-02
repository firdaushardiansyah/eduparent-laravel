<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Sidebar Navigation Menu Configuration
    |--------------------------------------------------------------------------
    | Structured menu definition for EduParent (TK/PAUD Management).
    | Each item contains: label, route, icon, roles, and optional env restriction.
    | Roles: 'admin', 'guru', 'ortu'
    */

    'items' => [
        [
            'header' => 'Menu Utama',
            'menus' => [
                [
                    'label' => 'Dashboard',
                    'route' => 'dashboard',
                    'icon' => 'ti ti-layout-dashboard',
                    'roles' => ['admin', 'guru', 'ortu'],
                ],
            ],
        ],
        [
            'header' => 'Akademik & Siswa',
            'menus' => [
                [
                    'label' => 'Data Siswa',
                    'route' => 'dashboard',
                    'icon' => 'ti ti-school',
                    'roles' => ['admin', 'guru'],
                ],
                [
                    'label' => 'Presensi Harian',
                    'route' => 'dashboard',
                    'icon' => 'ti ti-calendar-check',
                    'roles' => ['admin', 'guru', 'ortu'],
                ],
                [
                    'label' => 'Tumbuh Kembang',
                    'route' => 'dashboard',
                    'icon' => 'ti ti-chart-arrows',
                    'roles' => ['admin', 'guru', 'ortu'],
                ],
            ],
        ],
        [
            'header' => 'Aktivitas & Laporan',
            'menus' => [
                [
                    'label' => 'Kegiatan & Jadwal',
                    'route' => 'dashboard',
                    'icon' => 'ti ti-calendar-event',
                    'roles' => ['admin', 'guru', 'ortu'],
                ],
                [
                    'label' => 'Laporan & Rapor',
                    'route' => 'dashboard',
                    'icon' => 'ti ti-file-analytics',
                    'roles' => ['admin', 'guru'],
                ],
            ],
        ],
        [
            'header' => 'Sistem & Pengujian',
            'menus' => [
                [
                    'label' => 'Layout Verification',
                    'route' => 'layout-check',
                    'icon' => 'ti ti-device-desktop-analytics',
                    'roles' => ['admin', 'guru', 'ortu'],
                    'env' => ['local', 'testing'],
                ],
                [
                    'label' => 'Pengaturan',
                    'route' => 'dashboard',
                    'icon' => 'ti ti-settings',
                    'roles' => ['admin'],
                ],
            ],
        ],
    ],
];
