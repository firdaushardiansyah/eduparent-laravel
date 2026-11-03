@extends('layouts.guest')

@section('content')
<div class="text-center py-5">
    <div class="mb-4">
        <i class="fas fa-stopwatch text-danger" style="font-size: 80px;"></i>
    </div>
    <h1 class="h3 fw-semibold mb-2">Terlalu Banyak Percobaan</h1>
    <p class="text-muted mb-4">Anda telah melakukan terlalu banyak percobaan. Silakan tunggu beberapa saat dan coba lagi.</p>
    <x-button :href="route('login')" variant="primary">
        Kembali ke Login
    </x-button>
</div>
@endsection
