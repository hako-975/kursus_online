<?php if (validation_errors()): ?>
  <div class="toast bg-danger" role="alert" aria-live="assertive" aria-atomic="true" data-autohide="false" style="z-index: 999999; position: fixed; right: 1.5rem; bottom: 3.5rem">
    <div class="toast-header">
      <strong class="mr-auto">Gagal!</strong>
      <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <div class="toast-body">
      <?= validation_errors(); ?>
    </div>
  </div>
<?php endif ?>

<div class="container p-3">
	<div class="row mb-2">
		<div class="col-lg-6">
			<div class="card">
			  <div class="card-header">
			  	<h3 class="m-0"><i class="fas fa-fw fa-plus"></i> Tambah Peserta</h3>
			  </div>
			  <div class="card-body">
			  	<form action="<?= base_url('peserta/addPeserta'); ?>" method="post">
            <div class="form-group">
              <label for="username"><i class="fas fa-fw fa-user"></i> Username</label>
              <input type="text" id="username" class="form-control" name="username" required value="<?= set_value('username'); ?>">
              <?= form_error('username', '<small class="text-danger pl-3">', '</small>'); ?>
            </div>
            <div class="form-group">
              <label for="password"><i class="fas fa-fw fa-lock"></i> Password</label>
              <input type="password" id="password" class="form-control" name="password" required>
              <?= form_error('password', '<small class="text-danger pl-3">', '</small>'); ?>
            </div>
            <div class="form-group">
              <label for="verifikasi_password"><i class="fas fa-fw fa-lock"></i> Ulangi Password</label>
              <input type="password" id="verifikasi_password" class="form-control" name="verifikasi_password" required>
              <?= form_error('verifikasi_password', '<small class="text-danger pl-3">', '</small>'); ?>
            </div>
            <div class="form-group">
    	        <label for="nama"><i class="fas fa-fw fa-signature"></i> Nama</label>
              <input type="text" id="nama" class="form-control" name="nama" required value="<?= set_value('nama'); ?>">
              <?= form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?>
            </div>
            <div class="form-group">
              <label for="no_telepon"><i class="fas fa-fw fa-mobile"></i> No. Telepon</label>
              <input type="number" id="no_telepon" class="form-control" name="no_telepon" required value="<?= set_value('no_telepon'); ?>">
              <?= form_error('no_telepon', '<small class="text-danger pl-3">', '</small>'); ?>
            </div>
            <div class="form-group">
              <label for="email"><i class="fas fa-fw fa-envelope"></i> Email</label>
              <input type="email" id="email" class="form-control" name="email" required value="<?= set_value('email'); ?>">
              <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
            </div>
            <div class="form-group">
              <label for="alamat"><i class="fas fa-fw fa-map-marker-alt"></i> Alamat</label>
              <textarea id="alamat" class="form-control" name="alamat" required><?= set_value('alamat'); ?></textarea>
              <?= form_error('alamat', '<small class="text-danger pl-3">', '</small>'); ?>
            </div>
            <div class="form-group mb-1 row">
              <div class="col my-auto text-right">
								<a href="javascript:history.back()" class="btn btn-danger btn-cancel" data-nama="Tambah Peserta"><i class="fas fa-fw fa-times"></i> Batal</a>
                <button type="submit" class="btn btn-primary"><i class="fas fa-fw fa-save"></i> Simpan</button>
              </div>
            </div>
        	</form>
			  </div>
			</div>
		</div>
	</div>
</div>
