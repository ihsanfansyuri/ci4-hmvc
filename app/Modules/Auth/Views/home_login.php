<?= $this->extend('App\Modules\Auth\Views\Layout\template'); ?>

<?= $this->section('content'); ?>

<div class="container mt-4 text-center">
    <div class="jumbotron jumbotron-fluid rounded">
        <div class="container">
            <h1 class="display-4 p-auto">Selamat Datang</h1>
            <p class="lead">Halo <?= session()->nama; ?>, terima kasih sudah login</p>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>