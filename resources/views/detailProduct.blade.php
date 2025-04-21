@extends('layouts.front')

@section('title', 'MediMart - Detail')

@section('content')
<!-- Breadcrumb -->
<div class="container mt-4">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('/') }}" class="text-decoration-none">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ url('/products') }}" class="text-decoration-none">Produk</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{$product->name}}</li>
        </ol>
    </nav>
</div>

<!-- Product Detail Section -->
<div class="container my-4">
    <div class="card border-0 shadow-sm">
        <div class="card-body p-0">
            <div class="row g-0">
                <!-- Product Images -->
                <div class="col-md-6">
                    <div class="product-image-container">
                        <img src="/public/uploads/product/{{ $product->image }}" class="img-fluid rounded-start" alt="Dumpling Ayam Special" id="main-product-image">


                    </div>
                </div>

                <!-- Product Info -->
                <div class="col-md-6">
                    <div class="p-4">
                        @if ($errors->any() || Session::get('success'))
                                @include('layout/info')
                        @endif
                        <h2 class="mb-2">{{ $product->name }}</h2>
                        <div class="d-flex align-items-center mb-3">
                            <h3 class="text-danger fw-bold mb-0">Rp {{ number_format($product->price, 0, ',', '.') }}</h3>

                        </div>


                        <div class="mb-4">
                            <h5>Deskripsi</h5>
                            <p>{{ $product->description }}</p>
                        </div>

                        <form action="/product/add/cart" method="post">
                            @csrf
                            <!-- Quantity Selection -->
                            <div class="mb-4">
                                <input type="hidden" name="product_id" value="{{ $product->id }}">
                                <h5>Jumlah</h5>
                                <div class="input-group" style="width: 150px;">
                                    <button class="btn btn-outline-secondary" type="button" id="decrease-qty">
                                        <i class="bi bi-dash"></i>
                                    </button>
                                    <input type="number" class="form-control text-center" name="amount" value="1" id="product-quantity">
                                    <button class="btn btn-outline-secondary" type="button" id="increase-qty">
                                        <i class="bi bi-plus"></i>
                                    </button>
                                </div>
                            </div>

                            <!-- Add to Cart Button -->
                            <div class="d-grid gap-2">
                                <button type="submit" class="btn btn-primary btn-lg add-to-cart-btn" data-product-id="1">
                                    <i class="bi bi-cart-plus me-2"></i> Tambahkan ke Keranjang
                                </button>
                                <a href="{{ url('/cart') }}" class="btn btn-outline-primary">
                                    <i class="bi bi-eye me-2"></i> Lihat Keranjang
                                </a>
                            </div>
                        </form>


                    </div>
                </div>
            </div>
        </div>
    </div>



    <!-- Related Products -->
    <h4 class="mt-5 mb-4">Produk Lainnya</h4>
    <div class="row g-4">
        <!-- Related Product -->
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
                            <a href="#" class="btn btn-primary">Detail Produk</a>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>

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

<!-- Script untuk ganti gambar dan quantity -->
<script>
    // Function to change main product image when clicking thumbnails

    // Quantity controls
    document.addEventListener('DOMContentLoaded', function() {
        const quantityInput = document.getElementById('product-quantity');
        const decreaseBtn = document.getElementById('decrease-qty');
        const increaseBtn = document.getElementById('increase-qty');

        decreaseBtn.addEventListener('click', function() {
            let currentValue = parseInt(quantityInput.value);
            if (currentValue > 1) {
                quantityInput.value = currentValue - 1;
            }
        });

        increaseBtn.addEventListener('click', function() {
            let currentValue = parseInt(quantityInput.value);
            quantityInput.value = currentValue + 1;
        });

          });


</script>
<!-- Additional CSS -->

@endsection
