    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        
        <div class="info">
          <a href="#" class="d-block">Aplikasi TB CECEP</a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="{{ route('admin.dashboard')}}" class="nav-link d-block">
                <i class="nav-icon fas fa-tachometer-alt-slowest fa-2x"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-folders"></i>
              <p>
                Data Barang
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('admin.databarang')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Lihat Data</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('admin.tambah')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Tambah Data Barang</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="{{route('admin.datapenjualan')}}" class="nav-link">
                <i class="nav-icon far fa-table fa-2x"></i>
              <span>
                Data Penjualan
              </span>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('admin.transaksi')}}" class="nav-link">
                <i class="nav-icon fad fa-file-spreadsheet fa-2x"></i>
              <span>
                Detail Transaksi
              </span>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('admin.prosesapriori')}}" class="nav-link">
              <i class="nav-icon fad fa-repeat-alt fa-2x"></i>
              <span>
                Proses Apriori
              </span>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('admin.struk')}}" class="nav-link">
              <i class="nav-icon fas fa-file-chart-line fa2x"></i>
              <span>
                Struk
              </span>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-user"></i>
              <p>
                User
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('admin.listuser')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Lihat User</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('admin.tambahuser')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Tambah Akun User</p>
                </a>
              </li>
            </ul>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->