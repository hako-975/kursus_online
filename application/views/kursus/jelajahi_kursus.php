<div class="container p-3">
	<div class="row mb-2">
		<div class="col-lg">
			<div class="card">
				<div class="card-header">
					<div class="row justify-content-center">
						<div class="col-lg header-title">
							<h3 class="m-0"><i class="fas fa-fw fa-book"></i> Jelajahi Kursus</h3>
						</div>
					</div>
				</div>
				<div class="card-body">
					<div class="row">
						<?php foreach ($kursus as $dk): ?>
						    <div class="col-lg-4">
						    	<div class="card m-2">
							        <a href="<?= base_url('assets/img/img_cover_kursus/' . $dk['cover_kursus']); ?>" class="enlarge">
							            <img src="<?= base_url('assets/img/img_cover_kursus/' . $dk['cover_kursus']); ?>" class="card-img-top" alt="Kursus">
							        </a>
							        <div class="card-body">
							            <p class="card-text my-1">Instruktur: <?= $dk['nama']; ?></p>
							            <h5 class="card-title font-weight-bold"><?= $dk['judul_kursus']; ?></h5>
							            <p class="card-text my-1"><?= $dk['deskripsi_kursus']; ?></p>
							            <p class="card-text"><small class="text-muted">Kursus Dibuat: <?= date('d-m-Y, H:i', strtotime($dk['tanggal_dibuat'])); ?></small></p>
							            <a href="<?= base_url('kursus/detailKursus/' . $dk['id_kursus']); ?>" class="btn btn-primary"><i class="fas fa-fw fa-bars"></i> Detail Kursus</a>
							        </div>
						    	</div>
						    </div>
						<?php endforeach ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
