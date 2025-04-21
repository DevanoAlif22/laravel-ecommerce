<!-- Footer -->
<footer class="bg-dark text-white pt-5 pb-4">
    <div class="container">
        <div class="row text-md-start text-center">
            <!-- Kolom 1: Brand & Deskripsi -->
            <div class="col-md-4 mb-4">
                <h5 class="fw-bold mb-3">FrozenDelight</h5>
                <p>Menyediakan frozen food berkualitas premium dengan harga terjangkau untuk keluarga Surabaya.</p>
                <div class="d-flex justify-content-md-start justify-content-center mt-3">
                    <a href="#" class="text-white me-3"><i class="bi bi-facebook"></i></a>
                    <a href="#" class="text-white me-3"><i class="bi bi-instagram"></i></a>
                    <a href="#" class="text-white"><i class="bi bi-whatsapp"></i></a>
                </div>
            </div>

            <!-- Kolom 2: Navigasi -->
            <div class="col-md-2 mb-4 offset-md-1">
                <h5 class="fw-bold mb-3">Menu</h5>
                <ul class="list-unstyled">
                    <li class="mb-2"><a href="{{ url('/') }}" class="text-white text-decoration-none">Home</a></li>
                    <li class="mb-2"><a href="{{ url('/products') }}" class="text-white text-decoration-none">Produk</a></li>
                    <li class="mb-2"><a href="{{ url('/categories') }}" class="text-white text-decoration-none">Kategori</a></li>
                    <li class="mb-2"><a href="{{ url('/promo') }}" class="text-white text-decoration-none">Promo</a></li>
                </ul>
            </div>

            <!-- Kolom 3: Kontak -->
            <div class="col-md-4 mb-4 offset-md-1">
                <h5 class="fw-bold mb-3">Kontak</h5>
                <ul class="list-unstyled">
                    <li class="mb-2"><i class="bi bi-geo-alt me-2"></i>Jl. Raya Frozen No. 123, Surabaya</li>
                    <li class="mb-2"><i class="bi bi-telephone me-2"></i>(031) 456-7890</li>
                    <li class="mb-2"><i class="bi bi-envelope me-2"></i>info@frozendelight.com</li>
                    <li class="mb-2"><i class="bi bi-clock me-2"></i>Senin - Sabtu: 08:00 - 20:00</li>
                </ul>
            </div>
        </div>

        <!-- Garis pemisah -->
        <hr class="border-secondary my-4">

        <!-- Copyright & Links -->
        <div class="row text-md-start text-center">
            <div class="col-md-6 mb-2">
                <p class="mb-0">&copy; 2025 <strong>FrozenDelight</strong>. All Rights Reserved.</p>
            </div>
            <div class="col-md-6 text-md-end">
                <a href="{{ url('/terms') }}" class="text-white text-decoration-none me-3">Terms & Conditions</a>
                <a href="{{ url('/privacy') }}" class="text-white text-decoration-none">Privacy Policy</a>
            </div>
        </div>
    </div>
</footer>
