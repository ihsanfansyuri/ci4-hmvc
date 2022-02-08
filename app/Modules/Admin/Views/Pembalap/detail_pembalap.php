<?= $this->extend('App\Modules\Auth\Views\Layout\template'); ?>

<?= $this->section('content'); ?>

<div class="container mt-4">
    <h3>Detail Pembalap</h3>

    <?php if (session()->getFlashdata('success')) : ?>
        <div id="success" data-flash="<?= session()->getFlashdata('success'); ?>"></div>
    <?php endif; ?>

    <div class="card mt-3">
        <?php foreach ($pembalap as $row) : ?>
            <div class="card-header">
                <div class="row no-gutters">
                    <div class="col-md-1">
                        <img src="<?= base_url('/img') . '/' . $row['foto']; ?>" alt="" class="gambar">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h3><?= $row['no_balap']; ?>. <?= $row['nama']; ?> </h3>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <ul class="list-group list-group-flush">
                    <table class="table table-bordered">
                        <tbody>
                            <tr>
                                <td>Team</td>
                                <td><?= $row['nama_team']; ?></td>
                            </tr>
                            <tr>
                                <td>Kelas Balap</td>
                                <td><?= $row['nama_kelasbalap']; ?></td>
                            </tr>
                            <tr>
                                <td>Tempat Lahir</td>
                                <td><?= $row['tempat_lahir']; ?></td>
                            </tr>
                            <tr>
                                <td>Tanggal lahir</td>
                                <td><?= $row['tanggal_lahir']; ?></td>
                            </tr>
                            <tr>
                                <td>Negara</td>
                                <td><?= $row['negara']; ?></td>
                            </tr>
                        </tbody>
                    </table>
                </ul>
                <div class="row">
                    <div class="col-sm">
                        <a href="<?= base_url('admin/pembalap/edit') . '/' . $row['slug'] ?>" class="btn btn-warning">Edit</i></a>
                        <form action="<?= base_url('admin/pembalap') . '/' . $row['no_balap']; ?>" method="post" id="btn_delete" class="d-inline">
                            <?= csrf_field(); ?>
                            <input type="hidden" name="_method" value="DELETE">
                            <button type="submit" class="btn btn-danger">Hapus</button>
                        </form>
                    </div>
                    <div class="col-sm">
                        <a href="<?= base_url('admin/pembalap'); ?>" class="btn btn-primary float-right">Kembali</a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>

<?= $this->endSection(); ?>