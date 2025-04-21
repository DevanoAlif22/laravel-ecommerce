@extends('layouts.front')

@section('title', 'Shopping Cart - FrozenDelight Surabaya')

@section('content')
<!-- Breadcrumb -->
<div class="container mt-4">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('/') }}" class="text-decoration-none">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Keranjang Belanja</li>
        </ol>
    </nav>
</div>

<!-- Cart Section -->
<div class="container my-4">
    <h2 class="mb-4">Keranjang Belanja</h2>
    
    <!-- Cart Items -->
    <div class="card border-0 shadow-sm mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-borderless align-middle">
                    <thead class="table-light">
                        <tr>
                            <th scope="col" style="width: 50%">Produk</th>
                            <th scope="col" class="text-center">Harga</th>
                            <th scope="col" class="text-center">Jumlah</th>
                            <th scope="col" class="text-center">Total</th>
                            <th scope="col" class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Cart Item 1 -->
                        <tr>
                            <td>
                                <div class="d-flex align-items-center">
                                    <img src="{{ asset('images/sosis.jpg') }}" alt="Dumpling Ayam Special" class="img-fluid rounded" style="width: 80px; height: 80px; object-fit: cover;">
                                    <div class="ms-3">
                                        <h6 class="mb-0">Dumpling Ayam Special</h6>
                                        <small class="text-muted">Dimsum Premium</small>
                                    </div>
                                </div>
                            </td>
                            <td class="text-center">Rp 45.000</td>
                            <td class="text-center">
                                <span class="badge bg-light text-dark p-2">1</span>
                            </td>
                            <td class="text-center fw-bold">Rp 45.000</td>
                            <td class="text-center">
                                <button class="btn btn-sm btn-outline-danger remove-item">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </td>
                        </tr>
                        
                        <!-- Cart Item 2 -->
                        <tr>
                            <td>
                                <div class="d-flex align-items-center">
                                    <img src="{{ asset('images/sosis.jpg') }}" alt="Siomay Udang Premium" class="img-fluid rounded" style="width: 80px; height: 80px; object-fit: cover;">
                                    <div class="ms-3">
                                        <h6 class="mb-0">Siomay Udang Premium</h6>
                                        <small class="text-muted">Dimsum Premium</small>
                                    </div>
                                </div>
                            </td>
                            <td class="text-center">Rp 52.000</td>
                            <td class="text-center">
                                <span class="badge bg-light text-dark p-2">2</span>
                            </td>
                            <td class="text-center fw-bold">Rp 104.000</td>
                            <td class="text-center">
                                <button class="btn btn-sm btn-outline-danger remove-item">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            
            <!-- Empty Cart Message (Initially Hidden) -->
            <div id="empty-cart" class="text-center py-5 d-none">
                <i class="bi bi-cart-x" style="font-size: 3rem;"></i>
                <h5 class="mt-3">Keranjang belanja Anda kosong</h5>
                <p class="text-muted">Silakan tambahkan produk ke keranjang Anda.</p>
                <a href="{{ url('/products') }}" class="btn btn-primary mt-3">
                    <i class="bi bi-arrow-left me-2"></i> Lihat Produk
                </a>
            </div>
        </div>
    </div>
    
    <!-- Order Summary -->
    <div class="row">
        <div class="col-lg-8 mb-4">
            <!-- Shipping Method Selection -->
            <div class="card border-0 shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">Metode Pengiriman</h5>
                    <div class="mb-3">
                        <select class="form-select" id="shipping-method">
                            <option selected disabled>Pilih metode pengiriman</option>
                            <option value="regular">Regular (Rp 15.000) - 2-3 hari</option>
                            <option value="express">Express (Rp 25.000) - 1 hari</option>
                            <option value="same-day">Same Day (Rp 35.000) - Hari ini</option>
                            <option value="pickup">Ambil di Toko (Gratis)</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-lg-4">
            <div class="card border-0 shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">Ringkasan Pesanan</h5>
                    <div class="d-flex justify-content-between mb-2">
                        <span>Subtotal</span>
                        <span>Rp 149.000</span>
                    </div>
                    <div class="d-flex justify-content-between mb-2">
                        <span>Biaya Pengiriman</span>
                        <span id="shipping-cost">Rp 15.000</span>
                    </div>
                    <hr>
                    <div class="d-flex justify-content-between mb-3">
                        <strong>Total</strong>
                        <strong class="text-primary" id="total-price">Rp 164.000</strong>
                    </div>
                    
                    <!-- Checkout Buttons -->
                    <div class="d-grid gap-2">
                        <button class="btn btn-primary btn-lg">
                            <i class="bi bi-credit-card me-2"></i> Lanjutkan ke Pembayaran
                        </button>
                        <a href="{{ url('/products') }}" class="btn btn-outline-secondary">
                            <i class="bi bi-arrow-left me-2"></i> Lanjut Belanja
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Script for cart functionality -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const removeItemBtns = document.querySelectorAll('.remove-item');
        const shippingMethodSelect = document.getElementById('shipping-method');
        const shippingCostElement = document.getElementById('shipping-cost');
        const totalPriceElement = document.getElementById('total-price');
        
        // Handle remove item
        removeItemBtns.forEach(function(btn) {
            btn.addEventListener('click', function() {
                if (confirm('Apakah Anda yakin ingin menghapus produk ini dari keranjang?')) {
                    const itemRow = this.closest('tr');
                    itemRow.remove();
                    
                    // Check if cart is empty
                    const cartItems = document.querySelectorAll('tbody tr');
                    if (cartItems.length === 0) {
                        document.querySelector('table').classList.add('d-none');
                        document.getElementById('empty-cart').classList.remove('d-none');
                    }
                    
                    updateCartTotals();
                }
            });
        });
        
        // Handle shipping method change
        shippingMethodSelect.addEventListener('change', function() {
            const shippingMethod = this.value;
            let shippingCost = 0;
            
            // Set shipping cost based on selected method
            switch(shippingMethod) {
                case 'regular':
                    shippingCost = 15000;
                    break;
                case 'express':
                    shippingCost = 25000;
                    break;
                case 'same-day':
                    shippingCost = 35000;
                    break;
                case 'pickup':
                    shippingCost = 0;
                    break;
                default:
                    shippingCost = 15000;
            }
            
            // Update shipping cost display
            shippingCostElement.textContent = `Rp ${shippingCost.toLocaleString('id-ID')}`;
            
            // Update total
            const subtotal = 149000; // Hardcoded for demo
            const total = subtotal + shippingCost;
            totalPriceElement.textContent = `Rp ${total.toLocaleString('id-ID')}`;
        });
        
        // Function to update cart totals
        function updateCartTotals() {
            // In a real implementation, this would recalculate all totals
            // This is just a placeholder for demonstration
            console.log('Cart totals updated');
        }
    });
</script>
@endsection