@extends('layouts.front')

@section('title', 'Invoice Pembelian - Toko Alat Kesehatan')

@section('content')
<div class="container my-5 ">
    <div class="row justify-content-center ">
        <div class="col-lg-10">

            <!-- Judul Invoice -->
            <div class="text-center mb-5 mt-5">
                <h2 class="text-primary">
                    <i class="bi bi-receipt-cutoff me-2"></i>Invoice Pembelian
                </h2>
                <p class="text-muted">Berikut adalah ringkasan lengkap transaksi Anda.</p>
            </div>

            <!-- Informasi Pengguna -->
            <div class="card mb-4 shadow-sm border-0">
                <div class="card-header bg-white">
                    <h5 class="mb-0 text-primary"><i class="bi bi-person-circle me-2"></i>Informasi Pengguna</h5>
                </div>
                <div class="card-body">
                    <div class="row gy-2">
                        <div class="col-md-6">
                            <p><strong>Username:</strong> johndoe123</p>
                            <p><strong>Email:</strong> johndoe@example.com</p>
                            <p><strong>Tanggal Lahir:</strong> 15 Maret 1990</p>
                            <p><strong>Jenis Kelamin:</strong> Laki-laki</p>
                        </div>
                        <div class="col-md-6">
                            <p><strong>Nomor Kontak:</strong> +62 812 3456 7890</p>
                            <p><strong>PayPal ID:</strong> johndoe@paypal.com</p>
                            <p><strong>Alamat:</strong> Jl. Pahlawan No. 123, RT 01/RW 02, Kelurahan Sukamaju</p>
                            <p><strong>Kota:</strong> Jakarta</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Informasi Pesanan -->
            <div class="card mb-4 shadow-sm border-0">
                <div class="card-header bg-white">
                    <h5 class="mb-0 text-primary"><i class="bi bi-box-seam me-2"></i>Informasi Pesanan</h5>
                </div>
                <div class="card-body">
                    <div class="row gy-2">
                        <div class="col-md-6">
                            <p><strong>Order ID:</strong> #ORD-2023-001</p>
                            <p><strong>Tanggal Pembelian:</strong> 10 April 2023</p>
                        </div>
                        <div class="col-md-6">
                            <p><strong>Status:</strong> <span class="badge bg-success px-3 py-1">Selesai</span></p>
                            <p><strong>Total Pembayaran:</strong> Rp 750.000</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Informasi Pembayaran -->
            <div class="card shadow-sm border-0">
                <div class="card-header bg-white">
                    <h5 class="mb-0 text-primary"><i class="bi bi-credit-card-2-back me-2"></i>Informasi Pembayaran</h5>
                </div>
                <div class="card-body">
                    <p><strong>Metode Pembayaran:</strong> PayPal</p>
                    <p><strong>ID Pembayaran:</strong> johndoe@paypal.com</p>
                    <p><strong>Status Pembayaran:</strong> <span class="badge bg-success px-3 py-1">Lunas</span></p>
                </div>
            </div>

            <!-- Footer Invoice -->
            <div class="text-center mt-5">
                <small class="text-muted">Invoice ini dicetak secara otomatis dan tidak memerlukan tanda tangan.</small>
            </div>

        </div>
    </div>
</div>
@endsection

@push('scripts')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
@endpush
