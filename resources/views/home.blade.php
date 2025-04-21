@extends('layouts.front')

@section('title', 'FrozenDelight Surabaya - Frozen Food Premium')

@section('content')


<!-- Hero Section -->
<section class="hero-section" style="margin-top: 76px;">
    <div class="container-fluid px-0">
        <div class="position-relative">
            <div class="hero-image" style="height: 600px; background: linear-gradient(rgba(0,0,0,0.4), rgba(0,0,0,0.4)), url('https://source.unsplash.com/random/1200x600/?frozen-food') no-repeat center center; background-size: cover;">
            </div>
            <div class="position-absolute top-50 start-50 translate-middle text-center text-white">
                <h1 class="display-3 fw-bold">FrozenDelight Surabaya</h1>
                <p class="lead mb-4">Solusi praktis makanan beku premium untuk keluarga Anda</p>
                <a href="{{ url('/products') }}" class="btn btn-primary btn-lg px-5 py-3 rounded-pill">Belanja Sekarang</a>
            </div>
        </div>
    </div>
</section>

<!-- Welcome Section -->
<section class="welcome-section py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10 text-center">
                <h2 class="fw-bold mb-4">Selamat Datang di FrozenDelight</h2>
                <p class="lead text-muted mb-5">Kami menyediakan berbagai macam frozen food berkualitas premium untuk memenuhi kebutuhan kuliner Anda. Diolah dengan bahan-bahan segar dan proses yang higienis, produk kami siap memanjakan lidah Anda dan keluarga.</p>
            </div>
        </div>
        
        <!-- Feature Cards -->
        <div class="row g-4">
            <div class="col-md-4">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body text-center p-4">
                        <div class="rounded-circle bg-primary bg-opacity-10 p-3 d-inline-block mb-3">
                            <i class="bi bi-truck text-primary" style="font-size: 2rem;"></i>
                        </div>
                        <h4 class="card-title">Pengiriman Cepat</h4>
                        <p class="card-text text-muted">Kami mengirimkan produk frozen food dengan cepat langsung ke rumah Anda di seluruh area Surabaya.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body text-center p-4">
                        <div class="rounded-circle bg-primary bg-opacity-10 p-3 d-inline-block mb-3">
                            <i class="bi bi-shield-check text-primary" style="font-size: 2rem;"></i>
                        </div>
                        <h4 class="card-title">Kualitas Terjamin</h4>
                        <p class="card-text text-muted">Produk kami diolah dengan standar keamanan pangan tertinggi dan menggunakan bahan premium.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body text-center p-4">
                        <div class="rounded-circle bg-primary bg-opacity-10 p-3 d-inline-block mb-3">
                            <i class="bi bi-currency-exchange text-primary" style="font-size: 2rem;"></i>
                        </div>
                        <h4 class="card-title">Harga Bersaing</h4>
                        <p class="card-text text-muted">Dapatkan produk berkualitas dengan harga yang terjangkau dan berbagai penawaran menarik.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>



