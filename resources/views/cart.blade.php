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
    @if ($errors->any() || Session::get('success'))
            @include('layout/info')
    @endif
    <!-- Cart Items -->
    <div class="card border-0 shadow-sm mb-4">
        <div class="card-body">
            @if($cart)
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
                            @foreach($cart as $item)
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <img src="/public/uploads/product/{{ $item->product->image }}" alt="{{ $item->product->name ?? 'Produk' }}" class="img-fluid rounded" style="width: 80px; height: 80px; object-fit: cover;">
                                        <div class="ms-3">
                                            <h6 class="mb-0">{{ $item->product->name ?? 'Produk' }}</h6>
                                            <small class="text-muted">{{ $item->product->category->name ?? 'Kategori' }}</small>
                                        </div>
                                    </div>
                                </td>
                                <td class="text-center">Rp {{ number_format($item->total / $item->amount, 0, ',', '.') }}</td>
                                <td class="text-center">
                                    <span class="badge bg-light text-dark p-2">{{ $item->amount }}</span>
                                </td>
                                <td class="text-center fw-bold">Rp {{ number_format($item->total, 0, ',', '.') }}</td>
                                <td class="text-center">
                                    <a href="/cart/delete/{{ $item->id }}"
                                    onclick="return confirm('Yakin ingin menghapus item ini?')"
                                    class="btn btn-sm btn-outline-danger">
                                        <i class="bi bi-trash"></i>
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <!-- Empty Cart Message -->
                <div id="empty-cart" class="text-center py-5">
                    <i class="bi bi-cart-x" style="font-size: 3rem;"></i>
                    <h5 class="mt-3">Keranjang belanja Anda kosong</h5>
                    <p class="text-muted">Silakan tambahkan produk ke keranjang Anda.</p>
                    <a href="{{ url('/products') }}" class="btn btn-primary mt-3">
                        <i class="bi bi-arrow-left me-2"></i> Lihat Produk
                    </a>
                </div>
            @endif
        </div>
    </div>

    @if($cart)
    <!-- Order Summary -->
    <div class="row">
        <div class="col-lg-8 mb-4">
            <!-- Shipping Method Selection -->
            <div class="card border-0 shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">Metode Pengiriman</h5>
                    <div class="mb-3">
                        <select class="form-select" id="shipping-method" name="shipping_method">
                            <option selected disabled>Pilih metode pengiriman</option>
                            @foreach($shippingMethod as $method)
                                <option value="{{ $method->id }}" data-cost="{{ $method->cost }}">
                                    {{ $method->name }} (Rp {{ number_format($method->cost, 0, ',', '.') }}) - {{ $method->description }}
                                </option>
                            @endforeach
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
                        <span>Rp {{ number_format($subtotal, 0, ',', '.') }}</span>
                    </div>
                    <div class="d-flex justify-content-between mb-2">
                        <span>Biaya Pengiriman</span>
                        <span id="shipping-cost">Rp 0</span>
                    </div>
                    <hr>
                    <div class="d-flex justify-content-between mb-3">
                        <strong>Total</strong>
                        <strong class="text-primary" id="total-price">Rp {{ number_format($subtotal, 0, ',', '.') }}</strong>
                    </div>

                    <!-- Checkout Buttons -->
                    <form action="/checkout" method="POST" id="checkout-form">
                        @csrf
                        <input type="hidden" name="shipping_method_id" id="selected-shipping-method">
                        <input type="hidden" name="total" id="hidden-total" value="{{ $subtotal }}">
                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-primary btn-lg" id="checkout-button" disabled>
                                <i class="bi bi-credit-card me-2"></i> Lanjutkan ke Pembayaran
                            </button>
                            <a href="{{ url('/products') }}" class="btn btn-outline-secondary">
                                <i class="bi bi-arrow-left me-2"></i> Lanjut Belanja
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endif
</div>

<!-- Script for cart functionality -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const removeItemBtns = document.querySelectorAll('.remove-item');
        const shippingMethodSelect = document.getElementById('shipping-method');
        const shippingCostElement = document.getElementById('shipping-cost');
        const totalPriceElement = document.getElementById('total-price');
        const checkoutButton = document.getElementById('checkout-button');
        const selectedShippingMethodInput = document.getElementById('selected-shipping-method');

        // Subtotal dari controller
        const subtotal = {{ $subtotal ?? 0 }};

        // Handle shipping method change
        if (shippingMethodSelect) {
            shippingMethodSelect.addEventListener('change', function() {
                const option = this.options[this.selectedIndex];
                const shippingCost = parseInt(option.getAttribute('data-cost')) || 0;
                const shippingMethodId = this.value;

                // Update hidden input for form submission
                selectedShippingMethodInput.value = shippingMethodId;

                // Update shipping cost display
                shippingCostElement.textContent = `Rp ${shippingCost.toLocaleString('id-ID')}`;

                // Update total
                const total = subtotal + shippingCost;
                totalPriceElement.textContent = `Rp ${total.toLocaleString('id-ID')}`;
                document.getElementById('hidden-total').value = total;

                // Enable checkout button when shipping method is selected
                checkoutButton.disabled = false;
            });
        }

        // Function to update cart totals
        function updateCartTotals(newSubtotal) {
            // Update subtotal display
            document.querySelector('.d-flex.justify-content-between.mb-2 span:last-child').textContent =
                `Rp ${newSubtotal.toLocaleString('id-ID')}`;

            // Get current shipping cost
            const shippingCostText = shippingCostElement.textContent.replace('Rp ', '').replace('.', '');
            const shippingCost = parseInt(shippingCostText.replace(/\D/g, '')) || 0;

            // Update total
            const total = newSubtotal + shippingCost;
            totalPriceElement.textContent = `Rp ${total.toLocaleString('id-ID')}`;
        }
    });
</script>
@endsection
