@extends('layouts.front')

@section('title', 'Dumpling Ayam Special - FrozenDelight Surabaya')

@section('content')
<!-- Breadcrumb -->
<div class="container mt-4">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('/') }}" class="text-decoration-none">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ url('/products') }}" class="text-decoration-none">Produk</a></li>
            <li class="breadcrumb-item active" aria-current="page">Dumpling Ayam Special</li>
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
                        <img src="{{ asset('images/sosis.jpg') }}" class="img-fluid rounded-start" alt="Dumpling Ayam Special" id="main-product-image">
                        
                      
                    </div>
                </div>

                <!-- Product Info -->
                <div class="col-md-6">
                    <div class="p-4">
                       

                        <h2 class="mb-2">Dumpling Ayam Special</h2>
                        
                        <div class="d-flex align-items-center mb-3">
                            <h3 class="text-danger fw-bold mb-0">Rp 45.000</h3>
                           
                        </div>


                        <div class="mb-4">
                            <h5>Deskripsi</h5>
                            <p>Dumpling Ayam Special merupakan dimsum premium dengan isian daging ayam pilihan yang dicampur dengan bumbu rahasia khas FrozenDelight. Memiliki kulit yang tipis dan kenyal, serta isian yang juicy dan lezat. Cocok disajikan dengan saus sambal atau kecap asin.</p>
                            <p>Produk ini telah melalui proses pembekuan cepat untuk menjaga kualitas dan kesegaran bahan.</p>
                        </div>


                        <!-- Quantity Selection -->
                        <div class="mb-4">
                            <h5>Jumlah</h5>
                            <div class="input-group" style="width: 150px;">
                                <button class="btn btn-outline-secondary" type="button" id="decrease-qty">
                                    <i class="bi bi-dash"></i>
                                </button>
                                <input type="text" class="form-control text-center" value="1" id="product-quantity">
                                <button class="btn btn-outline-secondary" type="button" id="increase-qty">
                                    <i class="bi bi-plus"></i>
                                </button>
                            </div>
                        </div>

                        <!-- Add to Cart Button -->
                        <div class="d-grid gap-2">
                            <button type="button" class="btn btn-primary btn-lg add-to-cart-btn" data-product-id="1">
                                <i class="bi bi-cart-plus me-2"></i> Tambahkan ke Keranjang
                            </button>
                            <a href="{{ url('/cart') }}" class="btn btn-outline-primary">
                                <i class="bi bi-eye me-2"></i> Lihat Keranjang
                            </a>
                        </div>

                       
                    </div>
                </div>
            </div>
        </div>
    </div>



    <!-- Related Products -->
    <h4 class="mt-5 mb-4">Produk Lainnya</h4>
    <div class="row g-4">
        <!-- Related Product 1 -->
        <div class="col-6 col-md-3">
            <div class="card product-card border-0 shadow-sm h-100">
                <img src="{{ asset('images/sosis.jpg') }}" class="card-img-top" alt="Siomay Udang">
                <div class="card-body">
                    <span class="badge bg-primary mb-2">Dimsum</span>
                    <h5 class="card-title">Siomay Udang Premium</h5>
                    <div class="d-flex justify-content-between align-items-center mb-2">
                        <p class="text-danger fw-bold mb-0">Rp 52.000</p>
                    </div>
                    <div class="d-grid">
                        <a href="#" class="btn btn-outline-primary btn-sm">Lihat Detail</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Related Product 2 -->
        <div class="col-6 col-md-3">
            <div class="card product-card border-0 shadow-sm h-100">
                <img src="{{ asset('images/sosis.jpg') }}" class="card-img-top" alt="Hakau Udang">
                <div class="card-body">
                    <span class="badge bg-primary mb-2">Dimsum</span>
                    <h5 class="card-title">Hakau Udang Special</h5>
                    <div class="d-flex justify-content-between align-items-center mb-2">
                        <p class="text-danger fw-bold mb-0">Rp 48.000</p>
                    </div>
                    <div class="d-grid">
                        <a href="#" class="btn btn-outline-primary btn-sm">Lihat Detail</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Related Product 3 -->
        <div class="col-6 col-md-3">
            <div class="card product-card border-0 shadow-sm h-100">
                <img src="{{ asset('images/sosis.jpg') }}" class="card-img-top" alt="Bakpao Mini">
                <div class="card-body">
                    <span class="badge bg-primary mb-2">Dimsum</span>
                    <h5 class="card-title">Bakpao Mini Aneka Rasa</h5>
                    <div class="d-flex justify-content-between align-items-center mb-2">
                        <p class="text-danger fw-bold mb-0">Rp 38.000</p>
                    </div>
                    <div class="d-grid">
                        <a href="#" class="btn btn-outline-primary btn-sm">Lihat Detail</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Related Product 4 -->
        <div class="col-6 col-md-3">
            <div class="card product-card border-0 shadow-sm h-100">
                <img src="{{ asset('images/sosis.jpg') }}" class="card-img-top" alt="Pangsit Goreng">
                <div class="card-body">
                    <span class="badge bg-primary mb-2">Dimsum</span>
                    <h5 class="card-title">Pangsit Goreng Ayam</h5>
                    <div class="d-flex justify-content-between align-items-center mb-2">
                        <p class="text-danger fw-bold mb-0">Rp 42.000</p>
                    </div>
                    <div class="d-grid">
                        <a href="#" class="btn btn-outline-primary btn-sm">Lihat Detail</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

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