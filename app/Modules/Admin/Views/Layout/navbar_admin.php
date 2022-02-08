<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
        <a class="navbar-brand" href="<?= base_url('admin/dashboard'); ?>">Atlet Balap</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <a class="nav-link" href="<?= base_url('admin/pembalap'); ?>">Pembalap</a>
                <a class="nav-link" href="<?= base_url('admin/team'); ?>">Team</a>
                <a class="nav-link" href="<?= base_url('admin/user'); ?>">Manage Users</a>
            </div>
            <div class="navbar-nav ml-auto">
                <a class="nav-link" href="<?= base_url('auth/login/logout'); ?>"><i class="fas fa-sign-out-alt"></i> Logout</a>
            </div>
        </div>
    </div>
</nav>