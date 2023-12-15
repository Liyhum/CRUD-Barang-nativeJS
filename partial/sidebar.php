<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="assets/AdminLTE/index3.html" class="brand-link">
    <img src="foto/logounpam.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
    <span class="brand-text font-weight-light">SI - UNPAM</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->

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
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
              with font-awesome or any other icon font library -->
        <li class="nav-item menu-open">
          <a href="index.php" class="nav-link active">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
              Home
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon far fa-envelope"></i>
            <p>
              Transaksi
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="barang_masuk.php" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Barang Masuk</p>
              </a>
              <a href="brg_keluar.php" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Barang Keluar</p>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-item">
          <a href="assets/AdminLTE/#" class="nav-link">
            <i class="nav-icon fas fa-book"></i>
            <p>
              Master Data
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="barang.php" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Data Barang</p>
              </a>
              <a href="satuan.php" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Data Satuan</p>
              </a>
              <a href="jenis.php" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Data Jenis</p>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-item">
          <a href="assets/AdminLTE/#" class="nav-link">
            <i class="nav-icon fas fa-book"></i>
            <p>
              Report
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="report.php" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Data Report Barang</p>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-item">
          <a href="assets/AdminLTE/#" class="nav-link">
            <i class="nav-icon far fa-plus-square"></i>
            <p>
              Pengguna
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="user.php" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Data User</p>
              </a>
            </li>
          </ul>
        </li>
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>