<!-- Navbar dengan Logo -->
<nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm fixed-top">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
            <span class="fw-bold text-primary">Frozen</span><span class="fw-bold text-danger">Delight</span>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link active fw-medium" href="{{ url('/') }}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link fw-medium" href="{{ url('/products') }}">Produk</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link fw-medium" href="{{ url('/categories') }}">Kategori</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link fw-medium" href="{{ url('/promo') }}">Promo</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link fw-medium" href="{{ url('/about') }}">Tentang Kami</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link fw-medium" href="{{ url('/contact') }}">Kontak</a>
                </li>
            </ul>
            <div class="ms-3 d-flex">
                <a href="{{ url('/cart') }}" class="btn btn-outline-primary me-2">
                    <i class="bi bi-cart3"></i> <span class="badge bg-danger">0</span>
                </a>
                <a href="{{ url('/login') }}" class="btn btn-primary">
                    <i class="bi bi-person"></i> Login
                </a>
            </div>
        </div>
    </div>
</nav>