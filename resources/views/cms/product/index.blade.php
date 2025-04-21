@extends('../../layout.adminlte')
@section('content')
<div class="content-wrapper">
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">List Product</h1>
        </div>
      </div>
    </div>
  </div>

  <div class="container-fluid d-flex flex-row-reverse path">
    <div class="d-flex">
      <a href="{{ route('dashboard') }}">Dashboard</a>
      <p>>></p>
      <a href="{{ route('admin.product.index') }}">Product</a>
    </div>
  </div>

  <div class="container-fluid d-flex flex-row-reverse mb-2">
    <a href="{{ route('admin.product.create') }}" class="add">
      <i class="fa-solid fa-plus" style="color:white;"></i> Add Product
    </a>
  </div>

  <section class="content">
    <div class="container-fluid" style="background-color: white; border-top: 2px solid #3c8dbc; padding-bottom:15px;">
      <h4>Product</h4>
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
                <th>Description</th>
                <th>Category</th>
                <th>Price</th>
                <th>Photo</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              @php $i = 1; @endphp
              @foreach($products as $data)
              <tr>
                <td>{{ $i }}</td>
                <td>{{ $data->name }}</td>
                <td>{{ \Illuminate\Support\Str::limit($data->description, 100) }}</td>
                <td>{{ $data->category->name ?? '-' }}</td>
                <td>Rp{{ number_format($data->price, 0, ',', '.') }}</td>
                <td>
                  <img src="/public/uploads/product/{{ $data->image }}" style="width:120px; height:120px;" alt="">
                </td>
                <td>
                  <div class="d-flex" style="flex-direction: column">
                    <a href="{{ route('admin.product.edit', $data->id) }}" class="edit d-flex mb-2" style="width: 85px;">
                      <i class="mt-1 fa-solid fa-pen-to-square" style="color:white; margin-right:5px;"></i> Edit
                    </a>
                    <a href="{{ route('admin.product.delete', $data->id) }}" onclick="confirmDelete(event)" class="delete d-flex" style="width: 85px;">
                      <i class="mt-1 fa-solid fa-trash" style="color:white;margin-right:5px;"></i> Delete
                    </a>
                  </div>
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
    if (!confirm("Are you sure you want to delete this product?")) {
      e.preventDefault();
    }
  }
</script>
@endsection
