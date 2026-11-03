@extends('layouts.guest')

@section('content')
<div class="text-center py-5">
    <img src="{{ asset('assets/img/auth/error-404.svg') }}" alt="404" class="img-fluid mb-4" style="max-width: 300px;">
    <h1 class="h3 fw-semibold mb-2">Halaman Tidak Ditemukan</h1>
    <p class="text-muted mb-4">Maaf, halaman yang Anda cari tidak dapat ditemukan.</p>
    <x-button :href="url('/')" variant="primary">
        Kembali ke Beranda
    </x-button>
</div>
@endsection
