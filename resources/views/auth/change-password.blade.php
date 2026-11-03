@extends('layouts.app')

@section('content')
<x-page-header title="Ganti Kata Sandi" :breadcrumb="[['label' => 'Ganti Kata Sandi']]" />

<div class="row justify-content-center">
    <div class="col-12 col-md-8 col-lg-6">
        @if($mustChange)
        <div class="alert alert-warning d-flex align-items-start" role="alert">
            <i class="fas fa-exclamation-triangle me-2 mt-1"></i>
            <div>
                <strong>Perhatian!</strong> Anda harus mengganti kata sandi sebelum dapat mengakses sistem.
            </div>
        </div>
        @endif

        <x-card>
            <form method="POST" action="{{ route('password.change.update') }}" id="changePasswordForm">
                @csrf

                <x-form.input
                    name="current_password"
                    type="password"
                    label="Kata Sandi Saat Ini"
                    placeholder="Masukkan kata sandi saat ini"
                    required
                    autocomplete="current-password"
                />

                <x-form.input
                    name="password"
                    type="password"
                    label="Kata Sandi Baru"
                    placeholder="Minimal 10 karakter"
                    required
                    autocomplete="new-password"
                    helper="Minimal 10 karakter, kombinasi huruf besar-kecil dan angka"
                />

                <x-form.input
                    name="password_confirmation"
                    type="password"
                    label="Konfirmasi Kata Sandi Baru"
                    placeholder="Masukkan ulang kata sandi baru"
                    required
                    autocomplete="new-password"
                />

                <div class="d-flex gap-2">
                    <x-button type="submit" variant="primary" id="submitBtn">
                        Simpan Perubahan
                    </x-button>
                    @if(!$mustChange)
                    <x-button :href="route('dashboard')" variant="secondary" outline>
                        Batal
                    </x-button>
                    @endif
                </div>
            </form>
        </x-card>
    </div>
</div>

@push('scripts')
<script>
document.getElementById('changePasswordForm')?.addEventListener('submit', function(e) {
    const submitBtn = document.getElementById('submitBtn');
    if (submitBtn.disabled) {
        e.preventDefault();
        return false;
    }
    submitBtn.disabled = true;
    submitBtn.innerHTML = '<span class="spinner-border spinner-border-sm me-2"></span>Menyimpan...';
});
</script>
@endpush
@endsection
