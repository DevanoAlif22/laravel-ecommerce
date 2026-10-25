@extends('layouts.front')

@section('title', 'FrozenDelight Surabaya - Frozen Food Premium')

@section('content')


<!-- Hero Section -->
<section class="hero-section" style="margin-top: 76px;">
    <div class="container-fluid px-0">
        <div class="position-relative">
          <div class="hero-image" style="height: 600px; background: linear-gradient(rgba(0,0,0,0.4), rgba(0,0,0,0.4)), url('{{ asset('images/hero-bg.jpg') }}') no-repeat center center; background-size: cover;">
</div>
         <div class="position-absolute top-50 start-50 translate-middle text-center text-white">
    <h1 class="display-3 fw-bold">MediMart Global</h1>
    <p class="lead mb-4">Solusi terpercaya untuk kebutuhan alat kesehatan Anda, kapan pun dan di mana pun</p>
    <a href="{{ url('/products') }}" class="btn btn-primary btn-lg px-5 py-3 rounded-pill">Belanja Sekarang</a>
</div>

        </div>
    </div>
</section>

<!-- Welcome Section -->
<section class="welcome-section py-5">
    <div class="container">
        <!-- Welcome Header -->
        <div class="row justify-content-center text-center mb-5">
            <div class="col-lg-9 col-xl-8">
                <span class="welcome-badge mb-3">
                    <i class="bi bi-shield-check me-1"></i> Standar Distribusi Alat Kesehatan Resmi
                </span>
                <h2 class="welcome-title fw-bold mt-2 mb-3">Selamat Datang di MediMart</h2>
                <p class="welcome-lead mx-auto mb-0">
                    Penyedia instrumen dan perlengkapan medis terstandarisasi untuk kebutuhan fasilitas layanan kesehatan, klinik praktek mandiri, hingga perawatan keluarga di rumah dengan jaminan mutu dan kepastian purna jual.
                </p>
            </div>
        </div>

        <!-- 4 Feature Pillars -->
        <div class="row g-4">
            <!-- Pillar 1: Layanan Terpercaya (Kolom Baru) -->
            <div class="col-12 col-sm-6 col-lg-3">
                <div class="welcome-card h-100 d-flex flex-column">
                    <div class="welcome-icon-box mb-3">
                        <i class="bi bi-headset"></i>
                    </div>
                    <h3 class="welcome-card-title">Layanan Terpercaya</h3>
                    <p class="welcome-card-desc flex-grow-1">
                        Konsultasi teknis spesifikasi produk oleh tim responsif, panduan pengoperasian alat, serta pendampingan klaim garansi yang jelas dan mudah.
                    </p>
                    <div class="welcome-tag mt-auto">
                        <i class="bi bi-check2"></i>
                        <span>Bantuan Teknis & Garansi</span>
                    </div>
                </div>
            </div>

            <!-- Pillar 2: Kualitas Terjamin -->
            <div class="col-12 col-sm-6 col-lg-3">
                <div class="welcome-card h-100 d-flex flex-column">
                    <div class="welcome-icon-box mb-3">
                        <i class="bi bi-patch-check"></i>
                    </div>
                    <h3 class="welcome-card-title">Kualitas Terjamin</h3>
                    <p class="welcome-card-desc flex-grow-1">
                        Seluruh produk melalui uji kelayakan fisik dan fungsi, memiliki izin edar resmi, serta memenuhi standar kalibrasi instrumen medis.
                    </p>
                    <div class="welcome-tag mt-auto">
                        <i class="bi bi-check2"></i>
                        <span>Izin Edar Resmi</span>
                    </div>
                </div>
            </div>

            <!-- Pillar 3: Pengiriman Cepat & Aman -->
            <div class="col-12 col-sm-6 col-lg-3">
                <div class="welcome-card h-100 d-flex flex-column">
                    <div class="welcome-icon-box mb-3">
                        <i class="bi bi-box-seam"></i>
                    </div>
                    <h3 class="welcome-card-title">Pengiriman Cepat & Aman</h3>
                    <p class="welcome-card-desc flex-grow-1">
                        Kemasan proteksi khusus untuk menjaga keutuhan alat sensitif selama pengiriman, didukung jangkauan luas dan pelacakan resi akurat.
                    </p>
                    <div class="welcome-tag mt-auto">
                        <i class="bi bi-check2"></i>
                        <span>Proteksi Ekstra Aman</span>
                    </div>
                </div>
            </div>

            <!-- Pillar 4: Harga Kompetitif -->
            <div class="col-12 col-sm-6 col-lg-3">
                <div class="welcome-card h-100 d-flex flex-column">
                    <div class="welcome-icon-box mb-3">
                        <i class="bi bi-tags"></i>
                    </div>
                    <h3 class="welcome-card-title">Harga Kompetitif</h3>
                    <p class="welcome-card-desc flex-grow-1">
                        Struktur harga transparan tanpa biaya terselubung, efisien baik untuk pengadaan berkala klinik maupun pembelian perseorangan.
                    </p>
                    <div class="welcome-tag mt-auto">
                        <i class="bi bi-check2"></i>
                        <span>Efisiensi Pengadaan</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Featured Products -->
