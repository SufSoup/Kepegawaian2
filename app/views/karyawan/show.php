<?php
$title = 'Detail Karyawan';
ob_start();
?>

<<<<<<< HEAD
=======
<div class="mb-3">
    <a href="/Kepegawaian/karyawan" class="btn btn-secondary btn-sm">← Kembali</a>
</div>

>>>>>>> 29c4acf (initial commit project kepegawaian)
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header bg-info text-white">
                <h4>Detail Karyawan</h4>
            </div>
            <div class="card-body">
                <table class="table table-bordered">
                    <tr>
                        <th width="30%">ID Karyawan</th>
                        <td><?= htmlspecialchars($karyawan['ID_Karyawan']) ?></td>
                    </tr>
                    <tr>
                        <th>Nama Lengkap</th>
                        <td><?= htmlspecialchars($karyawan['Nama_Lengkap']) ?></td>
                    </tr>
                    <tr>
                        <th>Departemen</th>
                        <td><?= htmlspecialchars($karyawan['Nama_Departemen'] ?? '-') ?></td>
                    </tr>
                    <tr>
                        <th>Tanggal Lahir</th>
                        <td><?= date('d/m/Y', strtotime($karyawan['Tgl_Lahir'])) ?></td>
                    </tr>
                    <tr>
                        <th>Tanggal Masuk</th>
                        <td><?= date('d/m/Y', strtotime($karyawan['Tgl_Masuk'])) ?></td>
                    </tr>
                    <tr>
                        <th>Email Kantor</th>
                        <td><?= htmlspecialchars($karyawan['Email_Kantor']) ?></td>
                    </tr>
                    <tr>
                        <th>Alamat</th>
                        <td><?= htmlspecialchars($karyawan['Alamat'] ?? '-') ?></td>
                    </tr>
                    <tr>
                        <th>Status Kerja</th>
                        <td>
                            <span class="badge bg-<?= $karyawan['Status_Kerja'] === 'Aktif' ? 'success' : 'danger' ?>">
                                <?= htmlspecialchars($karyawan['Status_Kerja']) ?>
                            </span>
                        </td>
                    </tr>
                </table>
                
                <div class="d-flex justify-content-between">
                    <a href="/Kepegawaian/karyawan" class="btn btn-secondary">Kembali</a>
                    <a href="/Kepegawaian/karyawan/edit/<?= $karyawan['ID_Karyawan'] ?>" class="btn btn-primary">Edit</a>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
$content = ob_get_clean();
require_once __DIR__ . '/../layouts/base.php';
?>

