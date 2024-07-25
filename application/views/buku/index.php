<div class="container p-3">
	<div class="row mb-2">
		<div class="col-lg">
			<div class="card">
				<div class="card-header">
					<div class="row justify-content-center">
						<div class="col-lg header-title">
							<h3 class="m-0"><i class="fas fa-fw fa-book"></i> Buku</h3>
						</div>
						<div class="col-lg-4 header-button">
							<a href="<?= base_url('buku/addBuku'); ?>" class="btn btn-primary"><i class="fas fa-fw fa-plus"></i> Tambah Buku</a>
						</div>
					</div>
				</div>
				<div class="card-body">
					<div class="table-responsive">
						<table class="table table-bordered table-striped" id="table_id">
							<thead class="thead-dark">
								<tr>
									<th class="align-middle">No.</th>
									<th class="align-middle">Judul Buku</th>
									<th class="align-middle">Tahun Buku</th>
									<th class="align-middle">Penerbit Buku</th>
									<th class="align-middle">Penulis Buku</th>
									<th class="align-middle">Stok Buku</th>
									<th class="align-middle">Aksi</th>
								</tr>
							</thead>
							<tbody>
								<?php $i = 1; ?>
								<?php foreach ($buku as $db): ?>
									<tr>
										<td class="align-middle"><?= $i++; ?></td>
										<td class="align-middle"><?= $db['judul_buku']; ?></td>
										<td class="align-middle"><?= $db['tahun_buku']; ?></td>
										<td class="align-middle"><?= $db['penerbit_buku']; ?></td>
										<td class="align-middle"><?= $db['penulis_buku']; ?></td>
										<td class="align-middle"><?= $db['stok_buku']; ?></td>
										<td class="align-middle text-center">
											<a href="<?= base_url('buku/editBuku/' . $db['id_buku']); ?>" class="btn btn-sm btn-success m-1"><i class="fas fa-fw fa-edit"></i></a>
											<a href="<?= base_url('buku/removeBuku/' . $db['id_buku']); ?>" class="btn btn-sm btn-danger m-1 btn-delete" data-nama="<?= $db['judul_buku']; ?>"><i class="fas fa-fw fa-fw fa-trash"></i></a>
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
