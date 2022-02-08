<?= $this->extend('App\Modules\Auth\Views\Layout\template'); ?>

<?= $this->section('content'); ?>

<div class="container mt-4">
    <h3>Team Balap</h3>
    <div class="card">
        <table id="table_id" class="table table-hover tabel">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Team</th>
                    <th scope="col">Kelas Balap</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1 + (5 * ($currentPage - 1)); ?>
                <?php foreach ($team as $row) : ?>
                    <tr>
                        <th><?= $i++; ?></th>
                        <td><?= $row['nama_team']; ?></td>
                        <td><?= $row['nama_kelasbalap']; ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
<?= $this->endSection(); ?>