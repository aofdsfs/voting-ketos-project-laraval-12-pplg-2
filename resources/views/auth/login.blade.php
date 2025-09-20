@extends('layouts.app')

@section('content')
<style>
    body {
        background: linear-gradient(to right, #74ebd5, #ACB6E5);
    }
    .card {
        background-color: rgba(255, 255, 255, 0.25); /* putih transparan */
        border: none;
        border-radius: 15px;
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
        backdrop-filter: blur(10px); /* efek blur di belakang */
        -webkit-backdrop-filter: blur(10px);
        color: #222; /* warna teks agar jelas */
    }
    .card-header {
        background-color: transparent;
        font-size: 24px;
        font-weight: 600;
        color: #222;
        border-bottom: none;
    }
    .form-label, .form-check-label {
        color: #222; /* warna label agar mudah terbaca */
    }
    .btn-primary {
        background-color: #5A67D8;
        border: none;
        transition: background-color 0.3s ease;
    }
    .btn-primary:hover {
        background-color: #434190;
    }
    .login-form-container {
        margin-top: 80px;
    }
</style>

<div class="container login-form-container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card p-4">
                <div class="card-header text-center">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        {{-- Email --}}
                        <div class="mb-3">
                            <label for="email" class="form-label">{{ __('Email Address') }}</label>
                            <input id="email" type="email"
                                   class="form-control @error('email') is-invalid @enderror"
                                   name="email" value="{{ old('email') }}"
                                   required autocomplete="email" autofocus>

                            @error('email')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        {{-- Password --}}
                        <div class="mb-3">
                            <label for="password" class="form-label">{{ __('Password') }}</label>
                            <input id="password" type="password"
                                   class="form-control @error('password') is-invalid @enderror"
                                   name="password" required autocomplete="current-password">

                            @error('password')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        {{-- Remember Me --}}
                        <div class="mb-3 form-check">
                            <input class="form-check-input" type="checkbox" name="remember"
                                   id="remember" {{ old('remember') ? 'checked' : '' }}>
                            <label class="form-check-label" for="remember">
                                {{ __('Remember Me') }}
                            </label>
                        </div>

                        {{-- Submit --}}
                        <div class="d-flex justify-content-between align-items-center">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Login') }}
                            </button>

                            @if (Route::has('password.request'))
                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                            @endif
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
    