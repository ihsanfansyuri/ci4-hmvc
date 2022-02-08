<?= $this->extend('App\Modules\Auth\Views\Layout\template'); ?>

<?= $this->section('content'); ?>

<div class="container">
    <h5 class="mt-4 mb-4">Edit Data Pembalap</h5>

    <?php if (session()->getFlashdata('failed')) : ?>
        <div id="failed" data-flash="<?= session()->getFlashdata('failed'); ?>"></div>
    <?php endif; ?>

    <div class="card">
        <?php foreach ($pembalap as $row) : ?>
            <form method="POST" action="<?= base_url('admin/pembalap/update')  . '/' . $row['no_balap']; ?>" id="btn_update" enctype="multipart/form-data">
                <?= csrf_field(); ?>
                <input type="hidden" name="slug" value="<?= $row['slug']; ?>">
                <input type="hidden" name="fotoLama" value="<?= $row['foto']; ?>">
                <div class="form-group">
                    <label for="no_balap">No Balap</label>
                    <input type="text" value="<?= $row['no_balap']; ?>" class="form-control <?= ($validation->hasError('no_balap')) ? 'is-invalid' : ''; ?>" id="id_nobalap" name="no_balap" value="<?= (old('no_balap')) ? old('no_balap') : $row['no_balap']; ?>">
                    <div id="validationServer03Feedback" class="invalid-feedback">
                        <?= $validation->getError('no_balap'); ?>
                    </div>
                </div>
                <div class="form-group">
                    <label for="nama">Nama</label>
                    <input type="text" value="<?= $row['nama']; ?>" class="form-control <?= ($validation->hasError('nama')) ? 'is-invalid' : ''; ?>" id="id_nama" name="nama" value="<?= (old('nama')) ? old('nama') : $row['nama']; ?>">
                    <div id="validationServer03Feedback" class="invalid-feedback">
                        <?= $validation->getError('nama'); ?>
                    </div>
                </div>
                <div class="form-group">
                    <label for="team">Team</label>
                    <select class="form-control custom-select" id="id_team" name="team" value="<?= (old('team')) ? old('team') : $row['id_team']; ?>" required>
                        <?php foreach ($team as $t) : ?>
                            <option value="<?= $t['id_team'] ?>" <?= ($row['id_team'] == $t['id_team']) ? "selected" : "" ?>><?= $t['nama_team']; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="kelas_balap">Kelas Balap</label>
                    <select class="form-control custom-select" id="id_kelasbalap" name="kelas_balap" value="<?= (old('kelas_balap')) ? old('kelas_balap') : $row['id_kelasbalap']; ?>" required>
                        <?php foreach ($kelas_balap as $k) : ?>
                            <option value=" <?= $k['id_kelasbalap']; ?>" <?= ($row['id_kelasbalap'] == $k['id_kelasbalap']) ? "selected" : "" ?>>
                                <?= $k['nama_kelasbalap'] ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="tempat_lahir">Tempat Lahir</label>
                    <input type="text" value="<?= $row['tempat_lahir']; ?>" class="form-control <?= ($validation->hasError('tempat_lahir')) ? 'is-invalid' : ''; ?>" id="id_tempatlahir" name="tempat_lahir" value="<?= (old('tempat_lahir')) ? old('tempat_lahir') : $row['tempat_lahir']; ?>>
                    <div id=" validationServer03Feedback" class="invalid-feedback">
                    <?= $validation->getError('tempat_lahir'); ?>
                </div>
                <div class="form-group">
                    <label for="tanggal_lahir">Tanggal Lahir</label>
                    <input type="text" value="<?= $row['tanggal_lahir']; ?>" class="form-control <?= ($validation->hasError('tanggal_lahir')) ? 'is-invalid' : ''; ?>" id="id_tanggallahir date" name="tanggal_lahir" value="<?= (old('tanggal_lahir')) ? old('tanggal_lahir') : $row['tanggal_lahir']; ?>" placeholder="YYYY-MM-DD">
                    <div id="validationServer03Feedback" class="invalid-feedback">
                        <?= $validation->getError('tanggal_lahir'); ?>
                    </div>
                </div>
                <div class="form-group">
                    <label for="negara">Negara</label>
                    <input type="text" value="<?= $row['negara']; ?>" class="form-control <?= ($validation->hasError('negara')) ? 'is-invalid' : ''; ?>" id="id_negara" name="negara" value="<?= old('negara'); ?>">
                    <div id="validationServer03Feedback" class="invalid-feedback">
                        <?= $validation->getError('negara'); ?>
                    </div>
                </div>
                <div class="form-group">
                    <label for="foto">Foto</label>
                    <div class="row">
                        <div class="col-sm-2">
                            <img src="<?= base_url('img') . '/' . $row['foto'] ?>" class="img-thumbnail img-preview">
                        </div>
                        <div class="col-sm-10">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input <?= ($validation->hasError('foto')) ? 'is-invalid' : ''; ?>" id="id_foto" name="foto" onchange="previewImg()">
                                <label class="custom-file-label" for="foto"><?= $row['foto']; ?></label>
                                <div id="validationServer03Feedback" class="invalid-feedback">
                                    <?= $validation->getError('foto'); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <a href="<?= base_url('admin/pembalap') . '/' . $row['slug']; ?>" class="btn btn-primary">Kembali</a>
                    </div>
                    <div class="col-sm">
                        <a href="<?= base_url('admin/pembalap'); ?>" class="btn btn-light float-right">Kembali ke halaman utama</a>
                    </div>
                </div>
            </form>
        <?php endforeach; ?>
    </div>
</div>
<?= $this->endSection(); ?>