<?php
$title = 'Hapus Departemen';
ob_start();
?>

<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header bg-danger text-white">
                <h4>Hapus Departemen</h4>
            </div>
            <div class="card-body">
                <p>Apakah Anda yakin ingin menghapus departemen berikut?</p>
                <table class="table table-bordered">
                    <tr>
                        <th>ID</th>
                        <td><?= htmlspecialchars($department['ID_Departemen']) ?></td>
                    </tr>
                    <tr>
                        <th>Jabatan</th>
                        <td><?= htmlspecialchars($department['Jabatan']) ?></td>
                    </tr>
                </table>
                
                <form method="POST" action="/Kepegawaian/department/delete/<?= $department['ID_Departemen'] ?>">
                    <div class="d-flex justify-content-between">
                        <a href="/Kepegawaian/department" class="btn btn-secondary">Batal</a>
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

