@extends('../../layout.adminlte')
@section('content')
  <!-- Content Wrapper. Contains page content -->

  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">List Category</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <div class="contanainer-fluid d-flex flex-row-reverse path">
      <div class="d-flex">
          <a href="{{route('dashboard')}}" >Dashboard</a>
          <p>>></p>
          <a href="{{route('admin.category.index')}}" >Category</a>
      </div>
    </div>
    <div class="contanainer-fluid d-flex flex-row-reverse">
        <a href="{{route('admin.category.create')}}" class="add"><i class="fa-solid fa-plus" style="color:white;"></i> Add Category</a>
      </div>
    <!-- Main content -->
    <section class="content" >
      <div class="container-fluid" style="background-color: white; border-top: 2px solid #3c8dbc; padding-bottom:15px;">
        <!-- Small boxes (Stat box) -->
        <h4>Category</h4>
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
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $i = 1;
                        @endphp
                        @foreach($categories as $data)
                        <tr>
                            <td>{{ $i }}</td>
                            <td>{{ $data->name }}</td>
                            <td>
                                <div class="d-flex" style="flex-direction: column">
                                    <a href="/admin/category/edit/{{$data->id}}" class="edit d-flex mb-2" style="width: 85px;"><i class="mt-1 fa-solid fa-pen-to-square" style="color:white; margin-right:5px;"></i> Edit</a>
                                    <a href="/admin/category/delete/{{$data->id}}" onclick="confirmDelete(event)" class="delete d-flex"  style="width: 85px;"><i class="mt-1 fa-solid fa-trash" style="color:white;margin-right:5px;"></i> Delete</a>
                                </div>
                            </td>
                            @php
                            $i += 1;
                            @endphp
                        </tr>
                        @endforeach
                        <!-- Tambahkan baris data yang lain di sini -->
                    </tbody>
                </table>
            </div>
        </div>
        <!-- /.row -->
        <!-- Main row -->
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->

</div>
<!-- ./wrapper -->
<script>
    function confirmDelete(event) {
        if (confirm("Are you sure you want to delete this data?")) {
            // Jika pengguna mengonfirmasi, lanjutkan dengan mengikuti tautan
            window.location.href = event.target.parentElement.href;
        } else {
            // Jika pengguna membatalkan, hentikan default action (tidak mengikuti tautan)
            event.preventDefault();
        }
    }
</script>
@endsection
