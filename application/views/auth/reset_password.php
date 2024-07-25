<header>
	<nav class="navbar navbar-expand-lg navbar-light bg-white fixed-top">
	  <div class="container">
		<a class="navbar-brand d-flex align-items-center" href="<?= base_url(); ?>">
			<img src="<?= base_url('assets/img/img_properties/favicon-text.png'); ?>" class="d-inline-block align-top img-fluid img-w-40" alt="Logo">
			<h4 class="d-inline-block ml-3 mb-0">Kursus Online</h4>
		</a>
	  </div>
	</nav>
</header>

<main class="flex-shrink-0 mt-4">
	<div class="container">
		<div class="row justify-content-center pt-4">
			<div class="col-lg-4 border p-4 rounded bg-white">
				<h3>Reset Password</h3>
				<form action="<?= base_url('auth/changePassword'); ?>" method="post">
					<div class="form-group">
						<label for="new_password"><i class="fas fa-fw fa-lock"></i> Password Baru</label>
						<input type="password" id="new_password" class="form-control <?= (form_error('new_password')) ? 'is-invalid' : ''; ?>" name="new_password" required value="<?= set_value('new_password'); ?>">
						<div class="invalid-feedback">
			              <?= form_error('new_password'); ?>
			            </div>
					</div>
					<div class="form-group">
						<label for="verify_new_password"><i class="fas fa-fw fa-lock"></i> Verifikasi Password Baru</label>
						<input type="password" id="verify_new_password" class="form-control <?= (form_error('verify_new_password')) ? 'is-invalid' : ''; ?>" name="verify_new_password" required value="<?= set_value('verify_new_password'); ?>">
						<div class="invalid-feedback">
			              <?= form_error('verify_new_password'); ?>
			            </div>
					</div>
					<div class="form-group row">
						<div class="col my-auto">
							<a class="btn btn-danger" href="<?= base_url('auth/'); ?>"><i class="fas fa-fw fa-times"></i> Batal</a>
						</div>
						<div class="col my-auto text-right">
							<button type="submit" class="btn btn-primary"><i class="fas fa-fw fa-lock"></i> Reset Password</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</main>
