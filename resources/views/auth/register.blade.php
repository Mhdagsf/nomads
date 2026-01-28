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
                                    <form method="POST" action="{{ route('register') }}">
                                        @csrf
                                        <div class="d-flex align-items-center mb-3 pb-1">
                                            <a class="navbar-brand" href="{{ route('home') }}">
                                                <img src="{{ asset('frontend/images/logo.png') }}" />
                                            </a>
                                        </div>

                                        <h3 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Register
                                        </h3>

                                        <div data-mdb-input-init class="form-outline mb-4">
                                            <input type="text" id="name"
                                                class="form-control form-control-lg @error('name') is-invalid @enderror"
                                                name="name" value="{{ old('name') }}" autocomplete="name" autofocus
                                                required />
                                            @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                            <label class="form-label" for="name">{{ __('Name') }}</label>
                                        </div>
                                        <div data-mdb-input-init class="form-outline mb-4">
                                            <input type="text" id="username"
                                                class="form-control form-control-lg @error('username') is-invalid @enderror"
                                                name="username" value="{{ old('username') }}" autocomplete="username"
                                                autofocus required />
                                            @error('username')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                            <label class="form-label" for="name">{{ __('Username') }}</label>
                                        </div>
                                        <div data-mdb-input-init class="form-outline mb-4">
                                            <input type="email" id="email"
                                                class="form-control form-control-lg @error('email') is-invalid @enderror"
                                                name="email" value="{{ old('email') }}" autocomplete="email" autofocus
                                                required />
                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                            <label class="form-label" for="name">{{ __('Email Address') }}</label>
                                        </div>
                                        <div data-mdb-input-init class="form-outline mb-4">
                                            <input type="password" id="password"
                                                class="form-control form-control-lg @error('password') is-invalid @enderror"
                                                name="password" value="{{ old('password') }}" autocomplete="password"
                                                autofocus required />
                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                            <label class="form-label" for="name">{{ __('Password') }}</label>
                                        </div>
                                        <div data-mdb-input-init class="form-outline mb-4">
                                            <input type="password" id="password-confirm"
                                                class="form-control form-control-lg" name="password_confirmation"
                                                autocomplete="new-password" required />

                                            <label class="form-label"
                                                for="password-confir">{{ __('Confirm Password') }}</label>
                                        </div>
                                        <div class="row mb-0">
                                            <div class="col-md-12 ">
                                                <button type="submit" class="btn btn-primary btn-lg btn-block">
                                                    {{ __('Register') }}
                                                </button>
                                            </div>
                                        </div>
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
