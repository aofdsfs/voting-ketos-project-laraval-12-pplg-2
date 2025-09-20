@extends('layouts.app')

@section('content')
<style>
    body {
        background: linear-gradient(to right, #74ebd5, #ACB6E5);
    }

    .card {
        border: none;
        border-radius: 15px;
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
    }

    .card-header {
        background-color: transparent;
        font-size: 26px;
        font-weight: bold;
        color: #333;
        border-bottom: none;
    }

    .form-label {
        font-weight: 500;
        color: #444;
    }

    .form-control {
        border-radius: 8px;
        padding: 10px;
    }

    .btn-primary {
        background-color: #5A67D8;
        border: none;
        padding: 10px 0;
        font-weight: bold;
        font-size: 16px;
        border-radius: 8px;
        transition: 0.3s ease;
    }

    .btn-primary:hover {
        background-color: #357ABD;
    }

    .invalid-feedback {
        display: block;
        color: #e3342f;
        font-size: 0.875em;
    }

    .register-container {
        margin-top: 80px;
    }
</style>

<div class="container register-container">
    <div class="row justify-content-center">
        <div class="col-md-7">
            <div class="card p-4">
                <div class="card-header text-center">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <!-- Nama Lengkap -->
                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama Lengkap</label>
                            <input id="nama" type="text" class="form-control @error('nama') is-invalid @enderror"
                                   name="nama" value="{{ old('nama') }}" required autofocus>
                            @error('nama')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Kelas -->
                        <div class="mb-3">
                            <label for="kelas" class="form-label">Kelas</label>
                            <select id="kelas" name="kelas" class="form-control @error('kelas') is-invalid @enderror" required>
                                <option value="">-- Pilih Kelas --</option>
                                <option value="10" {{ old('kelas') == '10' ? 'selected' : '' }}>10</option>
                                <option value="11" {{ old('kelas') == '11' ? 'selected' : '' }}>11</option>
                                <option value="12" {{ old('kelas') == '12' ? 'selected' : '' }}>12</option>
                            </select>
                            @error('kelas')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Jurusan -->
                        <div class="mb-3">
                            <label for="jurusan" class="form-label">Jurusan</label>
                            <select id="jurusan" name="jurusan" class="form-control @error('jurusan') is-invalid @enderror" required>
                                <option value="">-- Pilih Jurusan --</option>
                                <option value="PPLG" {{ old('jurusan') == 'PPLG' ? 'selected' : '' }}>PPLG</option>
                                <option value="DKV" {{ old('jurusan') == 'DKV' ? 'selected' : '' }}>DKV</option>
                                <option value="TKJ" {{ old('jurusan') == 'TKJ' ? 'selected' : '' }}>TKJ</option>
                                <option value="BCP" {{ old('jurusan') == 'BCP' ? 'selected' : '' }}>BCP</option>
                            </select>
                            @error('jurusan')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Email -->
                        <div class="mb-3">
                            <label for="email" class="form-label">Alamat Email</label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                   name="email" value="{{ old('email') }}" required>
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Password -->
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                                   name="password" required>
                            @error('password')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Konfirmasi Password -->
                        <div class="mb-3">
                            <label for="password-confirm" class="form-label">Konfirmasi Password</label>
                            <input id="password-confirm" type="password" class="form-control"
                                   name="password_confirmation" required>
                        </div>

                        <!-- Tombol Register -->
                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary">
                                Daftar
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
