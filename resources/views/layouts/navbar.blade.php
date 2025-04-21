<!-- Navbar dengan Logo -->
<nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm fixed-top">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
            <span class="fw-bold text-primary">Medi</span><span class="fw-bold text-danger">Mart</span>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
     <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav ms-auto">
        <li class="nav-item">
            <a class="nav-link fw-medium {{ Request::is('/') ? 'active' : '' }}" href="{{ url('/') }}">Beranda</a>
        </li>
        <li class="nav-item">
            <a class="nav-link fw-medium {{ Request::is('products') ? 'active' : '' }}" href="{{ url('/products') }}">Produk</a>
        </li>
        <li class="nav-item">
            <a class="nav-link fw-medium {{ Request::is('baskets') ? 'active' : '' }}" href="{{ url('/baskets') }}">Keranjang</a>
        </li>
        <li class="nav-item">
            <a class="nav-link fw-medium {{ Request::is('detailUser') ? 'active' : '' }}" href="{{ url('/detailUser') }}">Profil</a>
        </li>
    </ul>
    <div class="ms-3 d-flex ">
        <a href="{{ url('/login') }}" class="btn btn-primary">
            <i class="bi bi-person"></i> Login
        </a>
    </div>
</div>

    </div>
</nav>