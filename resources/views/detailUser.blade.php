@extends('layouts.front')

@section('title', 'Detail Profil - Toko Alat Kesehatan')

@section('content')
<div class="container my-5">
    <div class="row">
  
        <div class="col-md-10 offset-1 mt-5">

          <div class="card shadow border-0 mb-4">
    <div class="card-header bg-white d-flex justify-content-between align-items-center py-3">
        <h5 class="mb-0 text-primary">
            <i class="bi bi-person-lines-fill me-2"></i>Informasi Profil
        </h5>
    </div>
    <div class="card-body">
        <div class="row mb-4">
            <div class="col-md-6 mb-3 mb-md-0">
                <div class="mb-3">
                    <label class="form-label text-muted small">Username</label>
                    <p class="mb-0 fw-bold">{{ $user->name }}</p>
                </div>
                <div class="mb-3">
                    <label class="form-label text-muted small">Email</label>
                    <p class="mb-0 fw-bold">{{ $user->email }}</p>
                </div>
                <div class="mb-0">
                    <label class="form-label text-muted small">Tanggal Lahir</label>
                    <p class="mb-0 fw-bold">{{ \Carbon\Carbon::parse($user->birth)->translatedFormat('d F Y') }}</p>
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3">
                    <label class="form-label text-muted small">Jenis Kelamin</label>
                    <p class="mb-0 fw-bold">{{ $user->gender == 'Male' ? 'Laki-laki' : 'Perempuan' }}</p>
                </div>
                <div class="mb-3">
                    <label class="form-label text-muted small">Nomor Kontak</label>
                    <p class="mb-0 fw-bold">{{ $user->contact }}</p>
                </div>
                <div class="mb-0">
                    <label class="form-label text-muted small">PayPal ID</label>
                    <p class="mb-0 fw-bold">{{ $user->bill }}</p>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Address Information Card -->
<div class="card shadow border-0 mb-4">
    <div class="card-header bg-white d-flex justify-content-between align-items-center py-3">
        <h5 class="mb-0 text-primary">
            <i class="bi bi-geo-alt-fill me-2"></i>Informasi Alamat
        </h5>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-12">
                <div class="mb-3">
                    <label class="form-label text-muted small">Alamat Lengkap</label>
                    <p class="mb-0 fw-bold">{{ $user->address }}</p>
                </div>
                <div class="mb-0">
                    <label class="form-label text-muted small">Kota</label>
                    <p class="mb-0 fw-bold">{{ $user->city }}</p>
                </div>
            </div>
        </div>
    </div>
</div>


            <!-- Recent Purchases -->
            <div class="card shadow border-0">
                <div class="card-header bg-white d-flex justify-content-between align-items-center py-3">
                    <h5 class="mb-0 text-primary">
                        <i class="bi bi-clock-history me-2"></i>Riwayat Pembelian
                    </h5>
                </div>
                @if ($errors->any() || Session::get('success'))
                        @include('layout/info')
                @endif
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead class="table-light">
                                <tr>
                                    <th scope="col">Nomor</th>
                                    <th scope="col">Tanggal</th>
                                    <th scope="col">Total</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                           <tbody>
    @forelse ($transactions as $transaction)
        <tr>
            <td>{{ $loop->iteration }}</td>

            <td>{{ \Carbon\Carbon::parse($transaction->created_at)->format('d M Y') }}</td>
            <td>Rp {{ number_format($transaction->total, 0, ',', '.') }}</td>
            <td>
                @php
                    $status = strtolower($transaction->status);
                    $badgeClass = match($status) {
                        'berhasil' => 'bg-success',
                        'menunggu' => 'bg-warning',
                        'gagal' => 'bg-danger',
                        default => 'bg-secondary',
                    };
                @endphp
                <span class="badge {{ $badgeClass }}">{{ ucfirst($transaction->status) }}</span>
            </td>
            <td>
                {{-- jika berhasil bisa href invoice, jika masih menunggu bisa dibatalkan --}}
                @if ($transaction->status == 'Berhasil')
                    <a href="/invoice/{{$transaction->id}}" class="btn btn-primary btn-sm">
                        <i class="bi bi-file-ear-fill"></i> Invoice
                    </a>
                @elseif ($transaction->status == 'Menunggu')
                    <div class="d-flex  gap-3">
                        <a href="/invoice/{{$transaction->id}}" class="btn btn-primary btn-sm">
                            <i class="bi bi-file-ear-fill"></i> Invoice
                        </a>
                        <a href="/invoice/cancel/{{$transaction->id}}" class="btn btn-primary btn-danger">
                            <i class="bi bi-file-ear-fill"></i> Cancel
                        </a>
                    </div>
                @else
                    <button class="btn btn-secondary btn-sm" disabled>
                        <i class="bi bi-x-circle"></i> Tidak Tersedia
                    </button>
                @endif
            </td>
        </tr>
    @empty
        <tr>
            <td colspan="4" class="text-center">Belum ada riwayat pembelian.</td>
        </tr>
    @endforelse
</tbody>

                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<!-- Tambahkan link ke Bootstrap Icons jika belum ada di layout utama -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
@endpush