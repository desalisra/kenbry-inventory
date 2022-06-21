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

  <!-- Nav Item - Procuct -->
  <li class="nav-item">
    <a class="nav-link" href="<?= base_url('produk') ?>">
      <i class="fas fa-table"></i>
      <span>Master Produk</span>
    </a>
  </li>

  <li class="nav-item">
    <a class="nav-link" href="<?= base_url('transaksi-in/') ?>">
      <i class="fas fa-pen"></i>
      <span>Produk In</span>
    </a>
  </li>

  <li class="nav-item">
    <a class="nav-link" href="<?= base_url('transaksi-out/') ?>">
      <i class="fas fa-truck"></i>
      <span>Produk Out</span>
    </a>
  </li>

  <li class="nav-item">
    <a class="nav-link" href="<?= base_url('stock') ?>">
      <i class="fas fa-book"></i>
      <span>Stock Produk</span>
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