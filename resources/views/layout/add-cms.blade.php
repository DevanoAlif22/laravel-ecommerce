<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Dashboard MediMart</title>

  <link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote-bs4.min.css" rel="stylesheet">
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="/plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">


  <link rel="stylesheet" href="/css/cms/adminlte/adminlte.min.css">
  <link rel="stylesheet" href="/css/cms/dashboard.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

</head>
<style>
    .datepicker {
    padding: 10px !important; /* Menggunakan !important untuk memastikan gaya diterapkan */
    }
    /* Style for active tab */
    #categoryTabs .nav-item .nav-link.active {
        color: #3c8dbc;; /* Warna latar belakang biru untuk tab aktif */
    }

    /* Style for inactive tab */
    #categoryTabs .nav-item .nav-link {
        color: #fff; /* Warna latar belakang putih untuk tab tidak aktif */
    }

    /* Style for larger checkbox */
    .form-check-input[type=checkbox] {
        width: 25px;
        height: 25px;
    }

    .form-check-label {
        font-size: 18px; /* Menyesuaikan ukuran teks label */
    }
</style>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light" style="background-color: #3c8dbc; color:white;">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars" style="color: white;"></i></a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <li class="nav-item">
            <div class="user-panel d-flex">
                <div class="image">
                  <img src="/dist/img/user2-160x160.jpg" class="pt-1 img-circle elevation-2" alt="User Image">
                </div>
                <div class="info">
                  <a href="#" class="text-white pt-1 d-block">{{Auth::user()->name}}</a>
                </div>
              </div>
          </li>
      <li class="nav-item">
        <a class="nav-link text-white" style="color:white;" data-widget="fullscreen" href="#" role="button">
            <i class="fas fa-home" style="color:white;"></i> View Front
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt" style="color:white;"></i>
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{route('dashboard')}}" class="brand-link" style="background-color: #3c8dbc">
      {{-- <img src="/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8"> --}}
      <span class="brand-text font-weight-light "><h4><b style="color:white; padding-left:20px;">MediMart</b></h4></span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{Auth::user()->name}}</a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      @include('layout.navbar-cms')
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

    <!-- Content Wrapper. Contains page content -->

        @yield('content')

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->
<footer class="main-footer">
    <!-- To the right -->
    <!-- Default to the left -->
    <strong>Copyright &copy; 2024 <a href="#" style="color:black">MediMart</a>.</strong> All rights reserved.
  </footer>


  <!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- Bootstrap 4 -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
<!-- Summernote -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote-bs4.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
<!-- Your Custom Scripts -->
<script>
  $('.datepicker').datepicker({
      	todayHighlight: true,
		autoclose: true,
	    format: 'yyyy-mm-dd',
        orientation: 'bottom'
    });
</script>
<script>
  $(document).ready(function() {
    $('#summernote').summernote();
  });
</script>
<script src="/plugins/jquery-ui/jquery-ui.min.js"></script>
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>

    <!-- AdminLTE App -->
    <script src="/dist/js/adminlte.js"></script>
    <script src="/dist/js/pages/dashboard.js"></script>

</body>
</html>
