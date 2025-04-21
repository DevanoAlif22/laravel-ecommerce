@extends('../../layout.adminlte')
@section('content')
<div class="content-wrapper">
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">List Transaction</h1>
        </div>
      </div>
    </div>
  </div>

  <div class="container-fluid d-flex flex-row-reverse path">
    <div class="d-flex">
      <a href="{{ route('dashboard') }}">Dashboard</a>
      <p>>></p>
      <a href="{{ route('admin.transaction.index') }}">Transaction</a>
    </div>
  </div>

  <section class="content">
    <div class="container-fluid" style="background-color: white; border-top: 2px solid #3c8dbc; padding-bottom:15px;">
      <h4>Transaction</h4>
      <div class="row">
        @if ($errors->any() || Session::get('success'))
          @include('layout/info')
        @endif
        <div class="container-fluid mt-5">
          <table id="example" class="table table-striped table-bordered" style="width:100%">
            <thead>
              <tr>
                <th>No</th>
                <th>User</th>
                <th>Shipping</th>
                <th>Status</th>
                <th>Total</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              @php $i = 1; @endphp
              @foreach($transactions as $data)
              <tr>
                <td>{{ $i }}</td>
                <td>{{ $data->user->name }}</td>
                <td>{{ $data->shippingMethod->name }}</td>
                <td>
                    @if ($data->status == 'Menunggu')
                        <span class="badge bg-warning text-dark">Menunggu</span>
                    @elseif ($data->status == 'Gagal')
                        <span class="badge bg-danger">Gagal</span>
                    @elseif ($data->status == 'Berhasil')
                        <span class="badge bg-success">Berhasil</span>
                    @else
                        <span class="badge bg-secondary">{{ $data->status }}</span>
                    @endif
                </td>
                <td>{{ $data->total }}</td>
                <td>
                {{-- jika berhasil bisa href invoice, jika masih menunggu bisa dibatalkan --}}
                @if ($data->status == 'Berhasil')
                    <a href="/invoice/{{$data->id}}" class="btn btn-primary btn-sm">
                        <i class="bi bi-file-ear-fill"></i> Invoice
                    </a>
                @elseif ($data->status == 'Menunggu')
                    <div class="d-flex gap-3">
                        <a href="/invoice/{{$data->id}}" class="btn btn-primary btn-sm">
                            <i class="bi bi-file-ear-fill"></i> Invoice
                        </a>
                        <a href="/admin/invoice/cancel/{{$data->id}}" class="btn btn-primary btn-danger">
                            <i class="bi bi-file-ear-fill"></i> Cancel
                        </a>
                    </div>
                @else
                    <button class="btn btn-secondary btn-sm" disabled>
                        <i class="bi bi-x-circle"></i> Tidak Tersedia
                    </button>
                @endif
            </td>
                @php $i++; @endphp
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </section>
</div>

<script>
  function confirmDelete(e) {
    if (!confirm("Are you sure you want to delete this transaction?")) {
      e.preventDefault();
    }
  }
</script>
@endsection
