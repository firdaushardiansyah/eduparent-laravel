@extends('layouts.guest')

@section('content')
<div class="text-center py-5">
    <div class="mb-4">
        <i class="fas fa-lock text-warning" style="font-size: 80px;"></i>
    </div>
    <h1 class="h3 fw-semibold mb-2">Sesi Kadaluarsa</h1>
    <p class="text-muted mb-4">Sesi Anda telah kadaluarsa. Silakan muat ulang halaman dan coba lagi.</p>
    <x-button onclick="window.location.reload()" variant="primary">
        Muat Ulang Halaman
    </x-button>
</div>
@endsection
