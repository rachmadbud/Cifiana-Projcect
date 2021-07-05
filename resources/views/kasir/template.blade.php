@include('templates.head')
<body class="hold-transition sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">

  @include('templates.navbar')

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="../../index3.html" class="brand-link">
      <img src="https://camo.githubusercontent.com/0cbb7f5c60b17641df1d296a9eb8eef5cc9cdb4c975a399b7d0dde1e0c436354/68747470733a2f2f312e62702e626c6f6773706f742e636f6d2f2d56676545314d6a616e72452f58754646326975756678492f41414141414141414f49452f44505555366f4955704c3470757270415972747168307a4c4c6d75344f46785377434c63424741735948512f733332302f494d472d32303230303531362d5741303030372e6a7067" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Toko Bangunan Cecep</span>
    </a>

    @include('templates.sidebar')
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->

    @yield('content')


  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

@include('templates.script')

</body>
</html>
