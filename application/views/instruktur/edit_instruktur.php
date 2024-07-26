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
					<h3 class="m-0"><i class="fas fa-fw fa-edit"></i> Ubah Instruktur</h3>
				</div>
			  	<div class="card-body">
					<form action="<?= base_url('instruktur/editInstruktur/' . $instruktur['id_user']); ?>" method="post">
            <div class="form-group">
              <label for="username"><i class="fas fa-fw fa-user"></i> Username</label>
              <input style="cursor: not-allowed;" type="text" disabled id="username" class="form-control" name="username" required value="<?= (form_error('username')) ? set_value('username') : $instruktur['username']; ?>">
              <?= form_error('username', '<small class="text-danger pl-3">', '</small>'); ?>
            </div>
            <div class="form-group">
    	        <label for="nama"><i class="fas fa-fw fa-signature"></i> Nama</label>
              <input type="text" id="nama" class="form-control" name="nama" required value="<?= (form_error('nama')) ? set_value('nama') : $instruktur['nama']; ?>">
              <?= form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?>
            </div>
            <div class="form-group">
              <label for="no_telepon"><i class="fas fa-fw fa-mobile"></i> No. Telepon</label>
              <input type="number" id="no_telepon" class="form-control" name="no_telepon" required value="<?= (form_error('no_telepon')) ? set_value('no_telepon') : $instruktur['no_telepon']; ?>">
              <?= form_error('no_telepon', '<small class="text-danger pl-3">', '</small>'); ?>
            </div>
            <div class="form-group">
              <label for="email"><i class="fas fa-fw fa-envelope"></i> Email</label>
              <input type="email" id="email" class="form-control" name="email" required value="<?= (form_error('email')) ? set_value('email') : $instruktur['email']; ?>">
              <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
            </div>
            <div class="form-group">
              <label for="alamat"><i class="fas fa-fw fa-map-marker-alt"></i> Alamat</label>
              <textarea id="alamat" class="form-control" name="alamat" required><?= (form_error('alamat')) ? set_value('alamat') : $instruktur['alamat']; ?></textarea>
              <?= form_error('alamat', '<small class="text-danger pl-3">', '</small>'); ?>
            </div>
            <div class="form-group mb-1 row">
              <div class="col my-auto text-right">
								<a href="javascript:history.back()" class="btn btn-danger btn-cancel" data-nama="Ubah Instruktur <?= $instruktur['username']; ?>"><i class="fas fa-fw fa-times"></i> Batal</a>
                <button type="submit" class="btn btn-primary"><i class="fas fa-fw fa-save"></i> Simpan</button>
              </div>
            </div>
        	</form>
				</div>
			</div>
		</div>
	</div>
</div>
