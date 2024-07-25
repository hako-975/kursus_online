<div class="container p-3">
	<div class="row mb-2">
		<div class="col-lg">
			<div class="card">
				<div class="card-header">
					<div class="row justify-content-center">
						<div class="col-lg header-title">
							<h3 class="m-0"><i class="fas fa-fw fa-file-alt"></i> Laporan</h3>
						</div>
					</div>
				</div>
				<div class="card-body">
					<form method="get" action="<?= base_url('laporan/index'); ?>">
						<div class="row">
			              	<div class="col-lg-2">
				                <div class="form-group">
				                	<label for="dari_tanggal" class="form-label">Dari Tanggal</label>
					                <input type="date" class="form-control" name="dari_tanggal" id="dari_tanggal" value="<?= isset($_GET['dari_tanggal']) ? $_GET['dari_tanggal'] : date('Y-m-01'); ?>" required>
				                </div>
				            </div>
			              	<div class="col-lg-2">
				                <div class="form-group">
				                	<label for="sampai_tanggal" class="form-label">Sampai Tanggal</label>
				                	<input type="date" class="form-control" name="sampai_tanggal" id="sampai_tanggal" value="<?= isset($_GET['sampai_tanggal']) ? $_GET['sampai_tanggal'] : date('Y-m-d'); ?>" required>
				              	</div>
			              	</div>
			              	<div class="col-lg-2">
								<div class="form-group">
									<label for="status">Status</label>
									<select id="status" class="custom-select <?= (form_error('status')) ? 'is-invalid' : ''; ?>" name="status">
										<?php if (isset($_GET['status'])): ?>
											<?php if ($_GET['status'] == "semua"): ?>
												<option value="semua">Semua</option>
												<option value="dipinjam">Dipinjam</option>
												<option value="dikembalikan">Dikembalikan</option>
											<?php elseif ($_GET['status'] == "dipinjam"): ?>	
												<option value="dipinjam">Dipinjam</option>
												<option value="semua">Semua</option>
												<option value="dikembalikan">Dikembalikan</option>
											<?php elseif ($_GET['status'] == "dikembalikan"): ?>
												<option value="dikembalikan">Dikembalikan</option>
												<option value="semua">Semua</option>
												<option value="dipinjam">Dipinjam</option>
											<?php endif ?>
										<?php else: ?>
											<option value="semua">Semua</option>
											<option value="dipinjam">Dipinjam</option>
											<option value="dikembalikan">Dikembalikan</option>
										<?php endif ?>
									</select>
								</div>
			              	</div>
						</div>
		              	<div class="row">
			                <div class="col">
			                  	<button type="submit" name="btnFilter" class="btn btn-primary"><i class="fas fa-fw fa-filter"></i> Filter</button>
			                  	<?php if(isset($_GET['dari_tanggal'])): ?>
			                   		<a target="_blank" href="<?= base_url('laporan/print?dari_tanggal=' . $_GET['dari_tanggal'] . '&sampai_tanggal=' . $_GET['sampai_tanggal'] . '&status=' . $_GET['status']); ?>" name="btnPrint" class="btn btn-success"><i class="fas fa-fw fa-print"></i> Print</a>
			                   		<a href="<?= base_url('laporan/index'); ?>" name="btnPrint" class="btn btn-danger"><i class="fas fa-fw fa-times"></i> Reset</a>
					              	<hr>
			                  		<h4 class="m-0">Jumlah Laporan: <?= count($transaksi); ?></h4>
			                  	<?php endif; ?>
			                </div>
		              	</div>
		            </form>
                  	<?php if(isset($_GET['dari_tanggal'])): ?>
			            <hr>
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
									</tr>
								</thead>
								<tbody>
									<?php 
										$i = 1;
										$total_denda = 0;
									 ?>
									<?php foreach ($transaksi as $dt): ?>
										<?php $total_denda += $dt['denda']; ?>
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
										</tr>
									<?php endforeach ?>
								</tbody>
								<tfoot>
									<tr>
										<th colspan="7">Total Denda:</th>
										<th>Rp. <?= number_format($total_denda); ?></th>
									</tr>
								</tfoot>
							</table>
						</div>
					<?php endif ?>
				</div>
			</div>
		</div>
	</div>
</div>
