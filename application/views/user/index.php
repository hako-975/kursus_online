<div class="container p-3">
	<div class="row mb-2">
		<div class="col-lg">
			<div class="card">
				<div class="card-header">
					<div class="row justify-content-center">
						<div class="col-lg header-title">
							<h3 class="m-0"><i class="fas fa-fw fa-user"></i> User</h3>
						</div>
						<div class="col-lg-4 header-button">
							<a href="<?= base_url('user/addUser'); ?>" class="btn btn-primary"><i class="fas fa-fw fa-plus"></i> Tambah User</a>
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
									<th class="align-middle">Nama Lengkap</th>
									<th class="align-middle">Aksi</th>
								</tr>
							</thead>
							<tbody>
								<?php $i = 1; ?>
								<?php foreach ($user as $du): ?>
									<tr>
										<td class="align-middle"><?= $i++; ?></td>
										<td class="align-middle"><?= $du['username']; ?></td>
										<td class="align-middle"><?= $du['nama']; ?></td>
										<td class="align-middle text-center">
											<button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#detailUserModal<?= $du['id_user']; ?>" class="btn btn-sm btn-success m-1"><i class="fas fa-fw fa-bars"></i></button>
												<a href="<?= base_url('user/editUser/' . $du['id_user']); ?>" class="btn btn-sm btn-success m-1"><i class="fas fa-fw fa-edit"></i></a>
												<a href="<?= base_url('user/removeUser/' . $du['id_user']); ?>" class="btn btn-sm btn-danger m-1 btn-delete" data-nama="<?= $du['username']; ?>"><i class="fas fa-fw fa-fw fa-trash"></i></a>
											<?php endif ?>
										</td>
										<?php endif ?>
									</tr>
									<!-- Modal -->
									<div class="modal fade" id="detailUserModal<?= $du['id_user']; ?>" tabindex="-1" aria-labelledby="detailUserModal<?= $du['id_user']; ?>Label" aria-hidden="true">
									  <div class="modal-dialog">
									    <div class="modal-content">
									      <div class="modal-header">
									        <h5 class="modal-title" id="detailUserModal<?= $du['id_user']; ?>Label">Detail User - <?= $du['username']; ?></h5>
									        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
									          <span aria-hidden="true">&times;</span>
									        </button>
									      </div>
									      <div class="modal-body">
									      	<ul class="list-group">
											    <li class="list-group-item">
											        <strong>Username</strong>
											        <span> : </span>
											        <span><?= $du['username']; ?></span>
											    </li>
											    <li class="list-group-item">
											        <strong>Nama Lengkap</strong>
											        <span> : </span>
											        <span><?= $du['nama']; ?></span>
											    </li>
											</ul>

									      </div>
									    </div>
									  </div>
									</div>
								<?php endforeach ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>