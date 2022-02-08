<?= $this->extend('App\Modules\Auth\Views\layout\template'); ?>

<?= $this->section('content'); ?>

<div class="container">
    <div class="spasi">
        <div class="login-form">
            <h2>LOGIN</h2>

            <?php if (session()->getFlashdata('success')) : ?>
                <div id="success" data-flash="<?= session()->getFlashdata('success'); ?>"></div>
            <?php elseif (session()->getFlashdata('failed')) : ?>
                <div id="failed" data-flash="<?= session()->getFlashdata('failed'); ?>"></div>
            <?php endif ?>

            <form method="POST" action="<?= base_url('auth/login/auth'); ?>" id="form_login">
                <?= csrf_field() ?>
                <div class="form-group">
                    <label for="exampleInputEmail1">Email</label>
                    <input type="email" class="form-control <?= ($validation->hasError('email')) ? 'is-invalid' : ''; ?>" id="id_email" name="email" aria-describedby="emailHelp">
                    <div class="invalid-feedback">
                        <?= $validation->getError('email'); ?>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control <?= ($validation->hasError('password')) ? 'is-invalid' : ''; ?>" id="password" name="password" class="text-area">
                    <div class="invalid-feedback">
                        <?= $validation->getError('password'); ?>
                    </div>
                </div>
                <div id="id_regis" class="form-text text-center"><a href="<?= base_url('auth/register') ?>">Don't have an account?.</a></div>
                <div class="d-grid gap-2 mt-3 mb-3">
                    <button type="submit" class="btn btn-primary button">Login</button>
                </div>

            </form>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>