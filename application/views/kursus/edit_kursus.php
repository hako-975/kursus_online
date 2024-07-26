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
					<h3 class="m-0"><i class="fas fa-fw fa-edit"></i> Ubah Kursus</h3>
				</div>
		  	<div class="card-body">
					<form action="<?= base_url('kursus/editKursus/' . $kursus['id_kursus']); ?>" method="post" enctype="multipart/form-data">
						<div class="form-group">
							<label for="judul_kursus">Judul Kursus</label>
							<input type="text" id="judul_kursus" class="form-control <?= (form_error('judul_kursus')) ? 'is-invalid' : ''; ?>" name="judul_kursus" required value="<?= (form_error('judul_kursus')) ? set_value('judul_kursus') : $kursus['judul_kursus']; ?>">
							<div class="invalid-feedback">
	              <?= form_error('judul_kursus'); ?>
	            </div>
						</div>
						<div class="form-group">
							<label for="deskripsi_kursus">Deskripsi Kursus</label>
							<textarea id="deskripsi_kursus" class="form-control <?= (form_error('deskripsi_kursus')) ? 'is-invalid' : ''; ?>" name="deskripsi_kursus" required><?= (form_error('deskripsi_kursus')) ? set_value('deskripsi_kursus') : $kursus['deskripsi_kursus']; ?></textarea>
							<div class="invalid-feedback">
	              <?= form_error('deskripsi_kursus'); ?>
	            </div>
						</div>
						<div class="form-group">
							<label for="cover_kursus">Cover Kursus</label> <br>
							<a href="<?= base_url('assets/img/img_cover_kursus/' . $kursus['cover_kursus']); ?>" class="enlarge" id="check_enlarge_photo">
								<img class="img-fluid rounded img-w-150 border border-dark" id="check_cover" src="<?= base_url('assets/img/img_cover_kursus/' . $kursus['cover_kursus']); ?>" alt="Cover Kursus">
							</a>
							<br>
						</div>
						<div class="input-group mb-3">
						  <div class="input-group-prepend">
						    <span class="input-group-text">Upload</span>
						  </div>
						  <div class="custom-file">
						    <input type="file" class="custom-file-input" id="cover_kursus" aria-describedby="cover_kursus" id="cover_kursus" name="cover_kursus">
						    <label class="custom-file-label" for="cover_kursus">Pilih file</label>
						  </div>
						</div>
						<div class="form-group text-right">
							<a href="javascript:history.back()" class="btn btn-danger btn-cancel" data-nama="Ubah Kursus"><i class="fas fa-fw fa-times"></i> Batal</a>
							<button type="submit" class="btn btn-primary"><i class="fas fa-fw fa-save"></i> Simpan</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
