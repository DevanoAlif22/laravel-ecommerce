@extends('../../layout.add-cms')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Edit Product</h1>
          </div>
        </div>
      </div>
    </div>

    <!-- Breadcrumb -->
    <div class="contanainer-fluid d-flex flex-row-reverse path">
        <div class="d-flex">
            <a href="{{ route('dashboard') }}">Dashboard</a>
            <p>>></p>
            <a href="{{ route('admin.product.index') }}">Product</a>
            <p>>></p>
            <a href="{{ route('admin.product.edit', $product->id) }}">Edit Product</a>
        </div>
    </div>

    <!-- Main content -->
    <form action="{{ route('admin.product.update', $product->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        <section class="content">
            <div class="container-fluid" style="background-color: white; border-top: 2px solid #7f7f7f; padding-bottom:15px;">
                <div class="row p-3">
                    @if ($errors->any() || Session::get('success'))
                        @include('layout/info')
                    @endif
                    <div class="col-lg-12 mt-3" style="border-radius:3px; border: 3px solid #3c8dbc; padding:10px;">
                        <ul class="nav nav-tabs" style="background-color:#3c8dbc;" id="productTabs" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="content-tab" data-toggle="tab" href="#content" role="tab" aria-controls="content" aria-selected="true"><b>Content</b></a>
                            </li>
                        </ul>
                        <div class="tab-content" id="productTabsContent">
                            <div class="tab-pane fade show active" id="content" role="tabpanel" aria-labelledby="content-tab">

                                <!-- Name -->
                                <div class="form-group mt-3">
                                    <label for="name">Name <span style="color:red;">*</span></label>
                                    <input type="text" name="name" value="{{ old('name', $product->name) }}" required class="form-control" autocomplete="off">
                                </div>

                                <!-- Description -->
                                <div class="form-group mt-3">
                                    <label for="description">Description <span style="color:red;">*</span></label>
                                    <textarea name="description" required class="form-control" rows="4">{{ old('description', $product->description) }}</textarea>
                                </div>

                                <!-- Category -->
                                <div class="form-group mt-3">
                                    <label for="category_id">Category <span style="color:red;">*</span></label>
                                    <select name="category_id" required class="form-control">
                                        <option value="">-- Select Category --</option>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}" {{ old('category_id', $product->category_id) == $category->id ? 'selected' : '' }}>
                                                {{ $category->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <!-- Price -->
                                <div class="form-group mt-3">
                                    <label for="price">Price (Rp) <span style="color:red;">*</span></label>
                                    <input type="number" name="price" value="{{ old('price', $product->price) }}" required class="form-control" step="0.01">
                                </div>

                                <!-- Existing Image -->
                                <div class="form-group mt-3">
                                    <p><b>Existing Image</b></p>
                                    <img src="/public/uploads/product/{{ $product->image }}" style="width: 150px; height: 150px;" alt="">
                                </div>

                                <!-- Upload New Image -->
                                <div class="form-group mt-3">
                                    <label for="image">Change Image (optional, max 600kb)</label>
                                    <input type="file" class="form-control" name="image">
                                </div>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="mt-3 btn btn-success">Save</button>
                </div>
            </div>
        </section>
    </form>
</div>
@endsection
