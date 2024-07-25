<main class="flex-shrink-0 my-4">
    <div class="container">
        <div class="row justify-content-center pt-4">
            <div class="col-lg-4 border p-4 rounded bg-white">
                <h3 class="text-center">Registrasi Kursus Online</h3>
                <form action="<?= base_url('auth/registrasi'); ?>" method="post">
                    <div class="form-group">
                        <label for="username"><i class="fas fa-fw fa-user"></i> Username</label>
                        <input type="text" id="username" class="form-control" name="username" required value="<?= set_value('username'); ?>">
                        <?= form_error('username', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <label for="password"><i class="fas fa-fw fa-lock"></i> Password</label>
                        <input type="password" id="password" class="form-control" name="password" required>
                        <?= form_error('password', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <label for="verifikasi_password"><i class="fas fa-fw fa-lock"></i> Ulangi Password</label>
                        <input type="password" id="verifikasi_password" class="form-control" name="verifikasi_password" required>
                        <?= form_error('verifikasi_password', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <label for="nama"><i class="fas fa-fw fa-signature"></i> Nama</label>
                        <input type="text" id="nama" class="form-control" name="nama" required value="<?= set_value('nama'); ?>">
                        <?= form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <label for="no_telepon"><i class="fas fa-fw fa-mobile"></i> No. Telepon</label>
                        <input type="number" id="no_telepon" class="form-control" name="no_telepon" required value="<?= set_value('no_telepon'); ?>">
                        <?= form_error('no_telepon', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <label for="email"><i class="fas fa-fw fa-envelope"></i> Email</label>
                        <input type="email" id="email" class="form-control" name="email" required value="<?= set_value('email'); ?>">
                        <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <label for="alamat"><i class="fas fa-fw fa-map-marker-alt"></i> Alamat</label>
                        <textarea id="alamat" class="form-control" name="alamat" required><?= set_value('alamat'); ?></textarea>
                        <?= form_error('alamat', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group mb-1 row">
                        <div class="col my-auto text-right">
                            <button type="submit" class="btn btn-primary"><i class="fas fa-fw fa-user-edit"></i> Registrasi</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>
