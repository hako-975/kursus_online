<div class="container p-3">
	<div class="row mb-2">
		<div class="col-lg">
			<div class="card">
				<div class="card-header">
					<div class="row justify-content-center">
						<div class="col-lg header-title">
							<h3 class="m-0"><i class="fas fa-fw fa-user-tie"></i> Instruktur</h3>
						</div>
						<div class="col-lg-4 header-button">
							<a href="<?= base_url('instruktur/addInstruktur'); ?>" class="btn btn-primary"><i class="fas fa-fw fa-plus"></i> Tambah Instruktur</a>
						</div>
					</div>
				</div>
				<div class="card-body">
					<div class="table-responsive">
						<table class="table table-bordered table-striped" id="table_id">
							<thead class="thead-dark">
								<tr>
									<th class="align-middle">No.</th>
									<th class="align-middle">Username</th>
									<th class="align-middle">Nama</th>
									<th class="align-middle">No. Telepon</th>
									<th class="align-middle">Email</th>
									<th class="align-middle">Alamat</th>
									<th class="align-middle">Tanggal Gabung</th>
									<th class="align-middle">Aksi</th>
								</tr>
							</thead>
							<tbody>
								<?php $i = 1; ?>
								<?php foreach ($instruktur as $da): ?>
									<tr>
										<td class="align-middle"><?= $i++; ?></td>
										<td class="align-middle"><?= $da['username']; ?></td>
										<td class="align-middle"><?= $da['nama']; ?></td>
										<td class="align-middle"><?= $da['no_telepon']; ?></td>
										<td class="align-middle"><?= $da['email']; ?></td>
										<td class="align-middle"><?= $da['alamat']; ?></td>
										<td class="align-middle"><?= date('d-m-Y, H:i', strtotime($da['tanggal_gabung'])); ?></td>
										<td class="align-middle text-center">
											<a href="<?= base_url('instruktur/editInstruktur/' . $da['id_user']); ?>" class="btn btn-sm btn-success m-1"><i class="fas fa-fw fa-edit"></i></a>
											<a href="<?= base_url('instruktur/removeInstruktur/' . $da['id_user']); ?>" class="btn btn-sm btn-danger m-1 btn-delete" data-nama="<?= $da['nama']; ?>"><i class="fas fa-fw fa-fw fa-trash"></i></a>
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
