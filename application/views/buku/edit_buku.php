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
					<h3 class="m-0"><i class="fas fa-fw fa-edit"></i> Ubah Buku</h3>
				</div>
			  	<div class="card-body">
					<form action="<?= base_url('buku/editBuku/' . $buku['id_buku']); ?>" method="post">
						<div class="form-group">
							<label for="judul_buku">Judul Buku</label>
							<input type="text" id="judul_buku" class="form-control <?= (form_error('judul_buku')) ? 'is-invalid' : ''; ?>" name="judul_buku" required value="<?= (form_error('judul_buku')) ? set_value('judul_buku') : $buku['judul_buku']; ?>">
							<div class="invalid-feedback">
	              <?= form_error('judul_buku'); ?>
	            </div>
						</div>
						<div class="form-group">
							<label for="tahun_buku">Tahun Buku</label>
							<input type="number" id="tahun_buku" class="form-control <?= (form_error('tahun_buku')) ? 'is-invalid' : ''; ?>" name="tahun_buku" required value="<?= (form_error('tahun_buku')) ? set_value('tahun_buku') : $buku['tahun_buku']; ?>">
							<div class="invalid-feedback">
	              <?= form_error('tahun_buku'); ?>
	            </div>
						</div>
						<div class="form-group">
							<label for="penerbit_buku">Penerbit Buku</label>
							<input type="text" id="penerbit_buku" class="form-control <?= (form_error('penerbit_buku')) ? 'is-invalid' : ''; ?>" name="penerbit_buku" required value="<?= (form_error('penerbit_buku')) ? set_value('penerbit_buku') : $buku['penerbit_buku']; ?>">
							<div class="invalid-feedback">
	              <?= form_error('penerbit_buku'); ?>
	            </div>
						</div>
						<div class="form-group">
							<label for="penulis_buku">Penulis Buku</label>
							<input type="text" id="penulis_buku" class="form-control <?= (form_error('penulis_buku')) ? 'is-invalid' : ''; ?>" name="penulis_buku" required value="<?= (form_error('penulis_buku')) ? set_value('penulis_buku') : $buku['penulis_buku']; ?>">
							<div class="invalid-feedback">
	              <?= form_error('penulis_buku'); ?>
	            </div>
						</div>
						<div class="form-group">
							<label for="stok_buku">Stok Buku</label>
							<input type="number" id="stok_buku" class="form-control <?= (form_error('stok_buku')) ? 'is-invalid' : ''; ?>" name="stok_buku" required value="<?= (form_error('stok_buku')) ? set_value('stok_buku') : $buku['stok_buku']; ?>">
							<div class="invalid-feedback">
	              <?= form_error('stok_buku'); ?>
	            </div>
						</div>
						<div class="form-group text-right">
							<a href="javascript:history.back()" class="btn btn-danger btn-cancel" data-nama="Ubah Buku"><i class="fas fa-fw fa-times"></i> Batal</a>
							<button type="submit" class="btn btn-primary"><i class="fas fa-fw fa-save"></i> Simpan</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
