<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="<?= base_url('dashboard'); ?>" class="brand-link">
    <img src="<?= base_url('assets/img/img_properties/favicon.png'); ?>" alt="DashboardLTE Logo" class="img-w-50">
    <span class="brand-text ml-2">Kursus Online</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <li class="nav-item">
          <?php if (
            $_SERVER['REQUEST_URI'] == '/kursus_online/dashboard/profile' || 
            $_SERVER['REQUEST_URI'] == '/kursus_online/dashboard/profile/'
          ): ?>
            <a href="<?= base_url('dashboard/profile'); ?>" class="nav-link active"><i class="nav-icon fas fa-fw fa-user"></i> <p><?= $dataUser['username']; ?></p></a>
          <?php else: ?>
            <a href="<?= base_url('dashboard/profile'); ?>" class="nav-link"><i class="nav-icon fas fa-fw fa-user"></i> <p><?= $dataUser['username']; ?></p></a>
          <?php endif ?>
        </li>
        <li class="nav-item">
          <?php if (
            $_SERVER['REQUEST_URI'] == '/kursus_online/dashboard' || 
            $_SERVER['REQUEST_URI'] == '/kursus_online/dashboard/'
          ): ?>
            <a href="<?= base_url('dashboard'); ?>" class="nav-link active">
          <?php else: ?>
            <a href="<?= base_url('dashboard'); ?>" class="nav-link">
          <?php endif ?>
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
              Dashboard
            </p>
          </a>
        </li>
        
        <!-- manajemen data -->
        <?php if (
          $_SERVER['REQUEST_URI'] == '/kursus_online/user' || 
          $_SERVER['REQUEST_URI'] == '/kursus_online/user/' ||
          $_SERVER['REQUEST_URI'] == '/kursus_online/instruktur' || 
          $_SERVER['REQUEST_URI'] == '/kursus_online/instruktur/' ||
          $_SERVER['REQUEST_URI'] == '/kursus_online/kursus' || 
          $_SERVER['REQUEST_URI'] == '/kursus_online/kursus/' ||
          $_SERVER['REQUEST_URI'] == '/kursus_online/peserta' || 
          $_SERVER['REQUEST_URI'] == '/kursus_online/peserta/' 
        ): ?>
          <li class="nav-item menu-open">
            <a href="#" class="nav-link active">
              <i class="fas fa-align-justify nav-icon"></i>
              <p>Manajemen Data <i class="right fas fa-angle-left"></i></p>
            </a>
        <?php else: ?>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="fas fa-align-justify nav-icon"></i>
              <p>Manajemen Data <i class="right fas fa-angle-left"></i></p>
            </a>
        <?php endif ?>
          <ul class="nav nav-treeview">
            <li class="nav-item ml-3">
              <?php if (
                $_SERVER['REQUEST_URI'] == '/kursus_online/instruktur' || 
                $_SERVER['REQUEST_URI'] == '/kursus_online/instruktur/'
              ): ?>
                <a href="<?= base_url('instruktur'); ?>" class="nav-link active">
                  <i class="fas fa-user-tie nav-icon"></i>
                  <p>Instruktur</p>
                </a>
              <?php else: ?>
                <a href="<?= base_url('instruktur'); ?>" class="nav-link">
                  <i class="fas fa-user-tie nav-icon"></i>
                  <p>Instruktur</p>
                </a>
              <?php endif ?>
            </li>
            <li class="nav-item ml-3">
              <?php if (
                $_SERVER['REQUEST_URI'] == '/kursus_online/kursus' || 
                $_SERVER['REQUEST_URI'] == '/kursus_online/kursus/'
              ): ?>
                <a href="<?= base_url('kursus'); ?>" class="nav-link active">
                  <i class="fas fa-book nav-icon"></i>
                  <p>Kursus</p>
                </a>
              <?php else: ?>
                <a href="<?= base_url('kursus'); ?>" class="nav-link">
                  <i class="fas fa-book nav-icon"></i>
                  <p>Kursus</p>
                </a>
              <?php endif ?>
            </li>
            <li class="nav-item ml-3">
              <?php if (
                $_SERVER['REQUEST_URI'] == '/kursus_online/peserta' || 
                $_SERVER['REQUEST_URI'] == '/kursus_online/peserta/'
              ): ?>
                <a href="<?= base_url('peserta'); ?>" class="nav-link active">
                  <i class="fas fa-users nav-icon"></i>
                  <p>Peserta</p>
                </a>
              <?php else: ?>
                <a href="<?= base_url('peserta'); ?>" class="nav-link">
                  <i class="fas fa-users nav-icon"></i>
                  <p>Peserta</p>
                </a>
              <?php endif ?>
            </li>
          </ul>
        </li>
        <!-- manajemen data -->

        <li class="nav-item">
          <?php if (
            $_SERVER['REQUEST_URI'] == '/kursus_online/laporan' || 
            $_SERVER['REQUEST_URI'] == '/kursus_online/laporan/'
          ): ?>
            <a href="<?= base_url('laporan'); ?>" class="nav-link active">
              <i class="fas fa-file-alt nav-icon"></i>
              <p>Laporan</p>
            </a>
          <?php else: ?>
            <a href="<?= base_url('laporan'); ?>" class="nav-link">
              <i class="fas fa-file-alt nav-icon"></i>
              <p>Laporan</p>
            </a>
          <?php endif ?>
        </li>
        <div class="dropdown-divider"></div>
        <li class="nav-item">
          <?php if (
            $_SERVER['REQUEST_URI'] == '/kursus_online/log' || 
            $_SERVER['REQUEST_URI'] == '/kursus_online/log/'
          ): ?>
            <a href="<?= base_url('log'); ?>" class="nav-link active">
              <i class="fas fa-history nav-icon"></i>
              <p>Aktivitas</p>
            </a>
          <?php else: ?>
            <a href="<?= base_url('log'); ?>" class="nav-link">
              <i class="fas fa-history nav-icon"></i>
              <p>Aktivitas</p>
            </a>
          <?php endif ?>
        </li>
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>