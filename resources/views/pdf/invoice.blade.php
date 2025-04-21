@extends('layouts.front')

@section('title', 'Invoice Pembelian - FrozenDelight Surabaya')

@section('content')

<div class="container my-5 print-area">
    <div class="row justify-content-center">
        <div class="col-lg-10">

            <!-- Judul Invoice -->
            <div class="text-center mb-5 mt-5">
                <h2 class="text-primary">
                    <i class="bi bi-receipt-cutoff me-2"></i>Invoice Pembelian
                </h2>
                <p class="text-muted">Berikut adalah ringkasan lengkap transaksi Anda.</p>
            </div>

            <!-- Informasi Pengguna -->
            <div class="card mb-4 shadow-sm border-0">
                <div class="card-header bg-white">
                    <h5 class="mb-0 text-primary"><i class="bi bi-person-circle me-2"></i>Informasi Pengguna</h5>
                </div>
                <div class="card-body">
                    <div class="row gy-2">
                        <div class="col-md-6">
                            <p><strong>Nama:</strong> {{ $transaction->user->name }}</p>
                            <p><strong>Email:</strong> {{ $transaction->user->email }}</p>
                            <p><strong>Nomor Telepon:</strong> {{ $transaction->user->contact ?? '-' }}</p>
                        </div>
                        <div class="col-md-6">
                            <p><strong>Alamat Pengiriman:</strong> {{ $transaction->user->address ?? '-' }}</p>
                            <p><strong>Kota:</strong> {{ $transaction->user->city ?? '-' }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Informasi Pesanan -->
            <div class="card mb-4 shadow-sm border-0">
                <div class="card-header bg-white">
                    <h5 class="mb-0 text-primary"><i class="bi bi-box-seam me-2"></i>Informasi Pesanan</h5>
                </div>
                <div class="card-body">
                    <div class="row gy-2">
                        <div class="col-md-6">
                            <p><strong>Order ID:</strong> #{{ $transaction->id }}</p>
                            <p><strong>Tanggal Pemesanan:</strong> {{ \Carbon\Carbon::parse($transaction->created_at)->format('d F Y H:i') }}</p>
                            <p><strong>Metode Pengiriman:</strong> {{ $transaction->shippingMethod->name ?? '-' }}</p>
                        </div>
                        <div class="col-md-6">
                            {{-- <p><strong>Subtotal:</strong> Rp {{ number_format($transaction->subtotal, 0, ',', '.') }}</p> --}}
                            <p><strong>Biaya Pengiriman:</strong> Rp {{ number_format($transaction->shippingMethod->cost, 0, ',', '.') }}</p>
                            <p><strong>Total Pembayaran:</strong> <span class="fw-bold text-primary">Rp {{ number_format($transaction->total, 0, ',', '.') }}</span></p>
                        </div>
                    </div>

                    <!-- Detail Item -->
                    <h6 class="mt-4 mb-3">Detail Item</h6>
                    <div class="table-responsive">
                        <table class="table table-borderless">
                            <thead class="table-light">
                                <tr>
                                    <th>Produk</th>
                                    <th class="text-center">Harga</th>
                                    <th class="text-center">Jumlah</th>
                                    <th class="text-end">Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($transaction->cart as $item)
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <img src="/public/uploads/product/{{ $item->product->image }}" 
                                                alt="{{ $item->product->name ?? 'Produk' }}" 
                                                class="img-fluid rounded" 
                                                style="width: 50px; height: 50px; object-fit: cover;">
                                            <div class="ms-3">
                                                <h6 class="mb-0">{{ $item->product->name ?? 'Produk' }}</h6>
                                                <small class="text-muted">{{ $item->product->category->name ?? 'Kategori' }}</small>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="text-center">Rp {{ number_format($item->product->price, 0, ',', '.') }}</td>
                                    <td class="text-center">{{ $item->amount }}</td>
                                    <td class="text-end">Rp {{ number_format($item->total, 0, ',', '.') }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- Informasi Pembayaran -->
            <div class="card shadow-sm border-0 mb-4">
                <div class="card-header bg-white">
                    <h5 class="mb-0 text-primary"><i class="bi bi-credit-card-2-back me-2"></i>Informasi Pembayaran</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <p><strong>ID Pembayaran:</strong> {{$transaction->id}}</p>
                            <p><strong>Metode Pembayaran:</strong> Midtrans Payment Gateway</p>
                                <p><strong>Status Pembayaran:</strong> 
                                @if($transaction->status == 'Berhasil')
                                    <span class="badge bg-success px-3 py-1">Berhasil</span>
                                @elseif($transaction->status == 'Menunggu')
                                    <span class="badge bg-warning px-3 py-1">Menunggu Pembayaran</span>
                                @elseif($transaction->status == 'Gagal')
                                    <span class="badge bg-danger px-3 py-1">Gagal</span>
                                @else
                                    <span class="badge bg-secondary px-3 py-1">{{ $transaction->status }}</span>
                                @endif
                            </p>
                        </div>
                        <div class="col-md-6">
                            @if($transaction->status != 'Berhasil')
                                <div class="text-end">
                                    <button class="btn btn-primary" id="pay-button">
                                        <i class="bi bi-credit-card me-2"></i>Bayar Sekarang
                                    </button>
                                </div>
                            @else
                                <div class="text-end">
                                    <button onclick="window.print()" class="btn btn-outline-primary">
                                        <i class="bi bi-printer me-2"></i>Cetak Invoice
                                    </button>
                                </div>
                            @endif
                            {{-- ini kalau sudah berhasil aku mau ada tombol cetak jadi pdf gitu --}}
                        </div>
                    </div>
                </div>
            </div>

            <!-- Tindakan -->
            <div class="d-flex justify-content-between">
                <a href="{{ route('home') }}" class="btn btn-outline-secondary">
                    <i class="bi bi-arrow-left me-2"></i>Kembali ke Beranda
                </a>
                
                @if($transaction->payment_status == 'paid')
                    <a href="{{ route('invoice.print', $transaction->id) }}" class="btn btn-outline-primary" target="_blank">
                        <i class="bi bi-printer me-2"></i>Cetak Invoice
                    </a>
                @endif
            </div>

            <!-- Footer Invoice -->
            <div class="text-center mt-5">
                <small class="text-muted">Invoice ini dicetak secara otomatis dan tidak memerlukan tanda tangan.</small>
            </div>

            <!-- Error container untuk hasil operasi pembayaran -->
            <div id="result-json" class="mt-3 d-none"></div>

        </div>
    </div>
</div>
@endsection

<!-- Pastikan client key disertakan dalam script tag -->
<script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{env('MIDTRANS_CLIENT_KEY')}}"></script>
<script type="text/javascript">
    document.addEventListener('DOMContentLoaded', function() {
        const payButton = document.getElementById('pay-button');
        
        if (payButton) {
            payButton.onclick = function() {
                // SnapToken yang didapat dari controller
                console.log('{{ $transaction->token }}');
                
                snap.pay('{{ $transaction->token }}', {
                    // Optional
                    onSuccess: function(result) {
                        // Redirect ke halaman sukses dengan ID transaksi
                        window.location.href = '{{ route("checkout-success", $transaction->id) }}';
                    },
                    // Optional
                    onPending: function(result) {
                        // Tampilkan pesan bahwa pembayaran sedang diproses
                        alert('Pembayaran sedang diproses. Silakan cek status pembayaran secara berkala.');
                        console.log(result);
                    },
                    // Optional
                    onError: function(result) {
                        // Tampilkan pesan error
                        alert('Pembayaran gagal. Silakan coba lagi.');
                        console.log(result);
                        document.getElementById('result-json').innerHTML = JSON.stringify(result, null, 2);
                        document.getElementById('result-json').classList.remove('d-none');
                    },
                    // Optional
                    onClose: function() {
                        // Tampilkan pesan ketika user menutup popup pembayaran
                        alert('Anda menutup popup pembayaran tanpa menyelesaikan pembayaran');
                    }
                });
            };
        }
    });
</script>
@push('scripts')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
@endpush