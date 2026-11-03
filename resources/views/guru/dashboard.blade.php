@extends('layouts.app')

@section('content')
<x-page-header title="Dashboard Guru" :breadcrumbs="['Dashboard' => '#']" />

<div class="row g-3">
    <div class="col-12 col-md-6 col-lg-3">
        <x-stat-card
            title="Total Siswa"
            value="0"
            icon="fas fa-users"
            color="primary"
        />
    </div>
    <div class="col-12 col-md-6 col-lg-3">
        <x-stat-card
            title="Presensi Hari Ini"
            value="0"
            icon="fas fa-clipboard-check"
            color="success"
        />
    </div>
    <div class="col-12 col-md-6 col-lg-3">
        <x-stat-card
            title="Jurnal Bulan Ini"
            value="0"
            icon="fas fa-book"
            color="info"
        />
    </div>
    <div class="col-12 col-md-6 col-lg-3">
        <x-stat-card
            title="Orang Tua"
            value="0"
            icon="fas fa-user-friends"
            color="warning"
        />
    </div>
</div>

<div class="row mt-4">
    <div class="col-12">
        <x-card>
            <h5 class="card-title mb-3">Selamat Datang, {{ $user->name }}!</h5>
            <p class="text-muted mb-0">Fitur manajemen siswa, presensi, jurnal, dan tumbuh kembang akan tersedia di Tahap 3 dan seterusnya.</p>
        </x-card>
    </div>
</div>
@endsection
