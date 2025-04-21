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
                        <img src="{{ asset('images/logo.png') }}" alt="Logo" width="100" class="img-fluid">
                        <h4 class="mt-3">Selamat datang di <br><strong>Toko Alat Kesehatan</strong></h4>
                        <p class="text-muted">Silakan login untuk melanjutkan</p>
                    </div>

                    <form method="POST" action="">
                        @csrf

                        <div class="mb-3">
                            <label for="user_id" class="form-label">User ID</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light">
                                    <i class="bi bi-person-fill"></i>
                                </span>
                                <input type="text" class="form-control" id="user_id" name="user_id" placeholder="Masukkan user ID" required>
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
                    <p class="mb-0">Belum memiliki akun? <a href="#" class="text-primary">Daftar sekarang</a></p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
