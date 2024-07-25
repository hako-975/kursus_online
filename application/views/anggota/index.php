<div class="container p-3">
	<div class="row mb-2">
		<div class="col-lg">
			<div class="card">
				<div class="card-header">
					<div class="row justify-content-center">
						<div class="col-lg header-title">
							<h3 class="m-0"><i class="fas fa-fw fa-users"></i> Anggota</h3>
						</div>
						<div class="col-lg-4 header-button">
							<a href="<?= base_url('anggota/addAnggota'); ?>" class="btn btn-primary"><i class="fas fa-fw fa-plus"></i> Tambah Anggota</a>
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
									<th class="align-middle">Alamat Anggota</th>
									<th class="align-middle">No. Telepon Anggota</th>
									<th class="align-middle">Tanggal Gabung</th>
									<th class="align-middle">Aksi</th>
								</tr>
							</thead>
							<tbody>
								<?php $i = 1; ?>
								<?php foreach ($anggota as $da): ?>
									<tr>
										<td class="align-middle"><?= $i++; ?></td>
										<td class="align-middle"><?= $da['nama_anggota']; ?></td>
										<td class="align-middle"><?= $da['alamat_anggota']; ?></td>
										<td class="align-middle"><?= $da['no_telepon_anggota']; ?></td>
										<td class="align-middle"><?= date('d-m-Y, H:i', strtotime($da['tanggal_gabung'])); ?></td>
										<td class="align-middle text-center">
											<a href="<?= base_url('anggota/editAnggota/' . $da['id_anggota']); ?>" class="btn btn-sm btn-success m-1"><i class="fas fa-fw fa-edit"></i></a>
											<a href="<?= base_url('anggota/removeAnggota/' . $da['id_anggota']); ?>" class="btn btn-sm btn-danger m-1 btn-delete" data-nama="<?= $da['nama_anggota']; ?>"><i class="fas fa-fw fa-fw fa-trash"></i></a>
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
