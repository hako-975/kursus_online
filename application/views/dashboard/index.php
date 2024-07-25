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
									<!-- <h3><?= $jml_anggota; ?></h3> -->
									<p>Anggota</p>
								</div>
								<div class="icon">
									<i class="fas fa-fw fa-users"></i>
								</div>
								<a href="<?= base_url('anggota'); ?>" class="small-box-footer">Detail <i class="fas fa-arrow-circle-right"></i></a>
							</div>
						</div>
						<div class="col-lg-3 col-6">
							<div class="small-box bg-primary">
								<div class="inner">
									<!-- <h3><?= $jml_buku; ?></h3> -->
									<p>Buku</p>
								</div>
								<div class="icon">
									<i class="fas fa-fw fa-book"></i>
								</div>
								<a href="<?= base_url('buku'); ?>" class="small-box-footer">Detail <i class="fas fa-arrow-circle-right"></i></a>
							</div>
						</div>
						<div class="col-lg-3 col-6">
							<div class="small-box bg-danger">
								<div class="inner">
									<!-- <h3><?= $jml_dipinjam; ?></h3> -->
									<p>Dipinjam</p>
								</div>
								<div class="icon">
									<i class="fas fa-fw fa-exchange-alt"></i>
								</div>
								<a href="<?= base_url('transaksi'); ?>" class="small-box-footer">Detail <i class="fas fa-arrow-circle-right"></i></a>
							</div>
						</div>
						<div class="col-lg-3 col-6">
							<div class="small-box bg-success">
								<div class="inner">
									<!-- <h3><?= $jml_dikembalikan; ?></h3> -->
									<p>Dikembalikan</p>
								</div>
								<div class="icon">
									<i class="fas fa-fw fa-undo"></i>
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