<section class="featured-products py-5 bg-light">
    <div class="container">
        <h2 class="text-center fw-bold mb-5">Produk Terbaru</h2>
        <div class="row g-4">
            <!-- Product 1 -->
            @foreach ($products as $item)
            <div class="col-6 col-md-3">
                <div class="card product-card border-0 shadow-sm h-100">
                    <div class="category-label">{{ $item->category->name
                     }}</div> <!-- Kategori produk -->
                    <img src="/public/uploads/product/{{ $item->image }}" class="card-img-top" alt="Dumpling">
                    <div class="card-body">
                        <h5 class="card-title">{{ $item->name }}</h5>
                        <p class="card-text text-muted">{{ \Illuminate\Support\Str::limit($item->description, 100) }}</p>
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <p class="text-danger fw-bold mb-0">Rp {{ number_format($item->price, 0, ',', '.') }}</p>
                        </div>
                        <div class="d-grid">
                            <a href="/product/detail/{{$item->id}}" class="btn btn-primary">Detail Produk</a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>



        <div class="text-center mt-4">
            <a href="{{ url('/products') }}" class="btn btn-outline-primary">Lihat Semua Produk</a>
        </div>
    </div>
</section>

<!-- Testimonials -->
<!-- Testimonials -->
<section class="testimonials-section py-5">
    <div class="container">
        <h2 class="text-center fw-bold mb-5">Ulasan Pelanggan</h2>
        
        <div class="row">
            <!-- Form Ulasan (Kiri) -->
            <div class="col-md-4">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body p-4">
                        <h4 class="card-title text-center mb-4">Tulis Ulasan</h4>
                        <form id="reviewForm" action="" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="name" class="form-label">Nama Anda</label>
                                <input type="text" class="form-control" id="name" name="name" required>
                            </div>
                            
                            <div class="mb-3">
                                <label for="review" class="form-label">Ulasan Anda</label>
                                <textarea class="form-control" id="review" name="review" rows="6" required></textarea>
                            </div>
                            
                            <div class="d-grid">
                                <button type="submit" class="btn btn-primary">Kirim Ulasan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            
            <!-- Testimonial Slider (Kanan) -->
            <div class="col-md-8">
                <div id="testimonialCarousel" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <!-- Testimonial 1 -->
                        <div class="carousel-item active">
                            <div class="card border-0 shadow-sm mx-2">
                                <div class="card-body p-4">
                                    <div class="d-flex align-items-center mb-3">
                                      
                                        <div>
                                            <h5 class="mb-0">Ahmad Fauzi</h5>
                                            <small class="text-muted">15 April 2025</small>
                                        </div>
                                    </div>
                                    <p class="card-text">"Saya sangat puas dengan tensimeter digital yang saya beli dari MediMart. Pengirimannya cepat dan produknya sangat akurat. Cocok untuk monitoring tekanan darah secara mandiri di rumah. Staf customer service juga sangat membantu ketika saya memiliki pertanyaan tentang penggunaan produk."</p>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Testimonial 2 -->
                        <div class="carousel-item">
                            <div class="card border-0 shadow-sm mx-2">
                                <div class="card-body p-4">
                                    <div class="d-flex align-items-center mb-3">
                                      
                                        <div>
                                            <h5 class="mb-0">Siti Rahma</h5>
                                            <small class="text-muted">10 April 2025</small>
                                        </div>
                                    </div>
                                    <p class="card-text">"Alat cek gula darah yang saya beli sangat mudah digunakan dan hasilnya akurat. Pelayanan MediMart juga sangat responsif, mereka membantu saya memilih produk yang tepat sesuai kebutuhan. Pengiriman juga cepat meskipun ke alamat saya yang cukup jauh. Sangat merekomendasikan untuk kebutuhan alat kesehatan."</p>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Testimonial 3 -->
                        <div class="carousel-item">
                            <div class="card border-0 shadow-sm mx-2">
                                <div class="card-body p-4">
                                    <div class="d-flex align-items-center mb-3">
                                      
                                        <div>
                                            <h5 class="mb-0">Budi Santoso</h5>
                                            <small class="text-muted">5 April 2025</small>
                                        </div>
                                    </div>
                                    <p class="card-text">"Saya membeli beberapa alat kesehatan untuk klinik saya dan semuanya berkualitas tinggi. Proses pengiriman internasional juga lancar tanpa kendala. Tim MediMart sangat profesional dalam menangani pesanan dalam jumlah besar dan memberikan solusi yang tepat untuk kebutuhan klinik kami. Pasti akan berbelanja kembali di sini."</p>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Testimonial 4 -->
                        <div class="carousel-item">
                            <div class="card border-0 shadow-sm mx-2">
                                <div class="card-body p-4">
                                    <div class="d-flex align-items-center mb-3">
                                      
                                        <div>
                                            <h5 class="mb-0">Dewi Lestari</h5>
                                            <small class="text-muted">1 April 2025</small>
                                        </div>
                                    </div>
                                    <p class="card-text">"Saya baru saja menerima pesanan termometer digital dan pulse oximeter dari MediMart. Kualitasnya sangat baik dan harganya terjangkau. Pengiriman juga tepat waktu dan aman sampai tujuan. Saya sangat senang bisa menemukan semua kebutuhan alat kesehatan untuk keluarga dalam satu toko online yang terpercaya."</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Controls -->
                    <button class="carousel-control-prev" type="button" data-bs-target="#testimonialCarousel" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon bg-primary rounded-circle" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#testimonialCarousel" data-bs-slide="next">
                        <span class="carousel-control-next-icon bg-primary rounded-circle" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                    
                    <!-- Indicators -->
                    <div class="carousel-indicators position-relative mt-3">
                        <button type="button" data-bs-target="#testimonialCarousel" data-bs-slide-to="0" class="active bg-primary" aria-current="true" aria-label="Slide 1"></button>
                        <button type="button" data-bs-target="#testimonialCarousel" data-bs-slide-to="1" class="bg-primary" aria-label="Slide 2"></button>
                        <button type="button" data-bs-target="#testimonialCarousel" data-bs-slide-to="2" class="bg-primary" aria-label="Slide 3"></button>
                        <button type="button" data-bs-target="#testimonialCarousel" data-bs-slide-to="3" class="bg-primary" aria-label="Slide 4"></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>







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

