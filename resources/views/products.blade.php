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
                    <form action="/products/by/search" method="post">
                        @csrf
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
                        @foreach ($categories as $item)
                        <a href="/products/{{$item->id}}" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">{{$item->name}}</a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

        <!-- Products Grid -->
        <div class="col-lg-9">
            <div class="row g-4">
                <!-- Product Card -->
                @if ($products->isEmpty())
                    <div class="col-12">
                        <div class="alert alert-warning text-center" role="alert">
                            Tidak ada produk yang ditemukan.
                        </div>
                    </div>

                @else
                @foreach ($products as $item)
                    <div class="col-sm-6 col-md-4">
                        <div class="card product-card border-0 shadow-sm h-100">
                            <div class="position-relative">
                                <img src="/public/uploads/product/{{ $item->image }}" class="card-img-top" alt="Product 1">
                            </div>
                            <div class="card-body d-flex flex-column">
                                <span class="badge bg-primary mb-2">{{$item->category->name}}</span>
                                <h5 class="card-title">{{$item->name}}</h5>
                                <p class="card-text small text-muted mb-3">{{ \Illuminate\Support\Str::limit($item->description, 100) }}</p>
                                <div class="d-flex justify-content-between align-items-center mt-auto">
                                    <span class="fw-bold text-danger">Rp {{ number_format($item->price, 0, ',', '.') }}</span>
                                </div>
                                <div class="d-flex mt-3">
                                    <a href="/product/detail/{{$item->id}}" class="btn btn-primary flex-grow-1 me-2">
                                        <i class="bi bi-cart-plus me-1"></i> Detail Produk
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
                @endif
            </div>
        </div>
    </div>
</div>

@endsection
