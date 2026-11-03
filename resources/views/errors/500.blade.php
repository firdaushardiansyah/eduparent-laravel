@extends('layouts.guest')

@section('content')
<div class="text-center py-5">
    <img src="{{ asset('assets/img/auth/error-500.svg') }}" alt="500" class="img-fluid mb-4" style="max-width: 300px;">
    <h1 class="h3 fw-semibold mb-2">Terjadi Kesalahan</h1>
    <p class="text-muted mb-4">Maaf, terjadi kesalahan pada server. Tim kami telah diberitahu dan akan segera memperbaikinya.</p>
    <x-button onclick="window.location.reload()" variant="primary">
        Coba Lagi
    </x-button>
</div>
@endsection
