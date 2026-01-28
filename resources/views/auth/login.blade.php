@extends('layouts.app')

@section('content')
    <section class="vh-150" style="background-color: #071c4d">
        <div class="container py-5">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col col-xl-10">
                    <div class="card shadow-lg overflow-hidden" style="border-radius: 1rem;">
                        <div class="row g-0">
                            <div class="col-md-6 col-lg-5 d-none d-md-block">
                                <img src="{{ url('frontend/images/login-image.jpg') }}" alt="login form"
                                    class="img-fluid h-100 w-100"
                                    style="border-radius: 1rem 0 0 1rem; object-fit: cover;" />
                            </div>
                            <div class="col-md-6 col-lg-7 d-flex align-items-center">
                                <div class="card-body p-4 p-lg-5 text-black">

                                    <form method="POST" action="{{ route('login') }}">
                                        @csrf
                                        <div class="d-flex align-items-center mb-3 pb-1">
                                            <a class="navbar-brand" href="{{ route('home') }}">
                                                <img src="{{ asset('frontend/images/logo.png') }}" />
                                            </a>
                                        </div>

                                        <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Sign into your account
                                        </h5>

                                        <div data-mdb-input-init class="form-outline mb-4">
                                            <input type="email" id="form2Example17"
                                                class="form-control form-control-lg @error('email') is-invalid @enderror"
                                                name="email" value="{{ old('email') }}" autocomplete="email" autofocus
                                                required />
                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                            <label class="form-label" for="email">{{ __('Email Address') }}</label>
                                        </div>

                                        <div data-mdb-input-init class="form-outline mb-4">
                                            <input type="password" id="password"
                                                class="form-control form-control-lg @error('password') is-invalid @enderror"
                                                name="password" required />
                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                            <label class="form-label" for="password">{{ __('Password') }}</label>
                                        </div>

                                        <div class="d-flex align-items-center mb-3">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="remember"
                                                    id="remember" {{ old('remember') ? 'checked' : '' }}>
                                                <label class="form-check-label ms-2" for="remember">
                                                    {{ __('Remember Me') }}
                                                </label>
                                            </div>
                                        </div>

                                        <div class="pt-1 mb-4">

                                            <button type="submit" class="btn btn-primary btn-lg btn-block">
                                                {{ __('Login') }}
                                            </button>
                                        </div>

                                        @if (Route::has('password.request'))
                                            <a class="small text-muted" href="{{ route('password.request') }}">
                                                {{ __('Forgot Your Password?') }}
                                            </a>
                                        @endif

                                        <p class="mb-5 pb-lg-2" style="color: #393f81;">Don't have an account? <a
                                                href="{{ url('register') }}" style="color: #393f81;">Register here</a></p>

                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
