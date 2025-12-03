<?php
$title = 'Hapus Master Cuti';
ob_start();
?>

<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header bg-danger text-white">
                <h4>Hapus Master Cuti</h4>
            </div>
            <div class="card-body">
                <p>Apakah Anda yakin ingin menghapus master cuti berikut?</p>
                <table class="table table-bordered">
                    <tr>
                        <th>ID</th>
                        <td><?= htmlspecialchars($masterCuti['ID_Master_Cuti']) ?></td>
                    </tr>
                    <tr>
                        <th>Nama Cuti</th>
                        <td><?= htmlspecialchars($masterCuti['Nama_Cuti']) ?></td>
                    </tr>
                </table>
                
                <form method="POST" action="/Kepegawaian/mastercuti/delete/<?= $masterCuti['ID_Master_Cuti'] ?>">
                    <div class="d-flex justify-content-between">
                        <a href="/Kepegawaian/mastercuti" class="btn btn-secondary">Batal</a>
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

