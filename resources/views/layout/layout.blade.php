<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>.::Peminjaman Alat & Lab::.</title>
  <link rel="icon" type="image/x-icon" href="{{ asset('data_images/logo-umsida-tittle.png') }}">
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ url('asset/LTE/plugins/fontawesome-free/css/all.min.css') }}">

  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{ url('asset/LTE/dist/css/adminlte.min.css')}} ">
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
</head>
<body class="hold-transition sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>

  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="../../index3.html" class="brand-link mx-auto">
      <span class="brand-text font-weight-light pl-5">Peminjaman MIK</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex bg-light">
        <div class="image mx-auto" style="width: 200px;">
          <img src="{{ asset('data_images/logo-brand-mik.png') }}" class="pt-3" alt="User Image" style="width: 200px; height: auto">
        </div>
        <div class="info">
          {{-- <a href="#" class="d-block">Laborant MIK</a> --}}
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="{{ url('/home') }}" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt text-info"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          {{-- <li class="nav-item has-treeview"> --}}
          <li class="nav-item ">
            <a href=" {{ url('/laboratorium') }} " class="nav-link">
              <i class="nav-icon fas fa-hospital-alt text-success"></i>
              <p>
                Laboratorim
                {{-- <i class="fas fa-angle-left right"></i> --}}
              </p>
            </a>
            {{-- <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ url('/laboratorium') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Create</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ url('/peralatan') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Alat Praktek</p>
                </a>
              </li>
            </ul> --}}
          </li>
          {{-- <li class="nav-item has-treeview"> --}}
          <li class="nav-item">
            <a href=" {{ url('/peralatan') }} " class="nav-link">
              <i class="nav-icon fas fa-wrench text-warning"></i>
              <p>
                Peralatan Lab
                {{-- <i class="fas fa-angle-left right"></i> --}}
              </p>
            </a>
            {{-- <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ url('/laboratorium') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Laboratorium</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ url('/peralatan') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Alat Praktek</p>
                </a>
              </li>
            </ul> --}}
          </li>
          <li class="nav-item">
            <a href="{{ url('/mahasiswa') }}" class="nav-link">
              <i class="nav-icon fas fa-user-alt text-primary"></i>
              <p>
                Mahasiswa
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ url('/logout') }}" class="nav-link">
              <i class="nav-icon fas fa-sign-out-alt text-danger"></i>
              <p>
                Log Out
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>@yield('header')</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    
    <!-- Main content -->
    <section class="content">
        @yield('isi')
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <b>Version</b> 0.0.1-beta
    </div>
    <strong>Copyright &copy; 2020 <a href="https://mik.umsida.ac.id">Laboratorium MIK</a>
  </footer>

</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="{{ url('asset/LTE/plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ url('asset/LTE/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ url('asset/LTE/dist/js/adminlte.min.js') }}"></script>
<!-- AdminLTE for demo purposes -->
@stack('jsTambahan')
<script src="{{ url('asset/LTE/dist/js/demo.js') }}"></script>
<script type="text/javascript">
  $(function () {
    $('[data-toggle="tooltip"]').tooltip()
  })
</script>
</body>
</html>
