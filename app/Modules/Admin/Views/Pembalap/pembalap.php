<?= $this->extend('App\Modules\Auth\Views\Layout\template'); ?>

<?= $this->section('content'); ?>
<div class="container mt-4">
    <h3>Pembalap</h3>

    <?php if (session()->getFlashdata('success')) : ?>
        <div id="success" data-flash="<?= session()->getFlashdata('success'); ?>"></div>
    <?php elseif (session()->getFlashdata('failed')) : ?>
        <div id="failed" data-flash="<?= session()->getFlashdata('failed'); ?>"></div>
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
                        <td><a href="<?= base_url('admin/pembalap') . '/' . $row['slug'] ?>" class="btn btn-info">Detail</a></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <div class="row mt-3">
            <div class="col-6">
                <a href="<?= base_url('admin/pembalap/tambah'); ?>" class="btn btn-light ">Tambah Data</a>
            </div>
            <div class="col-6">
                <div class="btn-group float-right" role="group">
                    <button id="btnGroupDrop1" type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                        Print <i class="fas fa-print"></i>
                    </button>
                    <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                        <a class="dropdown-item" href="<?= base_url('admin/pembalap/printPDF'); ?>" target="_blank">PDF</a>
                        <a class="dropdown-item" href="<?= base_url('admin/pembalap/printWord'); ?>" target="_blank">Word</a>
                        <a class="dropdown-item" href="<?= base_url('admin/pembalap/printExcel'); ?>" target="_blank">Excel</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>