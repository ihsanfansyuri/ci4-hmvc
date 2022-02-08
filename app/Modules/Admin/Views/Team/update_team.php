<?= $this->extend('App\Modules\Auth\Views\Layout\template'); ?>

<?= $this->section('content'); ?>

<div class="container">
    <h5 class="mt-4 mb-4">Edit Data Pembalap</h5>
    <?php foreach ($nama_team as $row) : ?>
        <div class="card">
            <form method="POST" action="<?= base_url('admin/team/update')  . '/' . $row['id_team']; ?>">
                <?= csrf_field(); ?>
                <input type="hidden" name="id_team" value="<?= $row['id_team']; ?>">
                <div class="form-group">
                    <label for="nama_team">Nama</label>
                    <input type="text" value="<?= $row['nama_team']; ?>" class="form-control <?= ($validation->hasError('nama_team')) ? 'is-invalid' : ''; ?>" id="id_nama" name="nama_team" value="<?= (old('nama_team')) ? old('nama_team') : $row['nama_team']; ?>">
                    <div id="validationServer03Feedback" class="invalid-feedback">
                        <?= $validation->getError('nama_team'); ?>
                    </div>
                </div>
                <div class="form-group">
                    <label for="kelas_balap">Kelas Balap</label>
                    <select class="form-control custom-select" id="id_kelasbalap" name="kelas_balap" required>
                        <?php foreach ($kelas_balap as $k) : ?>
                            <option value="<?= $k['id_kelasbalap']; ?>" <?= ($row['id_kelasbalap'] == $k['id_kelasbalap']) ? "selected" : "" ?>>
                                <?= $k['nama_kelasbalap'] ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary" onclick="return confirm('Apakah anda yakin ingin menyimpan perubahan ini?')">Submit</button>
                <a href=" <?= base_url('admin/team'); ?>" class="btn btn-primary">Kembali</a>
            </form>
        </div>
    <?php endforeach; ?>
</div>
<?= $this->endSection(); ?>