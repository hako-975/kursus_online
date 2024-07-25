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
			  	<h3 class="m-0"><i class="fas fa-fw fa-plus"></i> Tambah Peminjaman Buku</h3>
			  </div>
			  <div class="card-body">
			  	<form action="<?= base_url('transaksi/addTransaksi'); ?>" method="post">
					<div class="form-group">
						<label for="id_anggota">Nama Anggota</label>
						<select id="id_anggota" class="custom-select <?= (form_error('id_anggota')) ? 'is-invalid' : ''; ?>" name="id_anggota">
							<option value="0">--- Pilih Anggota ---</option>
							<?php foreach ($anggota as $da): ?>
								<option value="<?= $da['id_anggota']; ?>"><?= ucwords($da['nama_anggota']); ?></option>
							<?php endforeach ?>
						</select>
						<div class="invalid-feedback">
              <?= form_error('id_anggota'); ?>
            </div> 	
					</div>
					<div class="form-group">
						<label for="id_buku">Judul Buku</label>
						<select id="id_buku" class="custom-select <?= (form_error('id_buku')) ? 'is-invalid' : ''; ?>" name="id_buku">
							<option value="0">--- Pilih Buku ---</option>
							<?php foreach ($buku as $db): ?>
								<option value="<?= $db['id_buku']; ?>"><?= ucwords($db['judul_buku']) ?> | <?= $db['tahun_buku']; ?> | <?= ucwords($db['penerbit_buku']); ?> | <?= ucwords($db['penulis_buku']); ?></option>
							<?php endforeach ?>
						</select>
						<div class="invalid-feedback">
              <?= form_error('id_buku'); ?>
            </div>
					</div>
					<div class="form-group text-right">
						<a href="javascript:history.back()" class="btn btn-danger btn-cancel" data-nama="Tambah Transaksi"><i class="fas fa-fw fa-times"></i> Batal</a>
						<button type="submit" class="btn btn-primary"><i class="fas fa-fw fa-save"></i> Simpan</button>
					</div>
				</form>
			  </div>
			</div>
		</div>
	</div>
</div>
