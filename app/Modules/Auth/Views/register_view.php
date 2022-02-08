<?= $this->extend('App\Modules\Auth\Views\Layout\template'); ?>

<?= $this->section('content'); ?>

<div class="container">
    <div class="spasi">
        <div class="card">
            <div class="row justify-content-center">
                <div class="col-8">
                    <h2 class="text-center">Form Registrasi</h2>
                    <form method="POST" action="<?= base_url('auth/register/tambahUser') ?>" id="form_regis">
                        <?= csrf_field() ?>
                        <input type="hidden" name="role">
                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama</label>
                            <input type="nama" class="form-control <?= ($validation->hasError('nama')) ? 'is-invalid' : ''; ?>" id="id_nama" name="nama" value="<?= old('nama'); ?>">
                            <div class="invalid-feedback">
                                <?= $validation->getError('nama'); ?>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Email</label>
                            <input type="email" class="form-control <?= ($validation->hasError('email')) ? 'is-invalid' : ''; ?>" id="exampleInputEmail1 email" aria-describedby="emailHelp" placeholder="email@gmail.com" name="email" value="<?= old('email'); ?>">
                            <div class="invalid-feedback">
                                <?= $validation->getError('email'); ?>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control <?= ($validation->hasError('password')) ? 'is-invalid' : ''; ?>" id="id_password" name="password" value="<?= old('password'); ?>">
                            <div class="invalid-feedback">
                                <?= $validation->getError('password'); ?>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="confirm" class="form-label">Confirm Password</label>
                            <input type="password" class="form-control <?= ($validation->hasError('confirm')) ? 'is-invalid' : ''; ?>" id="id_confirm" name="confirm">
                            <div class="invalid-feedback">
                                <?= $validation->getError('confirm'); ?>
                            </div>
                        </div>
                        <div id="emailHelp" class="form-text text-center">Already have an account? <a href="<?= base_url('/auth/login') ?>">Login</a> </div>
                        <button type="submit" class="btn btn-primary mt-3 mb-3">Register</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>