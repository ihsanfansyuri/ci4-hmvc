<?= $this->extend('App\Modules\Auth\Views\Layout\template'); ?>

<?= $this->section('content'); ?>
<div class="container mt-4">
    <h3>Manage Users</h3>

    <?php if (session()->getFlashdata('success')) : ?>
        <div id="success" data-flash="<?= session()->getFlashdata('success'); ?>"></div>
    <?php endif; ?>

    <div class="card">
        <table id="table_id" class="table table-hover tabel">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Email</th>
                    <th scope="col">Role</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1; ?>
                <?php foreach ($user as $row) : ?>
                    <tr>
                        <td><?= $i++; ?></td>
                        <td><?= $row['nama']; ?></td>
                        <td><?= $row['email']; ?></td>
                        <td><?= $row['role']; ?></td>
                        <td>
                            <a href="<?= base_url('admin/user/edit') . '/' . $row['id_user'] ?>" class="btn btn-warning"><i class="fas fa-user-edit"></i></a>
                            <form action="<?= base_url('admin/user') . '/' . $row['id_user'] ?>" method="post" id="btn_delete" class="d-inline">
                                <?= csrf_field(); ?>
                                <input type="hidden" name="_method" value="DELETE">
                                <button type="submit" class="btn btn-danger"><i class="fas fa-user-minus"></i></button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <a href="<?= base_url('admin/user/tambah'); ?>" class="btn btn-light tombol">Tambah User</a>
    </div>
</div>

<?= $this->endSection(); ?>