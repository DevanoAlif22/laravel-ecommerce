@extends('layouts.front')

@section('title', 'Registrasi - Toko Alat Kesehatan')

@section('content')
<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow">
                <div class="card-header bg-primary text-white text-center py-4">
                    <h3 class="mb-0">FORM REGISTRASI</h3>
                </div>
                <div class="card-body p-4">
                    <!-- Form Header Image -->
                    <div class="text-center mb-4">
                        <img src="https://via.placeholder.com/300x100" alt="Toko Alat Kesehatan" class="img-fluid">
                    </div>
                    
                    <form method="POST" action="">
                        @csrf
                        
                        <!-- Account Information -->
                        <div class="card mb-4">
                            <div class="card-header bg-light">
                                <h5 class="mb-0">
                                    <i class="bi bi-person-fill text-primary me-2"></i>Informasi Akun
                                </h5>
                            </div>
                            <div class="card-body">
                                <div class="row mb-3">
                                    <div class="col-md-6 mb-3 mb-md-0">
                                        <label for="username" class="form-label">Username</label>
                                        <input type="text" class="form-control" id="username" name="username" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="email" class="form-label">Email</label>
                                        <input type="email" class="form-control" id="email" name="email" required>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 mb-3 mb-md-0">
                                        <label for="password" class="form-label">Password</label>
                                        <input type="password" class="form-control" id="password" name="password" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="password_confirmation" class="form-label">Konfirmasi Password</label>
                                        <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Personal Information -->
                        <div class="card mb-4">
                            <div class="card-header bg-light">
                                <h5 class="mb-0">
                                    <i class="bi bi-card-list text-primary me-2"></i>Informasi Pribadi
                                </h5>
                            </div>
                            <div class="card-body">
                                <div class="row mb-3">
                                    <div class="col-md-6 mb-3 mb-md-0">
                                        <label for="dob" class="form-label">Tanggal Lahir</label>
                                        <input type="date" class="form-control" id="dob" name="dob">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Jenis Kelamin</label>
                                        <div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="gender" id="gender-male" value="Male">
                                                <label class="form-check-label" for="gender-male">Laki-laki</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="gender" id="gender-female" value="Female">
                                                <label class="form-check-label" for="gender-female">Perempuan</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 mb-3 mb-md-0">
                                        <label for="contact_no" class="form-label">Nomor Kontak</label>
                                        <input type="text" class="form-control" id="contact_no" name="contact_no">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="paypal_id" class="form-label">PayPal ID</label>
                                        <input type="text" class="form-control" id="paypal_id" name="paypal_id">
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Address Information -->
                        <div class="card mb-4">
                            <div class="card-header bg-light">
                                <h5 class="mb-0">
                                    <i class="bi bi-geo-alt-fill text-primary me-2"></i>Informasi Alamat
                                </h5>
                            </div>
                            <div class="card-body">
                                <div class="mb-3">
                                    <label for="address" class="form-label">Alamat</label>
                                    <textarea class="form-control" id="address" name="address" rows="2"></textarea>
                                </div>
                                <div class="mb-0">
                                    <label for="city" class="form-label">Kota</label>
                                    <select class="form-select" id="city" name="city">
                                        <option value="" selected disabled>Pilih kota</option>
                                        <option value="Surabaya">Surabaya</option>
                                        <option value="Jakarta">Jakarta</option>
                                        <option value="Bandung">Bandung</option>
                                        <option value="Medan">Medan</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Form Buttons -->
                        <div class="d-flex justify-content-between">
                            <button type="submit" class="btn btn-primary btn-lg">
                                <i class="bi bi-check2-circle me-2"></i>Daftar
                            </button>
                            <button type="reset" class="btn btn-outline-secondary btn-lg">
                                <i class="bi bi-arrow-counterclockwise me-2"></i>Reset
                            </button>
                        </div>
                    </form>
                </div>
                <div class="card-footer text-center py-3 bg-light">
                    <p class="mb-0">Sudah memiliki akun? <a href="#" class="text-primary">Login di sini</a></p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<!-- Tambahkan link ke Bootstrap Icons jika belum ada di layout utama -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
@endpush