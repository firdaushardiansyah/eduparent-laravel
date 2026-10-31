@extends('layouts.auth')

@section('title', 'Login')

@section('content')

    <!-- start row -->
    <div class="row justify-content-center align-items-center vh-100 overflow-auto flex-wrap py-3">

        <div class="col-lg-4 mx-auto">
            <form action="{{ route('dashboard') }}" method="GET" class="d-flex justify-content-center align-items-center">
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
                    <div class="card border-0 p-lg-3 rounded-4">
                        <div class="card-body">
                            <div class="text-center mb-3">
                                <h5 class="mb-1 fw-bold">Sign In</h5>
                                <p class="mb-0">Please enter below details to access the dashboard</p>
                            </div>

                            {{-- Validation Errors --}}
                            @if($errors->any())
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    <ul class="mb-0">
                                        @foreach($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            @endif

                            <div class="mb-3">
                                <label class="form-label">Email Address</label>
                                <div class="input-group input-group-flat">
                                    <span class="input-group-text">
                                        <i class="ti ti-mail fs-14 text-dark"></i>
                                    </span>
                                    <input type="email" name="email" class="form-control" placeholder="Enter Email Address" value="{{ old('email') }}" required>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Password</label>
                                <div class="input-group input-group-flat">
                                    <span class="input-group-text">
                                        <i class="ti ti-lock-open fs-14 text-dark"></i>
                                    </span>
                                    <input type="password" name="password" class="pass-input form-control ps-1" placeholder="************" required>
                                    <span class="toggle-password input-group-text ti ti-eye-off fs-14 text-dark"></span>
                                </div>
                            </div>
                            <div class="d-flex align-items-center justify-content-between mb-3">
                                <div class="d-flex align-items-center">
                                    <div class="form-check form-check-md mb-0">
                                        <input class="form-check-input" id="remember_me" name="remember" type="checkbox">
                                        <label for="remember_me" class="form-check-label mt-0 text-dark">Remember Me</label>
                                    </div>
                                </div>
                                <div class="text-end">
                                    <a href="{{ route('password.request') }}" class="hover-a">Forgot Password?</a>
                                </div>
                            </div>
                            <div class="mb-2">
                                <button type="submit" class="btn btn-primary w-100">Login</button>
                            </div>
                            <div class="login-or position-relative mb-3">
                                <span class="span-or fs-12">OR</span>
                            </div>
                            <div class="mb-3">
                                <div class="d-flex align-items-center justify-content-center flex-wrap">
                                    <div class="text-center me-2 flex-fill">
                                        <a href="javascript:void(0);"
                                            class="br-10 p-1 btn btn-outline-light border d-flex align-items-center justify-content-center">
                                            <img class="img-fluid m-1" src="{{ asset('assets/img/icons/facebook-logo.svg') }}" alt="Facebook">
                                        </a>
                                    </div>
                                    <div class="text-center me-2 flex-fill">
                                        <a href="javascript:void(0);"
                                            class="br-10 p-1 btn btn-outline-light border d-flex align-items-center justify-content-center">
                                            <img class="img-fluid m-1" src="{{ asset('assets/img/icons/google-logo.svg') }}" alt="Google">
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="text-center">
                                <h6 class="fw-normal fs-14 text-dark mb-0">Don't have an account yet?
                                    <a href="{{ route('register') }}" class="hover-a text-primary fw-semibold"> Register</a>
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
