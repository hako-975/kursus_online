<main class="flex-shrink-0 mt-4">
	<div class="container">
		<div class="row justify-content-center pt-4">
			<div class="col-lg-4 border p-4 rounded bg-white">
				<h3 class="text-center">Login Kursus Online</h3>
				<form action="<?= base_url('auth/index'); ?>" method="post">
					<div class="form-group">
						<label for="username"><i class="fas fa-fw fa-user"></i> Username</label>
						<input type="text" autocomplete="off" id="username" class="form-control" name="username" required>
					</div>
					<div class="form-group">
						<label for="password"><i class="fas fa-fw fa-lock"></i> Password</label>
						<input type="password" id="password" class="form-control" name="password" required>
					</div>
					<div class="form-group row">
						<div class="col my-auto">
							<a href="<?= base_url('auth/lupaPassword'); ?>">Lupa Password?</a>
						</div>
						<div class="col my-auto text-right">
							<button type="submit" class="btn btn-primary"><i class="fas fa-fw fa-sign-in-alt"></i> Login</button>
						</div>
					</div>
					<hr>
					<div class="form-group mb-1 row justify-content-center">
						<div class="col text-center my-auto">
							<a href="<?= base_url('auth/registrasi'); ?>">Belum punya akun? Registrasi</a>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</main>

