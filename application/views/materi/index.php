<div class="container p-3">
	<div class="row mb-2">
		<div class="col-lg">
			<div class="card">
				<div class="card-header">
					<div class="row justify-content-center">
						<div class="col-lg header-title">
							<h3 class="m-0"><i class="fas fa-fw fa-book"></i> Materi Kursus <?= $kursus['judul_kursus']; ?></h3>
						</div>
						<div class="col-lg-4 header-button">
							<a href="<?= base_url('materi/addMateri/' . $kursus['id_kursus']); ?>" class="btn btn-primary"><i class="fas fa-fw fa-plus"></i> Tambah Materi</a>
						</div>
					</div>
				</div>
				<div class="card-body">
					<div class="table-responsive">
						<table class="table table-bordered table-striped" id="table_id">
							<thead class="thead-dark">
								<tr>
									<th class="align-middle">No.</th>
									<th class="align-middle">Video Materi</th>
									<th class="align-middle">Judul Materi</th>
									<th class="align-middle">Deskripsi Materi</th>
									<th class="align-middle">Urutan Materi</th>
									<th class="align-middle">Tanggal Dibuat</th>
									<th class="align-middle">Aksi</th>
								</tr>
							</thead>
							<tbody>
								<?php $i = 1; ?>
								<?php foreach ($materi as $dm): ?>
									<tr>
										<td class="align-middle"><?= $i++; ?></td>
										<td class="align-middle">
										    <video width="160" height="120" controls>
										        <source src="<?= base_url('assets/video/video_materi/' . $dm['video_materi']); ?>" type="video/mp4">
										        Your browser does not support the video tag.
										    </video>
										</td>
										<td class="align-middle"><?= $dm['judul_materi']; ?></td>
										<td class="align-middle"><?= $dm['deskripsi_materi']; ?></td>
										<td class="align-middle"><?= $dm['urutan_materi']; ?></td>
										<td class="align-middle"><?= date('d-m-Y, H:i', strtotime($dm['tanggal_dibuat'])); ?></td>
										<td class="align-middle text-center">
											<a href="<?= base_url('materi/editMateri/' . $dm['id_materi']); ?>" class="btn btn-sm btn-success m-1"><i class="fas fa-fw fa-edit"></i></a>
											<a href="<?= base_url('materi/removeMateri/' . $dm['id_materi']); ?>" class="btn btn-sm btn-danger m-1 btn-delete" data-nama="<?= $dm['judul_materi']; ?>"><i class="fas fa-fw fa-fw fa-trash"></i></a>
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
