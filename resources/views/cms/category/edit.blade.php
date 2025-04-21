@extends('../../layout.add-cms')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
          <div class="container-fluid">
            <div class="row mb-2">
              <div class="col-sm-6">
                <h1 class="m-0">Edit Category</h1>
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
                <p>>></p>
                <a href="/admin/category/edit/{{$category->id}}" >Edit Category</a>

            </div>
          </div>
        <!-- Main content -->
        <form action="" method="post" enctype="multipart/form-data">
            @csrf
            <section class="content" >
              <div class="container-fluid" style="background-color: white; border-top: 2px solid #7f7f7f; padding-bottom:15px;">
                <!-- Small boxes (Stat box) -->
                <div class="row p-3">
                    @if ($errors->any() || Session::get('success'))
                        @include('layout/info')
                    @endif
                    <div class="col-lg-12 mt-3" style="border-radius:3px; border: 3px solid #3c8dbc;  padding:10px;">

                            <ul class="nav nav-tabs" style="background-color:#3c8dbc;" id="categoryTabs" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="content-tab" data-toggle="tab" href="#content" role="tab" aria-controls="content" aria-selected="true"><b>Content</b></a>
                                </li>
                            </ul>
                            <div class="tab-content" id="categoryTabsContent">
                                <div class="tab-pane fade show active" id="content" role="tabpanel" aria-labelledby="content-tab">
                                    <!-- Input for Category Name -->
                                    <input type="hidden" name="id" value="{{$category->id}}">
                                    <div class="form-group mt-3">
                                        <label for="categoryName">Name <span style="color:red;">*</span></label>
                                        <input type="text" value="{{$category->name}}" required autocomplete="off" class="form-control" id="categoryName" name="name">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="mt-3 btn btn-success">Save</button>
                </div>
                <!-- /.row -->
                <!-- Main row -->
                <!-- /.row (main row) -->
              </div><!-- /.container-fluid -->
            </section>
        </form>
        <!-- /.content -->
      </div>
      <!-- Control Sidebar -->
      <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
      </aside>
      <!-- /.control-sidebar -->

  @endsection
