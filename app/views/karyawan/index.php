<?php
$title = 'Data Karyawan';
ob_start();
?>

<div class="d-flex justify-content-between align-items-center mb-3">
    <h3>Halaman Karyawan</h3>
    <?php if ($user['role'] === 'HRD'): ?>
        <a href="/Kepegawaian/karyawan/create" class="btn btn-primary">Tambah Karyawan</a>
    <?php endif; ?>
</div>

<div class="card">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nama Lengkap</th>
                        <th>Departemen</th>
                        <th>Email</th>
                        <th>Tanggal Masuk</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (empty($karyawans)): ?>
                        <tr>
                            <td colspan="7" class="text-center">Tidak ada data karyawan</td>
                        </tr>
                    <?php else: ?>
                        <?php foreach ($karyawans as $karyawan): ?>
                            <tr>
                                <td><?= htmlspecialchars($karyawan['ID_Karyawan']) ?></td>
                                <td><?= htmlspecialchars($karyawan['Nama_Lengkap']) ?></td>
                                <td><?= htmlspecialchars($karyawan['Nama_Departemen'] ?? '-') ?></td>
                                <td><?= htmlspecialchars($karyawan['Email_Kantor']) ?></td>
                                <td><?= date('d/m/Y', strtotime($karyawan['Tgl_Masuk'])) ?></td>
                                <td>
                                    <span class="badge bg-<?= $karyawan['Status_Kerja'] === 'Aktif' ? 'success' : 'danger' ?>">
                                        <?= htmlspecialchars($karyawan['Status_Kerja']) ?>
                                    </span>
                                </td>
                                <td>
                                    <a href="/Kepegawaian/karyawan/edit/<?= $karyawan['ID_Karyawan'] ?>" class="btn btn-sm btn-warning">Edit</a>
                                    <?php if ($user['role'] === 'HRD'): ?>
                                        <a href="/Kepegawaian/karyawan/delete/<?= $karyawan['ID_Karyawan'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus?')">Hapus</a>
                                    <?php endif; ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php
$content = ob_get_clean();
require_once __DIR__ . '/../layouts/base.php';
?>