<!-- Featured Products -->
<section class="featured-products py-5 bg-light">
    <div class="container">
        <h2 class="text-center fw-bold mb-5">Produk Unggulan</h2>
        <div class="row g-4">
            <!-- Product 1 -->
            <div class="col-6 col-md-3">
                <div class="card product-card border-0 shadow-sm h-100">
                    <div class="category-label">Makanan</div> <!-- Kategori produk -->
                    <img src="{{ asset('images/sosis.jpg') }}" class="card-img-top" alt="Dumpling">
                    <div class="card-body">
                        <h5 class="card-title">Bakso Sapi Premium</h5>
                        <p class="card-text text-muted">Nikmati rasa bakso sapi premium yang lembut dan gurih. Cocok untuk makan keluarga atau sebagai camilan lezat!</p>
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <p class="text-danger fw-bold mb-0">Rp 65.000</p>
                        </div>
                        <div class="d-grid">
                            <a href="#" class="btn btn-primary">Tambah ke Keranjang</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Product 2 -->
            <div class="col-6 col-md-3">
                <div class="card product-card border-0 shadow-sm h-100">
                    <div class="category-label">Makanan</div> <!-- Kategori produk -->
                    <img src="{{ asset('images/sosis.jpg') }}" class="card-img-top" alt="Dumpling">
                    <div class="card-body">
                        <h5 class="card-title">Bakso Sapi Premium</h5>
                        <p class="card-text text-muted">Nikmati rasa bakso sapi premium yang lembut dan gurih. Cocok untuk makan keluarga atau sebagai camilan lezat!</p>
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <p class="text-danger fw-bold mb-0">Rp 65.000</p>
                        </div>
                        <div class="d-grid">
                            <a href="#" class="btn btn-primary">Tambah ke Keranjang</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Product 3 -->
            <div class="col-6 col-md-3">
                <div class="card product-card border-0 shadow-sm h-100">
                    <div class="category-label">Makanan</div> <!-- Kategori produk -->
                    <img src="{{ asset('images/sosis.jpg') }}" class="card-img-top" alt="Dumpling">
                    <div class="card-body">
                        <h5 class="card-title">Bakso Sapi Premium</h5>
                        <p class="card-text text-muted">Nikmati rasa bakso sapi premium yang lembut dan gurih. Cocok untuk makan keluarga atau sebagai camilan lezat!</p>
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <p class="text-danger fw-bold mb-0">Rp 65.000</p>
                        </div>
                        <div class="d-grid">
                            <a href="#" class="btn btn-primary">Tambah ke Keranjang</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Product 4 -->
            <div class="col-6 col-md-3">
                <div class="card product-card border-0 shadow-sm h-100">
                    <div class="category-label">Makanan</div> <!-- Kategori produk -->
                    <img src="{{ asset('images/sosis.jpg') }}" class="card-img-top" alt="Dumpling">
                    <div class="card-body">
                        <h5 class="card-title">Bakso Sapi Premium</h5>
                        <p class="card-text text-muted">Nikmati rasa bakso sapi premium yang lembut dan gurih. Cocok untuk makan keluarga atau sebagai camilan lezat!</p>
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <p class="text-danger fw-bold mb-0">Rp 65.000</p>
                        </div>
                        <div class="d-grid">
                            <a href="#" class="btn btn-primary">Tambah ke Keranjang</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        
        
        <div class="text-center mt-4">
            <a href="{{ url('/products') }}" class="btn btn-outline-primary">Lihat Semua Produk</a>
        </div>
    </div>
</section>

<!-- Testimonials -->






<!-- CSS tambahan -->
<style>
    /* Animasi hover untuk kartu produk */
    .product-card:hover, .category-card:hover {
        transform: translateY(-5px);
        transition: transform 0.3s ease;
        box-shadow: 0 10px 20px rgba(0,0,0,0.1) !important;
    }

    /* Style untuk navbar */
    .navbar-brand {
        font-size: 1.5rem;
    }
    
    /* Style untuk hero section */
    .hero-section {
        margin-bottom: 50px;
    }
    
    /* Style tambahan untuk kartu kategori */
    .category-card img {
        height: 160px;
        object-fit: cover;
    }
    
    /* Style tambahan untuk produk */
    .product-card img {
        height: 180px;
        object-fit: cover;
    }
    
    /* Custom style untuk heading */
    h2 {
        position: relative;
        display: inline-block;
        padding-bottom: 10px;
    }
    
    h2:after {
        content: '';
        position: absolute;
        width: 60px;
        height: 3px;
        background-color: #0d6efd;
        bottom: 0;
        left: 50%;
        transform: translateX(-50%);
    }
    
    /* Custom style untuk animasi link */
    a.btn {
        transition: all 0.3s ease;
    }
    
    a.btn:hover {
        transform: scale(1.05);
    }
    .product-card {
    position: relative;
}

.category-label {
    position: absolute;
    top: 10px;
    left: 10px;
    padding: 5px 10px;
    background-color: rgba(0, 0, 0, 0.5);
    color: #fff;
    font-weight: bold;
    font-size: 14px;
    border-radius: 5px;
}

.card-img-top {
    border-radius: 5px 5px 0 0;
}

.card-body {
    padding: 15px;
}

.card-title {
    font-size: 16px;
    font-weight: bold;
}

.card-text {
    font-size: 14px;
    color: #6c757d;
}

.btn-primary {
    background-color: #007bff;
    border-color: #007bff;
    transition: background-color 0.3s;
}

.btn-primary:hover {
    background-color: #0056b3;
    border-color: #0056b3;
}

</style>

<!-- Script Bootstrap Icons -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
@endsection