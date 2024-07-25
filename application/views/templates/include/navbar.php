<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
  <!-- Left navbar links -->
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
    </li>
  </ul>

  <!-- SEARCH FORM -->
  <form class="w-100 form-inline ml-3" method="get" action="<?= base_url('transaksi/search'); ?>">
    <div class="w-100 input-group input-group-sm">
      <input name="search" class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search" value="<?php echo isset($search) ? $search : ''; ?>">
      <div class="input-group-append">
        <button class="btn btn-navbar" type="submit">
          <i class="fas fa-search"></i>
        </button>
      </div>
    </div>
  </form>

  <!-- Right navbar links -->
  <ul class="navbar-nav ml-auto">
    <!-- Messages Dropdown Menu -->
    <li class="nav-item dropdown">
      <a class="nav-link" data-toggle="dropdown" href="#">
        <i class="far fa-user"></i>
      </a>
      <div class="dropdown-menu dropdown-menu-right">
        <a href="<?= base_url('dashboard/profile'); ?>" class="dropdown-item">
          <i class="far fa-fw fa-user"></i> Profil
        </a>
        <a href="<?= base_url('auth/logout'); ?>" class="dropdown-item">
          <i class="fas fa-fw fa-sign-out-alt"></i> Logout
        </a>
      </div>
    </li>
  </ul>
</nav>
<!-- /.navbar -->