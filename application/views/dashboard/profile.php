<div class="container p-3">
	<div class="row mb-2">
		<div class="col-lg-6">
			<div class="card">
				<div class="card-header">
					<h3 class="m-0"><i class="fas fa-fw fa-user"></i> Profil - <?= $dataUser['username']; ?></h3>
				</div>
				<div class="card-body">
					<table>
						<tr>
							<th style="width: 5.5rem; vertical-align: top;">Username</th>
							<td style="width: 1rem; text-align: center; vertical-align: top;"> : </td>
							<td><?= $dataUser['username']; ?></td>
						</tr>
						<tr>
							<th style="width: 5.5rem; vertical-align: top;">Nama</th>
							<td style="width: 1rem; text-align: center; vertical-align: top;"> : </td>
							<td><?= $dataUser['nama']; ?></td>
						</tr>
						<tr>
							<th style="width: 5.5rem; vertical-align: top;">No. Telepon</th>
							<td style="width: 1rem; text-align: center; vertical-align: top;"> : </td>
							<td><?= $dataUser['no_telepon']; ?></td>
						</tr>
						<tr>
							<th style="width: 5.5rem; vertical-align: top;">Email</th>
							<td style="width: 1rem; text-align: center; vertical-align: top;"> : </td>
							<td><?= $dataUser['email']; ?></td>
						</tr>
						<tr>
							<th style="width: 5.5rem; vertical-align: top;">Alamat</th>
							<td style="width: 1rem; text-align: center; vertical-align: top;"> : </td>
							<td><?= $dataUser['alamat']; ?></td>
						</tr>
						<tr>
							<th style="width: 5.5rem; vertical-align: top;">Jabatan</th>
							<td style="width: 1rem; text-align: center; vertical-align: top;"> : </td>
							<td><?= $dataUser['jabatan']; ?></td>
						</tr>
					</table>
					<div class="row mt-4">
						<div class="col-5">
							<a href="<?= base_url('dashboard/changePassword'); ?>" class="btn btn-danger"><i class="fas fa-fw fa-lock"></i> Ganti Password</a>
						</div>
						<div class="col">
							<a href="<?= base_url('dashboard/editProfile'); ?>" class="btn btn-success"><i class="fas fa-fw fa-user-edit"></i> Ubah Profil</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>