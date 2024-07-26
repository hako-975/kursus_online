<div class="container p-3">
	<div class="row mb-2">
		<div class="col-lg">
			<div class="card">
				<div class="card-header">
					<div class="row justify-content-center">
						<div class="col-lg header-title">
							<h3 class="m-0"><i class="fas fa-fw fa-book"></i> Kursus</h3>
						</div>
						<div class="col-lg-4 header-button">
							<a href="<?= base_url('kursus/addKursus'); ?>" class="btn btn-primary"><i class="fas fa-fw fa-plus"></i> Tambah Kursus</a>
						</div>
					</div>
				</div>
				<div class="card-body">
					<div class="table-responsive">
						<table class="table table-bordered table-striped" id="table_id">
							<thead class="thead-dark">
								<tr>
									<th class="align-middle">No.</th>
									<th class="align-middle">Cover Kursus</th>
									<th class="align-middle">Judul Kursus</th>
									<th class="align-middle">Deskripsi Kursus</th>
									<th class="align-middle">Instruktur Kursus</th>
									<th class="align-middle">Tanggal Dibuat</th>
									<th class="align-middle">Aksi</th>
								</tr>
							</thead>
							<tbody>
								<?php $i = 1; ?>
								<?php foreach ($kursus as $dk): ?>
									<tr>
										<td class="align-middle"><?= $i++; ?></td>
										<td class="align-middle">
											<a href="<?= base_url('assets/img/img_cover_kursus/' . $dk['cover_kursus']); ?>" class="enlarge">
												<img src="<?= base_url('assets/img/img_cover_kursus/' . $dk['cover_kursus']); ?>" alt="Kursus" class="img-kursus">
											</a>
										</td>
										<td class="align-middle"><?= $dk['judul_kursus']; ?></td>
										<td class="align-middle"><?= $dk['deskripsi_kursus']; ?></td>
										<td class="align-middle"><?= $dk['nama']; ?></td>
										<td class="align-middle"><?= date('d-m-Y, H:i', strtotime($dk['tanggal_dibuat'])); ?></td>
										<td class="align-middle text-center">
											<a href="<?= base_url('kursus/editKursus/' . $dk['id_kursus']); ?>" class="btn btn-sm btn-success m-1"><i class="fas fa-fw fa-edit"></i></a>
											<a href="<?= base_url('kursus/removeKursus/' . $dk['id_kursus']); ?>" class="btn btn-sm btn-danger m-1 btn-delete" data-nama="<?= $dk['judul_kursus']; ?>"><i class="fas fa-fw fa-fw fa-trash"></i></a>
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
