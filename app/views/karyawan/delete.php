<?php
$title = 'Hapus Karyawan';
ob_start();
?>

<<<<<<< HEAD
=======
<div class="mb-3">
    <a href="/Kepegawaian/karyawan" class="btn btn-secondary btn-sm">← Kembali</a>
</div>

>>>>>>> 29c4acf (initial commit project kepegawaian)
<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header bg-danger text-white">
                <h4>Hapus Karyawan</h4>
            </div>
            <div class="card-body">
                <p>Apakah Anda yakin ingin menghapus karyawan berikut?</p>
                <table class="table table-bordered">
                    <tr>
                        <th>ID</th>
                        <td><?= htmlspecialchars($karyawan['ID_Karyawan']) ?></td>
                    </tr>
                    <tr>
                        <th>Nama Lengkap</th>
                        <td><?= htmlspecialchars($karyawan['Nama_Lengkap']) ?></td>
                    </tr>
                    <tr>
                        <th>Email</th>
                        <td><?= htmlspecialchars($karyawan['Email_Kantor']) ?></td>
                    </tr>
                </table>
                
                <form method="POST" action="/Kepegawaian/karyawan/delete/<?= $karyawan['ID_Karyawan'] ?>">
                    <div class="d-flex justify-content-between">
                        <a href="/Kepegawaian/karyawan" class="btn btn-secondary">Batal</a>
                        <button type="submit" class="btn btn-danger">Ya, Hapus</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php
$content = ob_get_clean();
require_once __DIR__ . '/../layouts/base.php';
?>

