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
        <!-- Welcome Text -->
        <div class="row justify-content-center">
            <div class="col-md-10 text-center">
                <h2 class="fw-bold mb-4">Selamat Datang di MediMart</h2>
                <p class="lead text-muted mb-5">
                    Kami menyediakan berbagai macam alat kesehatan terpercaya dan berkualitas tinggi untuk kebutuhan rumah tangga hingga profesional. MediMart hadir untuk membantu Anda menjaga kesehatan — kapan pun dan di mana pun, dengan layanan ke seluruh dunia.
                </p>
            </div>
        </div>

        <!-- Feature Cards -->
        <div class="row g-4">
            <!-- Card 1: Pengiriman Global -->
            <div class="col-md-4">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body text-center p-4">
                        <div class="rounded-circle bg-primary bg-opacity-10 p-3 d-inline-block mb-3">
                            <i class="bi bi-truck text-primary" style="font-size: 2rem;"></i>
                        </div>
                        <h4 class="card-title">Pengiriman Global</h4>
                        <p class="card-text text-muted">
                            Kami melayani pengiriman alat kesehatan ke seluruh dunia dengan proses yang cepat dan aman.
                        </p>
                    </div>
                </div>
            </div>

            <!-- Card 2: Kualitas Terjamin -->
            <div class="col-md-4">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body text-center p-4">
                        <div class="rounded-circle bg-primary bg-opacity-10 p-3 d-inline-block mb-3">
                            <i class="bi bi-shield-check text-primary" style="font-size: 2rem;"></i>
                        </div>
                        <h4 class="card-title">Kualitas Terjamin</h4>
                        <p class="card-text text-muted">
                            Setiap produk telah lulus uji dan memiliki standar kualitas serta sertifikasi kesehatan internasional.
                        </p>
                    </div>
                </div>
            </div>

            <!-- Card 3: Harga Kompetitif -->
            <div class="col-md-4">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body text-center p-4">
                        <div class="rounded-circle bg-primary bg-opacity-10 p-3 d-inline-block mb-3">
                            <i class="bi bi-currency-exchange text-primary" style="font-size: 2rem;"></i>
                        </div>
                        <h4 class="card-title">Harga Kompetitif</h4>
                        <p class="card-text text-muted">
                            Kami menawarkan produk berkualitas tinggi dengan harga yang bersahabat, serta berbagai promo menarik.
                        </p>
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

</style>

<!-- Script Bootstrap Icons -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
@endsection
