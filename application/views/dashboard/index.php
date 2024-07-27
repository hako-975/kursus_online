<?php if ($dataUser['jabatan'] == 'Administrator'): ?>
<?php 
	$total_instruktur = $this->db->get_where('user', ['jabatan' => 'Instruktur'])->num_rows();
	$total_kursus = $this->db->get('kursus')->num_rows();
	$total_peserta = $this->db->get_where('user', ['jabatan' => 'Peserta'])->num_rows();
?>
	<div class="container p-3">
		<div class="row mb-2">
			<div class="col">
				<div class="card">
					<div class="card-header">
						<h3 class="m-0"><i class="fas fa-fw fa-tachometer-alt"></i> Dashboard</h3>
					</div>
					<div class="card-body">
						<div class="row">
							<div class="col-lg-3 col-6">
								<div class="small-box bg-success">
									<div class="inner">
										<h3><?= $total_instruktur; ?></h3>
										<p>Total Instruktur</p>
									</div>
									<div class="icon">
										<i class="fas fa-fw fa-user-tie"></i>
									</div>
									<a href="<?= base_url('instruktur'); ?>" class="small-box-footer">Detail <i class="fas fa-arrow-circle-right"></i></a>
								</div>
							</div>
							<div class="col-lg-3 col-6">
								<div class="small-box bg-info">
									<div class="inner">
										<h3><?= $total_kursus; ?></h3>
										<p>Total Kursus</p>
									</div>
									<div class="icon">
										<i class="fas fa-fw fa-book"></i>
									</div>
									<a href="<?= base_url('kursus'); ?>" class="small-box-footer">Detail <i class="fas fa-arrow-circle-right"></i></a>
								</div>
							</div>
							<div class="col-lg-3 col-6">
								<div class="small-box bg-danger">
									<div class="inner">
										<h3><?= $total_peserta; ?></h3>
										<p>Total Peserta</p>
									</div>
									<div class="icon">
										<i class="fas fa-fw fa-users"></i>
									</div>
									<a href="<?= base_url('buku'); ?>" class="small-box-footer">Detail <i class="fas fa-arrow-circle-right"></i></a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php elseif ($dataUser['jabatan'] == 'Peserta'): ?>
<?php 
	// $jml_anggota = $this->db->get('anggota')->num_rows();
	// $jml_buku = $this->db->get('buku')->num_rows();
	// $jml_dipinjam = $this->db->get_where('transaksi', ['status' => 'dipinjam'])->num_rows();
	// $jml_dikembalikan = $this->db->get_where('transaksi', ['status' => 'dikembalikan'])->num_rows();
?>
	<div class="container p-3">
		<div class="row mb-2">
			<div class="col">
				<div class="card">
					<div class="card-header">
						<h3 class="m-0"><i class="fas fa-fw fa-tachometer-alt"></i> Dashboard</h3>
					</div>
					<div class="card-body">
						<div class="row">
							<div class="col-lg-3 col-6">
								<div class="small-box bg-info">
									<div class="inner">
										<!-- <?= $jml_kursus; ?> -->
										<h3>0</h3>
										<p>Total Kursus</p>
									</div>
									<div class="icon">
										<i class="fas fa-fw fa-book"></i>
									</div>
									<a href="<?= base_url('kursus'); ?>" class="small-box-footer">Detail <i class="fas fa-arrow-circle-right"></i></a>
								</div>
							</div>
							<div class="col-lg-3 col-6">
								<div class="small-box bg-danger">
									<div class="inner">
										<h3>0</h3>
										<p>Kursus Sedang Berlangsung</p>
									</div>
									<div class="icon">
										<i class="fas fa-fw fa-book"></i>
									</div>
									<a href="<?= base_url('buku'); ?>" class="small-box-footer">Detail <i class="fas fa-arrow-circle-right"></i></a>
								</div>
							</div>
							<div class="col-lg-3 col-6">
								<div class="small-box bg-success">
									<div class="inner">
										<h3>0</h3>
										<p>Kursus Selesai</p>
									</div>
									<div class="icon">
										<i class="fas fa-fw fa-check-circle"></i>
									</div>
									<a href="<?= base_url('transaksi'); ?>" class="small-box-footer">Detail <i class="fas fa-arrow-circle-right"></i></a>
								</div>
							</div>
							<div class="col-lg-3 col-6">
								<div class="small-box bg-warning">
									<div class="inner">
										<h3>0</h3>
										<p>Sertifikat</p>
									</div>
									<div class="icon">
										<i class="fas fa-fw fa-certificate"></i>
									</div>
									<a href="<?= base_url('transaksi'); ?>" class="small-box-footer">Detail <i class="fas fa-arrow-circle-right"></i></a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

<?php endif ?>