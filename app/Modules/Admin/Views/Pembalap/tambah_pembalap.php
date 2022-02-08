<?= $this->extend('App\Modules\Auth\Views\Layout\template'); ?>

<?= $this->section('content'); ?>

<div class="container">
    <h5 class="mt-4 mb-4">Tambah Data Pembalap</h5>

    <?php if (session()->getFlashdata('failed')) : ?>
        <div id="failed" data-flash="<?= session()->getFlashdata('failed'); ?>"></div>
    <?php endif ?>

    <div class="card">
        <form action="<?= base_url('admin/pembalap/simpan'); ?>" method="POST" enctype="multipart/form-data">
            <?= csrf_field(); ?>
            <div class="form-group">
                <label for="no_balap">No Balap</label>
                <input type="text" class="form-control <?= ($validation->hasError('no_balap')) ? 'is-invalid' : ''; ?>" id="id_nobalap" name="no_balap" value="<?= old('no_balap'); ?>">
                <div id="validationServer03Feedback" class="invalid-feedback">
                    <?= $validation->getError('no_balap'); ?>
                </div>
            </div>
            <div class="form-group">
                <label for="nama">Nama</label>
                <input type="text" class="form-control <?= ($validation->hasError('nama')) ? 'is-invalid' : ''; ?>" id="id_nama" name="nama" value="<?= old('nama'); ?>">
                <div id="validationServer03Feedback" class="invalid-feedback">
                    <?= $validation->getError('nama'); ?>
                </div>
            </div>
            <div class="form-group">
                <label for="team">Team</label>
                <select class="form-control custom-select" id="id_team" name="team" value="<?= old('team'); ?>" required>
                    <option selected disabled value="">Pilih Team</option>
                    <?php foreach ($team as $t) : ?>
                        <option value="<?= $t['id_team']; ?>"><?= $t['nama_team'] ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group">
                <label for="kelas_balap">Kelas Balap</label>
                <select class="form-control custom-select" id="id_kelasbalap" name="kelas_balap" value="<?= old('kelas_balap'); ?>" required>
                    <option selected disabled value="">Pilih Kelas Balap</option>
                    <?php foreach ($kelas_balap as $k) : ?>
                        <option value="<?= $k['id_kelasbalap']; ?>"><?= $k['nama_kelasbalap'] ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group">
                <label for="tempat_lahir">Tempat Lahir</label>
                <input type="text" class="form-control <?= ($validation->hasError('tempat_lahir')) ? 'is-invalid' : ''; ?>" id="id_tempatlahir" name="tempat_lahir" value="<?= old('tempat_lahir'); ?>">
                <div id="validationServer03Feedback" class="invalid-feedback">
                    <?= $validation->getError('tempat_lahir'); ?>
                </div>
            </div>
            <div class="form-group">
                <label for="tanggal_lahir">Tanggal Lahir</label>
                <input type="text" class="form-control <?= ($validation->hasError('tanggal_lahir')) ? 'is-invalid' : ''; ?>" id="id_tanggallahir date" name="tanggal_lahir" value="<?= old('tanggal_lahir'); ?>" placeholder="YYYY-MM-DD">
                <div id="validationServer03Feedback" class="invalid-feedback">
                    <?= $validation->getError('tanggal_lahir'); ?>
                </div>
            </div>
            <div class="form-group">
                <label for="negara">Negara</label>
                <input type="text" class="form-control <?= ($validation->hasError('negara')) ? 'is-invalid' : ''; ?>" id="id_negara" name="negara" value="<?= old('negara'); ?>">
                <div id="validationServer03Feedback" class="invalid-feedback">
                    <?= $validation->getError('negara'); ?>
                </div>
            </div>
            <div class="form-group">
                <label for="foto">Foto</label>
                <div class="row">
                    <div class="col-sm-2">
                        <img src="<?= base_url('img/foto-default.png'); ?>" class="img-thumbnail img-preview">
                    </div>
                    <div class="col-sm-10">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input <?= ($validation->hasError('foto')) ? 'is-invalid' : ''; ?>" id="id_foto" name="foto" onchange="previewImg()">
                            <label class="custom-file-label" for="foto">Pilih Gambar</label>
                            <div id="validationServer03Feedback" class="invalid-feedback">
                                <?= $validation->getError('foto'); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm">
                    <button type="submit" id="btn_tambah" class="btn btn-primary">Submit</button>
                </div>
                <div class="col-sm">
                    <a href="<?= base_url('admin/pembalap'); ?>" class="btn btn-primary float-right">Kembali</a>
                </div>
            </div>
        </form>
    </div>
</div>

<?= $this->endSection(); ?>