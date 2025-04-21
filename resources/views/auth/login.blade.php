@extends('layouts.front')

@section('title', 'Login - Toko Alat Kesehatan')

@section('content')
<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow border-0 rounded-3">
                <div class="card-header bg-primary text-white text-center py-3">
                    <h4 class="mb-0">LOGIN</h4>
                </div>
                <div class="card-body p-5">
                    <div class="text-center mb-4">
                        <h4 class="mt-3">Selamat datang di MediMart <br><strong>Toko Alat Kesehatan</strong></h4>
                        <p class="text-muted">Silakan login untuk melanjutkan</p>
                    </div>
                    @if ($errors->any() || Session::get('success'))
                            @include('layout/info')
                    @endif

                    <form method="POST" action="">
                        @csrf

                        <div class="mb-3">
                            <label for="user_id" class="form-label">Email</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light">
                                    <i class="bi bi-envelope-fill"></i>
                                </span>
                                <input type="email" class="form-control" id="email" name="email" placeholder="daniel@example.com" required>
                            </div>
                        </div>

                        <div class="mb-4">
                            <label for="password" class="form-label">Password</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light">
                                    <i class="bi bi-lock-fill"></i>
                                </span>
                                <input type="password" class="form-control" id="password" name="password" placeholder="Masukkan password" required>
                            </div>
                        </div>
                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-primary btn-lg">
                                <i class="bi bi-box-arrow-in-right me-2"></i>MASUK
                            </button>
                        </div>
                    </form>
                </div>
                <div class="card-footer bg-light text-center py-3">
                    <p class="mb-0">Belum memiliki akun? <a href="/register" class="text-primary">Daftar sekarang</a> <a href="/">atau kembali</a></p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
