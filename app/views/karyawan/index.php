<?php
$title = 'Data Karyawan';
ob_start();
?>

<div class="d-flex justify-content-between align-items-center mb-3">
<<<<<<< HEAD
    <h3>Halaman Karyawan</h3>
=======
    <div>
        <a href="/Kepegawaian/dashboard" class="btn btn-secondary btn-sm">← Kembali</a>
        <h3 class="d-inline-block ms-2">Halaman Karyawan</h3>
    </div>
>>>>>>> 29c4acf (initial commit project kepegawaian)
    <?php if ($user['role'] === 'HRD'): ?>
        <a href="/Kepegawaian/karyawan/create" class="btn btn-primary">Tambah Karyawan</a>
    <?php endif; ?>
</div>

<<<<<<< HEAD
=======
<?php if ($user['role'] !== 'Karyawan'): ?>
<div class="card mb-3">
    <div class="card-body">
        <label for="sort" class="form-label">Urutkan:</label>
        <form method="GET" action="/Kepegawaian/karyawan" class="d-flex gap-2">
            <select id="sort" name="sort" class="form-select" onchange="this.form.submit()">
                <option value="default" <?= $sort === 'default' ? 'selected' : '' ?>>Default</option>
                <option value="nama_asc" <?= $sort === 'nama_asc' ? 'selected' : '' ?>>Nama (A-Z)</option>
                <option value="nama_desc" <?= $sort === 'nama_desc' ? 'selected' : '' ?>>Nama (Z-A)</option>
                <option value="departemen" <?= $sort === 'departemen' ? 'selected' : '' ?>>Departemen</option>
                <option value="tgl_masuk_terlama" <?= $sort === 'tgl_masuk_terlama' ? 'selected' : '' ?>>Terlama Masuk</option>
                <option value="tgl_masuk_terbaru" <?= $sort === 'tgl_masuk_terbaru' ? 'selected' : '' ?>>Terbaru Masuk</option>
            </select>
        </form>
    </div>
</div>
<?php endif; ?>

>>>>>>> 29c4acf (initial commit project kepegawaian)
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
<<<<<<< HEAD
                        <?php foreach ($karyawans as $karyawan): ?>
                            <tr>
                                <td><?= htmlspecialchars($karyawan['ID_Karyawan']) ?></td>
=======
                        <?php $no = 0; foreach ($karyawans as $karyawan): $no++; ?>
                            <tr>
                                <td><?= $no ?></td>
>>>>>>> 29c4acf (initial commit project kepegawaian)
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
<<<<<<< HEAD
                                    <a href="/Kepegawaian/karyawan/edit/<?= $karyawan['ID_Karyawan'] ?>" class="btn btn-sm btn-warning">Edit</a>
=======
                                    <a href="/Kepegawaian/karyawan/show/<?= $karyawan['ID_Karyawan'] ?>" class="btn btn-sm btn-info">Lihat</a>
                                    <?php if ($user['role'] === 'HRD' || $user['karyawan_id'] == $karyawan['ID_Karyawan']): ?>
                                        <a href="/Kepegawaian/karyawan/edit/<?= $karyawan['ID_Karyawan'] ?>" class="btn btn-sm btn-warning">Edit</a>
                                    <?php endif; ?>
>>>>>>> 29c4acf (initial commit project kepegawaian)
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

