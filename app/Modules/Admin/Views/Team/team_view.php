<?= $this->extend('App\Modules\Auth\Views\Layout\template'); ?>

<?= $this->section('content'); ?>

<div class="container mt-4">
    <h3>Team Balap</h3>
    <div id="success" data-flash="<?= session()->getFlashdata('success'); ?>"></div>

    <div class="card">
        <table id="table_id" class="table table-hover tabel">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Team</th>
                    <th scope="col">Kelas Balap</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1; ?>
                <?php foreach ($team as $row) : ?>
                    <tr>
                        <th><?= $i++; ?></th>
                        <td><?= $row['nama_team']; ?></td>
                        <td><?= $row['nama_kelasbalap']; ?></td>
                        <td>
                            <a href="<?= base_url('admin/team/edit') . '/' . $row['id_team'] ?>" class="btn btn-warning"><i class="fas fa-edit"></i></a>
                            <form action="<?= base_url('admin/team') . '/' . $row['id_team'] ?>" method="post" id="btn_delete" class="d-inline">
                                <?= csrf_field(); ?>
                                <input type="hidden" name="_method" value="DELETE">
                                <button type="submit" class="btn btn-danger"><i class="far fa-trash-alt"></i></button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <a href="<?= base_url('admin/team/tambah'); ?>" class="btn btn-light tombol">Tambah Team</a>
    </div>
</div>
<?= $this->endSection(); ?>