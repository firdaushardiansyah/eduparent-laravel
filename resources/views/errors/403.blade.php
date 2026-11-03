@extends('layouts.guest')

@section('content')
<div class="text-center py-5">
    <img src="{{ asset('assets/img/auth/error-404.svg') }}" alt="403" class="img-fluid mb-4" style="max-width: 300px;">
    <h1 class="h3 fw-semibold mb-2">Akses Ditolak</h1>
    <p class="text-muted mb-4">Anda tidak memiliki izin untuk mengakses halaman ini.</p>
    <x-button :href="route('dashboard')" variant="primary">
        Kembali ke Dashboard
    </x-button>
</div>
@endsection
