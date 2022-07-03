<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
  <!-- Sidebar - Brand -->
  <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url() ?>">
    <div class="sidebar-brand-text">Kenbry Iventory</div>
  </a>

  <!-- Divider -->
  <hr class="sidebar-divider my-0">

  <!-- Nav Item - Dashboard -->
  <li class="nav-item">
    <a class="nav-link" href="<?= base_url() ?>">
      <i class="fas fa-fw fa-tachometer-alt"></i>
      <span>Dashboard</span>
    </a>
  </li>

  <!-- Divider -->
  <hr class="sidebar-divider">

  <!-- Heading -->
  <div class="sidebar-heading">
    Master
  </div>

  
  <?php if(session('role_user') == "ADMIN") : ?>
    <!-- Nav Item - Karyawan -->
    <li class="nav-item">
      <a class="nav-link" href="<?= base_url('karyawan') ?>">
        <i class="fas fa-users"></i>
        <span>Master Karyawan</span>
      </a>
    </li>
  <?php endif ?>

  <?php if(session('role_user') == "FINANCE" || session('role_user') == "ADMIN") : ?>
    <!-- Nav Item - Customer -->
    <li class="nav-item">
      <a class="nav-link" href="<?= base_url('customer') ?>">
        <i class="fas fa-store"></i>
        <span>Master Customer</span>
      </a>
    </li>
  <?php endif ?>

  <?php if(session('role_user') == "GUDANG" || session('role_user') == "ADMIN") : ?>
    <!-- Nav Item - Procuct -->
    <li class="nav-item">
      <a class="nav-link" href="<?= base_url('produk') ?>">
        <i class="fas fa-table"></i>
        <span>Master Produk</span>
      </a>
    </li>
  <?php endif ?>

  <!-- Heading -->
  <div class="sidebar-heading">
    Transaksi
  </div>

  <?php if(session('role_user') == "FINANCE" || session('role_user') == "ADMIN") : ?>
  <li class="nav-item">
    <a class="nav-link" href="<?= base_url('purchase/') ?>">
      <i class="fas fa-pen"></i>
      <span>Purchase</span>
    </a>
  </li>
  <?php endif ?>

  <?php if(session('role_user') == "GUDANG" || session('role_user') == "ADMIN") : ?>
    <li class="nav-item">
      <a class="nav-link" href="<?= base_url('receiving/') ?>">
        <i class="fas fa-box-open"></i>
        <span>Receiving</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="<?= base_url('shipping/') ?>">
        <i class="fas fa-truck"></i>
        <span>Kirim Barang</span>
      </a>
    </li>
  <?php endif ?>

  <!-- Heading -->
  <div class="sidebar-heading">
    Laporan
  </div>

  <li class="nav-item">
    <a class="nav-link" href="<?= base_url('stock') ?>">
      <i class="fas fa-book"></i>
      <span>Stock Produk</span>
    </a>
  </li>

  <?php if(session('role_user') == "FINANCE" || session('role_user') == "ADMIN") : ?>
  <li class="nav-item">
    <a class="nav-link" href="<?= base_url('history-transaksi') ?>">
      <i class="fas fa-calendar"></i>
      <span>History Transaksi</span>
    </a>
  </li>
  <?php endif ?>

  <li class="nav-item">
    <a class="nav-link" href="<?= base_url('report') ?>">
      <i class="fas fa-file"></i>
      <span>Report</span>
    </a>
  </li>

  <!-- Divider -->
  <hr class="sidebar-divider d-none d-md-block">

  <!-- Sidebar Toggler (Sidebar) -->
  <div class="text-center d-none d-md-inline">
      <button class="rounded-circle border-0" id="sidebarToggle"></button>
  </div>
</ul>
<!-- End of Sidebar -->