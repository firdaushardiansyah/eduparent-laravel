@extends('layouts.guest')

@section('content')
<div class="card border-0 shadow-sm">
    <div class="card-body p-4 p-sm-5">
        <h1 class="h4 fw-semibold text-center mb-1">Masuk ke EduParent</h1>
        <p class="text-muted text-center mb-4 fs-14">Silakan masukkan kredensial Anda</p>

        <form method="POST" action="{{ route('login') }}" id="loginForm">
            @csrf

            <x-form.input
                name="email"
                type="email"
                label="Email"
                placeholder="nama@contoh.com"
                required
                autocomplete="username"
                inputmode="email"
                autocapitalize="none"
            />

            <div class="mb-3">
                <label for="password" class="form-label fs-14 fw-medium text-dark mb-1">
                    Kata Sandi <span class="text-danger">*</span>
                </label>
                <div class="position-relative">
                    <input
                        type="password"
                        name="password"
                        id="password"
                        class="form-control @error('password') is-invalid @enderror"
                        placeholder="Masukkan kata sandi"
                        required
                        autocomplete="current-password"
                        style="min-height: 44px; font-size: 16px; padding-right: 48px;"
                    >
                    <button
                        type="button"
                        class="btn btn-link position-absolute end-0 top-50 translate-middle-y text-muted"
                        id="togglePassword"
                        aria-label="Tampilkan kata sandi"
                        aria-pressed="false"
                        style="min-height: 44px; min-width: 44px; padding: 0; text-decoration: none;"
                    >
                        <i class="fas fa-eye" id="toggleIcon"></i>
                    </button>
                </div>
                @error('password')
                    <div class="invalid-feedback d-block fs-12">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-4">
                <div class="form-check">
                    <input
                        type="checkbox"
                        name="remember"
                        id="remember"
                        class="form-check-input"
                        {{ old('remember') ? 'checked' : '' }}
                    >
                    <label for="remember" class="form-check-label fs-14">
                        Ingat saya
                    </label>
                </div>
            </div>

            <x-button
                type="submit"
                variant="primary"
                class="w-100"
                id="submitBtn"
            >
                Masuk
            </x-button>
        </form>
    </div>
</div>

@push('scripts')
<script>
// Toggle password visibility
document.getElementById('togglePassword')?.addEventListener('click', function() {
    const passwordInput = document.getElementById('password');
    const toggleIcon = document.getElementById('toggleIcon');
    const isPassword = passwordInput.type === 'password';

    passwordInput.type = isPassword ? 'text' : 'password';
    toggleIcon.classList.toggle('fa-eye');
    toggleIcon.classList.toggle('fa-eye-slash');
    this.setAttribute('aria-pressed', isPassword ? 'true' : 'false');
    this.setAttribute('aria-label', isPassword ? 'Sembunyikan kata sandi' : 'Tampilkan kata sandi');
});

// Prevent double submit
document.getElementById('loginForm')?.addEventListener('submit', function(e) {
    const submitBtn = document.getElementById('submitBtn');
    if (submitBtn.disabled) {
        e.preventDefault();
        return false;
    }
    submitBtn.disabled = true;
    submitBtn.innerHTML = '<span class="spinner-border spinner-border-sm me-2" role="status" aria-hidden="true"></span>Memproses...';
});
</script>
@endpush
@endsection
