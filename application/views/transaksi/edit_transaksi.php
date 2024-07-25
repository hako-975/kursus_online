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
					<h3 class="m-0"><i class="fas fa-fw fa-undo"></i> Transaksi Pengembalian Buku</h3>
				</div>
			  	<div class="card-body">
					<form action="<?= base_url('transaksi/editTransaksi/' . $transaksi['id_transaksi']); ?>" method="post">
						<div class="form-group">
							<label for="id_anggota">Nama Anggota</label>
							<input type="text" disabled class="form-control" value="<?= $transaksi['nama_anggota']; ?>">
						</div>
						<div class="form-group">
							<label for="id_buku">Judul Buku</label>
							<input type="text" disabled class="form-control" value="<?= $transaksi['judul_buku']; ?> | <?= $transaksi['tahun_buku']; ?> | <?= ucwords($transaksi['penerbit_buku']); ?> | <?= ucwords($transaksi['penulis_buku']); ?>">
						</div>
						<div class="form-group">
							<label for="tanggal_pinjam">Tanggal Pinjam</label>
							<input type="text" disabled class="form-control" value="<?= date('d-m-Y, H:i', strtotime($transaksi['tanggal_pinjam'])); ?>">
						</div>
						<div class="form-group">
							<label for="tanggal_wajib_kembali">Tanggal Wajib Kembali</label>
							<input type="text" disabled class="form-control" value="<?= date('d-m-Y, H:i', strtotime($transaksi['tanggal_wajib_kembali'])); ?>">
						</div>
						<div class="form-group">
							<label for="denda">Denda</label>
							<?php 
								$tanggal_sekarang = strtotime(date('Y-m-d H:i:s'));
								$tanggal_wajib_kembali = strtotime($transaksi['tanggal_wajib_kembali']);
								if ($tanggal_sekarang <= $tanggal_wajib_kembali) {
							    $denda = 0;
								} else {
							    $selisih = floor(($tanggal_sekarang - $tanggal_wajib_kembali) / (60 * 60 * 24));
							    $denda = $selisih * 500;
								}
							?>
							<input type="text" disabled class="form-control" value="Rp. <?= number_format($denda); ?>">
							<input type="hidden" name="denda" value="<?= $denda; ?>">
						</div>
						<div class="form-group text-right">
							<a href="javascript:history.back()" class="btn btn-danger btn-cancel" data-nama="Ubah Transaksi"><i class="fas fa-fw fa-times"></i> Batal</a>
							<button type="submit" class="btn btn-primary"><i class="fas fa-fw fa-save"></i> Simpan</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
