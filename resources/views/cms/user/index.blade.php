@extends('../../layout.adminlte')
@section('content')
<div class="content-wrapper">
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">List User</h1>
        </div>
      </div>
    </div>
  </div>

  <div class="container-fluid d-flex flex-row-reverse path">
    <div class="d-flex">
      <a href="{{ route('dashboard') }}">Dashboard</a>
      <p>>></p>
      <a href="{{ route('admin.user.index') }}">User</a>
    </div>
  </div>

  <section class="content">
    <div class="container-fluid" style="background-color: white; border-top: 2px solid #3c8dbc; padding-bottom:15px;">
      <h4>User</h4>
      <div class="row">
        @if ($errors->any() || Session::get('success'))
          @include('layout/info')
        @endif
        <div class="container-fluid mt-5">
          <table id="example" class="table table-striped table-bordered" style="width:100%">
            <thead>
              <tr>
                <th>No</th>
                <th>Name</th>
                <th>Email</th>
                <th>Gender</th>
                <th>Address</th>
                <th>Contact</th>
                <th>Bill</th>
              </tr>
            </thead>
            <tbody>
              @php $i = 1; @endphp
              @foreach($users as $data)
              <tr>
                <td>{{ $i }}</td>
                <td>{{ $data->name }}</td>
                <td>{{ $data->email }}</td>
                <td>{{ $data->gender }}</td>
                <td>{{ $data->address }}</td>
                <td>{{ $data->contact }}</td>
                <td>{{ $data->bill }}</td>
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
    if (!confirm("Are you sure you want to delete this product?")) {
      e.preventDefault();
    }
  }
</script>
@endsection
