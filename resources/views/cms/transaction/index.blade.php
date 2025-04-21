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
                <th>Payment</th>
                <th>Status</th>
                <th>Total</th>
              </tr>
            </thead>
            <tbody>
              @php $i = 1; @endphp
              @foreach($transactions as $data)
              <tr>
                <td>{{ $i }}</td>
                <td>{{ $data->user->name }}</td>
                <td>{{ $data->shippingMethod->name }}</td>
                <td>{{ $data->payment }}</td>
                <td>{{ $data->status }}</td>
                <td>{{ $data->total }}</td>
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
