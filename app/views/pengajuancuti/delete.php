<?php
$title = 'Hapus Pengajuan Cuti';
ob_start();
?>

<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header bg-danger text-white">
                <h4>Hapus Pengajuan Cuti</h4>
            </div>
            <div class="card-body">
                <p>Apakah Anda yakin ingin menghapus pengajuan cuti berikut?</p>
                <table class="table table-bordered">
                    <tr>
                        <th>ID</th>
                        <td><?= htmlspecialchars($pengajuan['ID_Cuti']) ?></td>
                    </tr>
                    <tr>
                        <th>Nama Karyawan</th>
                        <td><?= htmlspecialchars($pengajuan['Nama_Lengkap']) ?></td>
                    </tr>
                </table>
                
                <form method="POST" action="/Kepegawaian/pengajuancuti/delete/<?= $pengajuan['ID_Cuti'] ?>">
                    <div class="d-flex justify-content-between">
                        <a href="/Kepegawaian/pengajuancuti" class="btn btn-secondary">Batal</a>
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

