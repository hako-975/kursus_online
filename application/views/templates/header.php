<!DOCTYPE html>
<html lang="en" class="h-100" id="page-top">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <?php header('Set-Cookie: cross-site-cookie=perpustakaan; SameSite=None; Secure'); ?>
  <?php include 'include/js.php'; ?>
  <?php include 'include/css.php'; ?>
  <title><?= $title; ?></title>
</head>
<body class="d-flex flex-column h-100" style="background-image: url('<?= base_url('assets/img/img_properties/background.jpg'); ?>'); background-size: cover; background-repeat: no-repeat; background-position: center; background-attachment: fixed;">        

  <header>
    <nav class="navbar navbar-expand-lg navbar-light bg-white fixed-top">
      <div class="container">
        <a class="navbar-brand d-flex align-items-center" href="<?= base_url(); ?>">
          <img src="<?= base_url('assets/img/img_properties/favicon-text.png'); ?>" class="d-inline-block align-top img-fluid img-w-40" alt="Logo">
          <h4 class="d-inline-block ml-3 mb-0">Kursus Online</h4>
        </a>
        <div class="ml-auto">
          <a class="btn btn-outline-primary mr-2" href="<?= base_url('auth/index'); ?>"><i class="fas fa-fw fa-sign-in-alt"></i> Login</a>
          <a class="btn btn-primary" href="<?= base_url('auth/registrasi'); ?>"><i class="fas fa-fw fa-user-edit"></i> Registrasi</a>
        </div>
      </div>
    </nav>
  </header>