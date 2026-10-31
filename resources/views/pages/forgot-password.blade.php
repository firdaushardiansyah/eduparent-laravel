@extends('layouts.auth')

@section('title', 'Lupa Password')

@section('content')

    <!-- start row -->
    <div class="row justify-content-center align-items-center vh-100 overflow-auto flex-wrap py-3">

        <div class="col-lg-4 col-md-6 col-sm-8 mx-auto">
            <form action="{{ route('password.email') }}" method="POST" class="d-flex justify-content-center align-items-center">
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
                                <h5 class="mb-1 fw-bold">Lupa Password</h5>
                                <p class="text-muted mb-0 fs-13">Jangan khawatir, kami akan mengirimkan instruksi reset ke email Anda</p>
                            </div>

                            @if (session('status'))
                                <div class="alert alert-success py-2 px-3 fs-13 mb-3">
                                    {{ session('status') }}
                                </div>
                            @endif

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
                                <label class="form-label fs-13 fw-medium">Alamat Email</label>
                                <div class="input-group input-group-flat">
                                    <span class="input-group-text">
                                        <i class="ti ti-mail fs-14 text-dark"></i>
                                    </span>
                                    <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" 
                                           placeholder="nama@email.com" value="{{ old('email') }}" required autofocus>
                                </div>
                            </div>

                            <div class="mb-3">
                                <button type="submit" class="btn btn-primary w-100 py-2 fw-medium">
                                    <i class="ti ti-send me-1"></i> Kirim Link Reset
                                </button>
                            </div>

                            <div class="text-center pt-2">
                                <h6 class="fw-normal fs-14 text-dark mb-0">Kembali ke
                                    <a href="{{ route('login') }}" class="hover-a text-primary fw-semibold">Halaman Login</a>
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
