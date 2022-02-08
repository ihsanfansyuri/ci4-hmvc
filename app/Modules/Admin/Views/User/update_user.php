<?= $this->extend('App\Modules\Auth\Views\Layout\template'); ?>

<?= $this->section('content'); ?>

<div class="container">
    <h5 class="mt-4 mb-4">Edit Data Users</h5>

    <div class="card">
        <?php foreach ($user as $row) : ?>
            <form action="<?= base_url('admin/user/update')  . '/' . $row['id_user']; ?>" method="POST">
                <?= csrf_field(); ?>
                <input type="hidden" name="user" id="user" value="<?= $row['id_user']; ?>">
                <div class="form-group">
                    <label for="nama">Nama</label>
                    <input type="text" value="<?= $row['nama']; ?>" class="form-control <?= ($validation->hasError('nama')) ? 'is-invalid' : ''; ?>" id="id_team" name="nama" value="<?= old('nama'); ?>">
                    <div id="validationServer03Feedback" class="invalid-feedback">
                        <?= $validation->getError('nama'); ?>
                    </div>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" value="<?= $row['email']; ?>" class="form-control <?= ($validation->hasError('email')) ? 'is-invalid' : ''; ?>" id="id_team" name="email" value="<?= old('email'); ?>">
                    <div id="validationServer03Feedback" class="invalid-feedback">
                        <?= $validation->getError('email'); ?>
                    </div>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control <?= ($validation->hasError('password')) ? 'is-invalid' : ''; ?>" id="id_team" name="password" value="<?= old('password'); ?>">
                    <div id="validationServer03Feedback" class="invalid-feedback">
                        <?= $validation->getError('password'); ?>
                    </div>
                </div>
                <div class="form-group">
                    <label for="confirm">Konfirmasi Password</label>
                    <input type="password" class="form-control <?= ($validation->hasError('confirm')) ? 'is-invalid' : ''; ?>" id="id_team" name="confirm" value="<?= old('confirm'); ?>">
                    <div id="validationServer03Feedback" class="invalid-feedback">
                        <?= $validation->getError('confirm'); ?>
                    </div>
                </div>
                <div class="form-group">
                    <label for="role">Role</label>
                    <select class="form-control custom-select" id="role" name="role" value="<?= old('role'); ?>" required>
                        <option <?= ($row['role'] == 'user' ? 'selected' : ''); ?> value="user">User</option>
                        <option <?= ($row['role'] == 'admin' ? 'selected' : ''); ?> value="admin">Admin</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
                <a href="<?= base_url('admin/user'); ?>" class="btn btn-primary">Kembali</a>
            </form>
        <?php endforeach ?>
    </div>
</div>

<?= $this->endSection(); ?>