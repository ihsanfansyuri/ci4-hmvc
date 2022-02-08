<?= $this->extend('App\Modules\Auth\Views\Layout\template'); ?>

<?= $this->section('content'); ?>
<div class="container mt-4">
    <h3>Pembalap</h3>
    <?php if (session()->getFlashdata('pesan')) : ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <?= session()->getFlashdata('pesan'); ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php endif; ?>
    <div class="card">
        <table id="table_id" class="table table-hover tabel">
            <thead>
                <tr>
                    <th scope="col">No Balap</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Team</th>
                    <th scope="col">Kelas Balap</th>
                    <th scope="col">Foto</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($pembalap as $row) : ?>
                    <tr>
                        <td><?= $row['no_balap']; ?></td>
                        <td><?= $row['nama']; ?></td>
                        <td><?= $row['nama_team']; ?></td>
                        <td><?= $row['nama_kelasbalap']; ?></td>
                        <td><img src="<?= base_url('/img') . '/' . $row['foto']; ?>" alt="" class="gambar"></td>
                        <td><a href="<?= base_url('user/pembalap') . '/' . $row['slug'] ?>" class="btn btn-info">Detail</a></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<?= $this->endSection(); ?>