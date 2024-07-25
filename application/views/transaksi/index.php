<div class="container p-3">
	<div class="row mb-2">
		<div class="col-lg">
			<div class="card">
				<div class="card-header">
					<div class="row justify-content-center">
						<div class="col-lg header-title">
							<h3 class="m-0"><i class="fas fa-fw fa-handshake"></i> Transaksi</h3>
						</div>
						<div class="col-lg-4 header-button">
							<a href="<?= base_url('transaksi/addTransaksi'); ?>" class="btn btn-primary"><i class="fas fa-fw fa-plus"></i> Tambah Peminjaman Buku</a>
						</div>
					</div>
				</div>
				<div class="card-body">
					<div class="table-responsive">
						<table class="table table-bordered table-striped" id="table_id">
							<thead class="thead-dark">
								<tr>
									<th class="align-middle">No.</th>
									<th class="align-middle">Nama Anggota</th>
									<th class="align-middle">Judul Buku</th>
									<th class="align-middle">Tanggal Pinjam</th>
									<th class="align-middle">Tanggal Wajib Kembali</th>
									<th class="align-middle">Tanggal Kembali</th>
									<th class="align-middle">Status</th>
									<th class="align-middle">Denda</th>
									<th class="align-middle">Aksi</th>
								</tr>
							</thead>
							<tbody>
								<?php $i = 1; ?>
								<?php foreach ($transaksi as $dt): ?>
									<tr>
										<td class="align-middle"><?= $i++; ?></td>
										<td class="align-middle"><?= $dt['nama_anggota']; ?></td>
										<td class="align-middle"><?= $dt['judul_buku']; ?></td>
										<td class="align-middle"><?= date('d-m-Y, H:i', strtotime($dt['tanggal_pinjam'])); ?></td>
										<td class="align-middle"><?= date('d-m-Y, H:i', strtotime($dt['tanggal_wajib_kembali'])); ?></td>
										<?php if ($dt['tanggal_kembali'] != null): ?>
											<td class="align-middle"><?= date('d-m-Y, H:i', strtotime($dt['tanggal_kembali'])); ?></td>
										<?php else: ?>
											<td class="align-middle">-</td>
										<?php endif ?>
										<td class="align-middle"><?= ucwords($dt['status']); ?></td>
										<td class="align-middle">Rp. <?= number_format($dt['denda']); ?></td>
										<td class="align-middle text-center">
											<?php if ($dt['status'] == 'dipinjam'): ?>
												<a href="<?= base_url('transaksi/editTransaksi/' . $dt['id_transaksi']); ?>" class="btn btn-sm btn-primary m-1"><i class="fas fa-fw fa-undo"></i></a>
											<?php endif ?>
											<a href="<?= base_url('transaksi/removeTransaksi/' . $dt['id_transaksi']); ?>" class="btn btn-sm btn-danger m-1 btn-delete" data-nama="Pinjaman <?= $dt['nama_anggota']; ?>"><i class="fas fa-fw fa-fw fa-trash"></i></a>
										</td>
									</tr>
								<?php endforeach ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
