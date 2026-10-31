@extends('layouts.auth')

@section('title', 'Register')

@section('content')

    <!-- start row -->
    <div class="row justify-content-center align-items-center vh-100 overflow-auto flex-wrap py-3">

        <div class="col-lg-4 col-md-6 col-sm-8 mx-auto">
            <form action="{{ route('register') }}" method="POST" class="d-flex justify-content-center align-items-center">
                @csrf

                <div class="d-flex flex-column justify-content-lg-center p-4 p-lg-0 pb-0 flex-fill">
                    <div class="mx-auto mb-4 text-center">
                        <a href="{{ url('/') }}" class="d-inline-flex align-items-center gap-2 text-decoration-none">
                            <span class="avatar avatar-md rounded-circle bg-primary text-white d-inline-flex align-items-center justify-content-center shadow-sm">
                                <i class="ti ti-school fs-22"></i>
                            </span>
                            <span class="fs-22 fw-bold text-dark">Edu<span class="text-primary">Parent</span></span>
                        </a>
                    </div>

                    <div class="card border-0 p-lg-3 rounded-4 shadow-sm">
                        <div class="card-body">
                            <div class="text-center mb-3">
                                <h5 class="mb-1 fw-bold">Daftar Akun Baru</h5>
                                <p class="text-muted mb-0 fs-13">Lengkapi data Anda untuk membuat akun EduParent</p>
                            </div>

                            @if ($errors->any())
                                <div class="alert alert-danger py-2 px-3 fs-13 mb-3">
                                    <ul class="mb-0 ps-3">
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <div class="mb-3">
                                <label class="form-label fs-13 fw-medium">Nama Lengkap</label>
                                <div class="input-group input-group-flat">
                                    <span class="input-group-text">
                                        <i class="ti ti-user fs-14 text-dark"></i>
                                    </span>
                                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" 
                                           placeholder="Masukkan nama lengkap" value="{{ old('name') }}" required autofocus>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label class="form-label fs-13 fw-medium">Alamat Email</label>
                                <div class="input-group input-group-flat">
                                    <span class="input-group-text">
                                        <i class="ti ti-mail fs-14 text-dark"></i>
                                    </span>
                                    <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" 
                                           placeholder="nama@email.com" value="{{ old('email') }}" required>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label class="form-label fs-13 fw-medium">Password</label>
                                <div class="input-group input-group-flat">
                                    <span class="input-group-text">
                                        <i class="ti ti-lock-open fs-14 text-dark"></i>
                                    </span>
                                    <input type="password" name="password" class="pass-input form-control ps-1 @error('password') is-invalid @enderror" 
                                           placeholder="Minimal 8 karakter" required>
                                    <span class="toggle-password input-group-text ti ti-eye-off fs-14 text-dark cursor-pointer"></span>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label class="form-label fs-13 fw-medium">Konfirmasi Password</label>
                                <div class="input-group input-group-flat">
                                    <span class="input-group-text">
                                        <i class="ti ti-lock-open fs-14 text-dark"></i>
                                    </span>
                                    <input type="password" name="password_confirmation" class="pass-input2 form-control ps-1" 
                                           placeholder="Ulangi password" required>
                                    <span class="toggle-password2 input-group-text ti ti-eye-off fs-14 text-dark cursor-pointer"></span>
                                </div>
                            </div>

                            <div class="form-check form-check-md mb-3">
                                <input class="form-check-input" id="terms" name="terms" type="checkbox" required>
                                <label for="terms" class="form-check-label mt-0 text-body fs-13">
                                    Saya menyetujui <a href="javascript:void(0);" class="text-decoration-underline text-primary">Syarat &amp; Ketentuan</a> 
                                    serta <a href="javascript:void(0);" class="text-decoration-underline text-primary">Kebijakan Privasi</a>
                                </label>
                            </div>

                            <div class="mb-3">
                                <button type="submit" class="btn btn-primary w-100 py-2 fw-medium">
                                    <i class="ti ti-user-plus me-1"></i> Daftar Sekarang
                                </button>
                            </div>

                            <div class="login-or position-relative mb-3">
                                <span class="span-or fs-12">ATAU</span>
                            </div>

                            <div class="mb-3">
                                <div class="d-flex align-items-center justify-content-center flex-wrap gap-2">
                                    <div class="text-center flex-fill">
                                        <a href="javascript:void(0);"
                                            class="btn btn-outline-light border text-dark w-100 d-flex align-items-center justify-content-center py-2">
                                            <img class="img-fluid me-2" src="{{ asset('assets/img/icons/google-logo.svg') }}" width="18" alt="Google">
                                            <span class="fs-13 fw-medium">Google</span>
                                        </a>
                                    </div>
                                    <div class="text-center flex-fill">
                                        <a href="javascript:void(0);"
                                            class="btn btn-outline-light border text-dark w-100 d-flex align-items-center justify-content-center py-2">
                                            <img class="img-fluid me-2" src="{{ asset('assets/img/icons/facebook-logo.svg') }}" width="18" alt="Facebook">
                                            <span class="fs-13 fw-medium">Facebook</span>
                                        </a>
                                    </div>
                                </div>
                            </div>

                            <div class="text-center pt-2">
                                <h6 class="fw-normal fs-14 text-dark mb-0">Sudah memiliki akun?
                                    <a href="{{ route('login') }}" class="hover-a text-primary fw-semibold">Masuk di sini</a>
                                </h6>
                            </div>
                        </div><!-- end card body -->
                    </div><!-- end card -->
                </div>
            </form>
        </div><!-- end col -->
    </div>
    <!-- end row -->

@endsection
