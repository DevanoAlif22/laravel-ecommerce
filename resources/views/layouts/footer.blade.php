<!-- Footer -->
<footer class="bg-dark text-white pt-5 pb-4">
    <div class="container">
        <div class="row">
            <div class="col-md-4 mb-4 mb-md-0">
                <h5 class="fw-bold mb-3">FrozenDelight</h5>
                <p class="text-muted">Menyediakan frozen food berkualitas premium dengan harga terjangkau untuk keluarga Surabaya.</p>
                <div class="d-flex mt-3">
                    <a href="#" class="text-white me-3"><i class="bi bi-facebook"></i></a>
                    <a href="#" class="text-white me-3"><i class="bi bi-instagram"></i></a>
                    <a href="#" class="text-white me-3"><i class="bi bi-whatsapp"></i></a>
                </div>
            </div>
            <div class="col-md-2 mb-4 mb-md-0">
                <h5 class="fw-bold mb-3">Menu</h5>
                <ul class="list-unstyled">
                    <li class="mb-2"><a href="{{ url('/') }}" class="text-decoration-none text-muted">Home</a></li>
                    <li class="mb-2"><a href="{{ url('/products') }}" class="text-decoration-none text-muted">Produk</a></li>
                    <li class="mb-2"><a href="{{ url('/categories') }}" class="text-decoration-none text-muted">Kategori</a></li>
                    <li class="mb-2"><a href="{{ url('/promo') }}" class="text-decoration-none text-muted">Promo</a></li>
                </ul>
            </div>
            <div class="col-md-3 mb-4 mb-md-0">
                <h5 class="fw-bold mb-3">Informasi</h5>
                <ul class="list-unstyled">
                    <li class="mb-2"><a href="{{ url('/about') }}" class="text-decoration-none text-muted">Tentang Kami</a></li>
                    <li class="mb-2"><a href="{{ url('/contact') }}" class="text-decoration-none text-muted">Kontak</a></li>
                    <li class="mb-2"><a href="{{ url('/shipping') }}" class="text-decoration-none text-muted">Pengiriman</a></li>
                    <li class="mb-2"><a href="{{ url('/faq') }}" class="text-decoration-none text-muted">FAQ</a></li>
                </ul>
            </div>
            <div class="col-md-3">
                <h5 class="fw-bold mb-3">Kontak</h5>
                <ul class="list-unstyled">
                    <li class="mb-2 text-muted"><i class="bi bi-geo-alt me-2"></i> Jl. Raya Frozen No. 123, Surabaya</li>
                    <li class="mb-2 text-muted"><i class="bi bi-telephone me-2"></i> (031) 456-7890</li>
                    <li class="mb-2 text-muted"><i class="bi bi-envelope me-2"></i> info@frozendelight.com</li>
                    <li class="mb-2 text-muted"><i class="bi bi-clock me-2"></i> Senin - Sabtu: 08:00 - 20:00</li>
                </ul>
            </div>
        </div>
        <hr class="my-4">
        <div class="row">
            <div class="col-md-6 mb-3 mb-md-0">
                <p class="text-muted mb-0">&copy; 2025 FrozenDelight. All Rights Reserved.</p>
            </div>
            <div class="col-md-6 text-md-end">
                <a href="{{ url('/terms') }}" class="text-decoration-none text-muted me-3">Terms & Conditions</a>
                <a href="{{ url('/privacy') }}" class="text-decoration-none text-muted">Privacy Policy</a>
            </div>
        </div>
    </div>
</footer>