@extends('layouts.app')

@section('content')
<x-page-header title="Dashboard Orang Tua" :breadcrumbs="['Dashboard' => '#']" />

<div class="row g-3">
    <div class="col-12 col-md-6 col-lg-4">
        <x-stat-card
            title="Anak Saya"
            value="0"
            icon="fas fa-child"
            color="primary"
        />
    </div>
    <div class="col-12 col-md-6 col-lg-4">
        <x-stat-card
            title="Presensi Bulan Ini"
            value="0"
            icon="fas fa-calendar-check"
            color="success"
        />
    </div>
    <div class="col-12 col-md-6 col-lg-4">
        <x-stat-card
            title="Catatan Tumbuh Kembang"
            value="0"
            icon="fas fa-chart-line"
            color="info"
        />
    </div>
</div>

<div class="row mt-4">
    <div class="col-12">
        <x-card>
            <h5 class="card-title mb-3">Selamat Datang, {{ $user->name }}!</h5>
            <p class="text-muted mb-0">Informasi tentang anak Anda akan tersedia setelah akun dihubungkan dengan data siswa oleh Guru.</p>
        </x-card>
    </div>
</div>
@endsection
