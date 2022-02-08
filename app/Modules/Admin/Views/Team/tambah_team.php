<?= $this->extend('App\Modules\Auth\Views\Layout\template'); ?>

<?= $this->section('content'); ?>

<div class="container">
    <h5 class="mt-4 mb-4">Tambah Team</h5>

    <div class="card">
        <form action="<?= base_url('admin/team/simpan'); ?>" method="POST">
            <?= csrf_field(); ?>
            <div class="form-group">
                <label for="nama_team">Nama Team</label>
                <input type="text" class="form-control <?= ($validation->hasError('nama_team')) ? 'is-invalid' : ''; ?>" id="id_team" name="nama_team" value="<?= old('nama_team'); ?>">
                <div id="validationServer03Feedback" class="invalid-feedback">
                    <?= $validation->getError('nama_team'); ?>
                </div>
            </div>
            <div class="form-group">
                <label for="kelas_balap">Kelas Balap</label>
                <select class="form-control custom-select" id="id_kelasbalap" name="kelas_balap" value="<?= old('kelas_balap'); ?>" required>
                    <option selected disabled value="">Pilih Kelas Balap</option>
                    <?php foreach ($kelas_balap as $row) : ?>
                        <option value="<?= $row['id_kelasbalap']; ?>"><?= $row['nama_kelasbalap'] ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
            <a href="<?= base_url('admin/team'); ?>" class="btn btn-primary">Kembali</a>
        </form>
    </div>
</div>

<?= $this->endSection(); ?>