<!-- Tambahkan style untuk bagian testimonials -->

    /* Style untuk testimonial section */
    .testimonials-section {
        background-color: #f8f9fa;
    }
    
    .testimonial-slider .carousel-item {
        padding: 20px 10px;
    }
    
    #testimonialCarousel .card {
        transition: transform 0.3s ease;
        min-height: 280px;
    }
    
    #testimonialCarousel .card:hover {
        transform: translateY(-5px);
    }
    
    .carousel-control-prev-icon,
    .carousel-control-next-icon {
        padding: 15px;
    }
    
    .carousel-indicators {
        bottom: -10px;
    }
    
    .carousel-indicators button {
        width: 10px;
        height: 10px;
        border-radius: 50%;
        margin: 0 5px;
    }
    
    /* Responsive adjustments */
    @media (max-width: 767.98px) {
        .col-md-4 {
            margin-bottom: 30px;
        }
    }


    /* ==========================================================================
       Welcome Section - Distinctive Medical E-commerce Styling
       ========================================================================== */
    .welcome-section {
        background-color: #ffffff;
        padding-top: 4rem;
        padding-bottom: 4rem;
    }

    .welcome-badge {
        display: inline-flex;
        align-items: center;
        font-size: 0.8125rem;
        font-weight: 600;
        color: #0284c7;
        background-color: #f0f9ff;
        border: 1px solid #bae6fd;
        padding: 5px 14px;
        border-radius: 9999px;
    }

    .welcome-title {
        font-size: 2.15rem;
        color: #0f283d;
        letter-spacing: -0.02em;
    }

    .welcome-lead {
        font-size: 1.05rem;
        line-height: 1.7;
        color: #475569;
        max-width: 680px;
    }

    .welcome-card {
        background: #ffffff;
        border: 1px solid #e2e8f0;
        border-top: 3px solid #0284c7;
        border-radius: 12px;
        padding: 1.75rem 1.4rem;
        transition: transform 0.2s ease, border-color 0.2s ease, box-shadow 0.2s ease;
    }

    .welcome-card:hover {
        transform: translateY(-4px);
        border-color: #0284c7;
        box-shadow: 0 12px 24px -6px rgba(15, 40, 61, 0.08);
    }

    .welcome-icon-box {
        width: 48px;
        height: 48px;
        border-radius: 10px;
        background-color: #f0f9ff;
        border: 1px solid #e0f2fe;
        color: #0284c7;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.4rem;
        transition: background-color 0.2s ease, color 0.2s ease;
    }

    .welcome-card:hover .welcome-icon-box {
        background-color: #0284c7;
        color: #ffffff;
    }

    .welcome-card-title {
        font-size: 1.1rem;
        font-weight: 700;
        color: #0f283d;
        margin-bottom: 0.5rem;
        letter-spacing: -0.01em;
    }

    .welcome-card-desc {
        font-size: 0.885rem;
        line-height: 1.6;
        color: #64748b;
        margin-bottom: 1.25rem;
    }

    .welcome-tag {
        display: inline-flex;
        align-items: center;
        gap: 5px;
        font-size: 0.775rem;
        font-weight: 600;
        color: #0369a1;
        background: #f8fafc;
        border: 1px solid #e2e8f0;
        padding: 4px 10px;
        border-radius: 6px;
        width: fit-content;
    }

    .welcome-tag i {
        font-size: 0.85rem;
        color: #0284c7;
    }

    @media (max-width: 767.98px) {
        .welcome-title {
            font-size: 1.65rem;
        }
        .welcome-lead {
            font-size: 0.95rem;
        }
    }

</style>

<!-- Script Bootstrap Icons -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
@endsection
