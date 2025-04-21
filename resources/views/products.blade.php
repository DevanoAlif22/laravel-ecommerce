@extends('layouts.front')
<link rel="stylesheet" href="{{ asset('css/products.css') }}">

@section('title', 'Produk - FrozenDelight Surabaya')

@section('content')

<!-- Header Banner -->
<div class="product-banner text-white">
    <div class="overlay"></div>
    <div class="container position-relative">
        <div class="row align-items-center">
            <div class="col-md-6">
                <h1 class="fw-bold mb-3">Produk Kami</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="{{ url('/') }}" class="text-decoration-none text-white">Home</a>
                        </li>
                        <li class="breadcrumb-item active text-white" aria-current="page">Produk</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>

<!-- Products Section -->
<div class="container mt-5">
    <div class="row">
        <!-- Filter Sidebar -->
        <div class="col-lg-3 mb-4 mb-lg-0">
            <!-- Search -->
            <div class="card border-0 shadow-sm mb-4">
                <div class="card-body">
                    <h5 class="card-title fw-bold mb-3">Pencarian</h5>
                    <form action="{{ url('/products/search') }}" method="GET">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Cari produk..." name="search">
                            <button class="btn btn-primary" type="submit">
                                <i class="bi bi-search"></i>
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Category Filter -->
            <div class="card border-0 shadow-sm mb-4">
                <div class="card-body">
                    <h5 class="card-title fw-bold mb-3">Kategori</h5>
                    <div class="list-group list-group-flush">
                        <a href="{{ url('/products') }}" class="list-group-item list-group-item-action active d-flex justify-content-between align-items-center">Semua Produk</a>
                        <a href="{{ url('/products?category=dimsum') }}" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">Dimsum</a>
                        <a href="{{ url('/products?category=seafood') }}" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">Seafood</a>
                        <a href="{{ url('/products?category=chicken') }}" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">Olahan Ayam</a>
                        <a href="{{ url('/products?category=dessert') }}" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">Dessert</a>
                        <a href="{{ url('/products?category=beef') }}" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">Olahan Daging</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Products Grid -->
        <div class="col-lg-9">
            <div class="row g-4">
                <!-- Product Card 1 -->
                <div class="col-sm-6 col-md-4">
                    <div class="card product-card border-0 shadow-sm h-100">
                        <div class="position-relative">
                            <img src="{{ asset('images/sosis.jpg') }}" class="card-img-top" alt="Product 1">
                            <button class="btn btn-sm btn-outline-secondary position-absolute top-0 start-0 m-2 rounded-circle favorite-btn">
                                <i class="bi bi-heart"></i>
                            </button>
                        </div>
                        <div class="card-body d-flex flex-column">
                            <span class="badge bg-primary mb-2">Dimsum</span>
                            <h5 class="card-title">Dimsum Ayam Udang</h5>
                            <p class="card-text small text-muted mb-3">Dimsum lezat isi ayam dan udang, cocok untuk camilan sehat.</p>
                            <div class="d-flex justify-content-between align-items-center mt-auto">
                                <span class="fw-bold text-danger">Rp 25.000</span>
                            </div>
                            <div class="d-flex mt-3">
                                <a href="#" class="btn btn-primary flex-grow-1 me-2">
                                    <i class="bi bi-cart-plus me-1"></i> Detail Product
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Product Card 2 -->
                <div class="col-sm-6 col-md-4">
                    <div class="card product-card border-0 shadow-sm h-100">
                        <div class="position-relative">
                            <img src="{{ asset('images/sosis.jpg') }}" class="card-img-top" alt="Product 2">
                            <button class="btn btn-sm btn-outline-secondary position-absolute top-0 start-0 m-2 rounded-circle favorite-btn">
                                <i class="bi bi-heart"></i>
                            </button>
                        </div>
                        <div class="card-body d-flex flex-column">
                            <span class="badge bg-primary mb-2">Seafood</span>
                            <h5 class="card-title">Bakso Ikan Tuna</h5>
                            <p class="card-text small text-muted mb-3">Bakso ikan dari daging tuna segar, cocok untuk keluarga.</p>
                            <div class="d-flex justify-content-between align-items-center mt-auto">
                                <span class="fw-bold text-danger">Rp 28.000</span>
                            </div>
                            <div class="d-flex mt-3">
                                <a href="#" class="btn btn-primary flex-grow-1 me-2">
                                    <i class="bi bi-cart-plus me-1"></i> Detail Product
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Product Card 3 -->
                <div class="col-sm-6 col-md-4">
                    <div class="card product-card border-0 shadow-sm h-100">
                        <div class="position-relative">
                            <img src="{{ asset('images/sosis.jpg') }}" class="card-img-top" alt="Product 3">
                            <button class="btn btn-sm btn-outline-secondary position-absolute top-0 start-0 m-2 rounded-circle favorite-btn">
                                <i class="bi bi-heart"></i>
                            </button>
                        </div>
                        <div class="card-body d-flex flex-column">
                            <span class="badge bg-primary mb-2">Dessert</span>
                            <h5 class="card-title">Mango Sticky Rice</h5>
                            <p class="card-text small text-muted mb-3">Makanan penutup khas Thailand berbahan mangga dan ketan.</p>
                            <div class="d-flex justify-content-between align-items-center mt-auto">
                                <span class="fw-bold text-danger">Rp 20.000</span>
                            </div>
                            <div class="d-flex mt-3">
                                <a href="#" class="btn btn-primary flex-grow-1 me-2">
                                    <i class="bi bi-cart-plus me-1"></i> Detail Product
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Tambahkan lebih banyak card di sini jika perlu -->

            </div>
        </div>
    </div>
</div>

@endsection
