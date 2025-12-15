<?php
$title = 'Data Karyawan';
ob_start();
?>

<!-- Jika Karyawan, tampilkan biodata mereka sendiri -->
<?php if ($user['role'] === 'Karyawan' && !empty($karyawans)): ?>
    <?php $karyawan = $karyawans[0]; ?>
    <div class="mb-3">
        <a href="/Kepegawaian/dashboard" class="btn btn-secondary btn-sm">← Kembali</a>
    </div>

    <div class="row justify-content-center">
        <div class="col-md-8">
            <!-- Biodata Card -->
            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white">
                    <h4 class="mb-0">📋 Biodata Saya</h4>
                </div>
                <div class="card-body">
                    <!-- Nama dan Status -->
                    <div class="mb-4 pb-3 border-bottom">
                        <div class="row">
                            <div class="col-md-8">
                                <h3 class="mb-1"><?= htmlspecialchars($karyawan['Nama_Lengkap']) ?></h3>
                                <p class="text-muted mb-0">ID: <?= htmlspecialchars($karyawan['ID_Karyawan']) ?></p>
                            </div>
                            <div class="col-md-4 text-end">
                                <span class="badge bg-<?= $karyawan['Status_Kerja'] === 'Aktif' ? 'success' : 'danger' ?> fs-6">
                                    <?= htmlspecialchars($karyawan['Status_Kerja']) ?>
                                </span>
                            </div>
                        </div>
                    </div>

                    <!-- Data Pribadi -->
                    <div class="mb-4">
                        <h5 class="text-dark mb-3">
                            <i class="bi bi-person"></i> Data Pribadi
                        </h5>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <p class="text-muted small mb-1">Tanggal Lahir</p>
                                <p class="mb-0"><strong><?= date('d/m/Y', strtotime($karyawan['Tgl_Lahir'])) ?></strong></p>
                            </div>
                            <div class="col-md-6">
                                <p class="text-muted small mb-1">Email Kantor</p>
                                <p class="mb-0"><strong><?= htmlspecialchars($karyawan['Email_Kantor']) ?></strong></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <p class="text-muted small mb-1">Alamat</p>
                                <p class="mb-0"><strong><?= htmlspecialchars($karyawan['Alamat'] ?? '-') ?></strong></p>
                            </div>
                        </div>
                    </div>

                    <!-- Data Pekerjaan -->
                    <div class="mb-4 pb-3 border-bottom">
                        <h5 class="text-dark mb-3">
                            <i class="bi bi-briefcase"></i> Data Pekerjaan
                        </h5>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <p class="text-muted small mb-1">Departemen</p>
                                <p class="mb-0"><strong><?= htmlspecialchars($karyawan['Nama_Departemen'] ?? '-') ?></strong></p>
                            </div>
                            <div class="col-md-6">
                                <p class="text-muted small mb-1">Tanggal Masuk</p>
                                <p class="mb-0"><strong><?= date('d/m/Y', strtotime($karyawan['Tgl_Masuk'])) ?></strong></p>
                            </div>
                        </div>
                    </div>

                    <!-- Action Buttons -->
                    <div class="d-flex gap-2 justify-content-between">
                        <a href="/Kepegawaian/dashboard" class="btn btn-secondary">← Kembali</a>
                        <a href="/Kepegawaian/karyawan/edit/<?= $karyawan['ID_Karyawan'] ?>" class="btn btn-primary">✏️ Edit</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php else: ?>
    <!-- Untuk HRD/Supervisor, tampilkan list tabel -->
    <div class="d-flex justify-content-between align-items-center mb-3">
        <div>
            <a href="/Kepegawaian/dashboard" class="btn btn-secondary btn-sm">← Kembali</a>
            <h3 class="d-inline-block ms-2">Halaman Karyawan</h3>
        </div>
        <?php if ($user['role'] === 'HRD'): ?>
            <a href="/Kepegawaian/karyawan/create" class="btn btn-primary">Tambah Karyawan</a>
        <?php endif; ?>
    </div>

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

    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>No</th>
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
                            <?php $no = 0; foreach ($karyawans as $karyawan): $no++; ?>
                                <tr>
                                    <td><?= $no ?></td>
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
                                        <a href="/Kepegawaian/karyawan/show/<?= $karyawan['ID_Karyawan'] ?>" class="btn btn-sm btn-info">Lihat</a>
                                        <?php if ($user['role'] === 'HRD' || $user['karyawan_id'] == $karyawan['ID_Karyawan']): ?>
                                            <a href="/Kepegawaian/karyawan/edit/<?= $karyawan['ID_Karyawan'] ?>" class="btn btn-sm btn-warning">Edit</a>
                                        <?php endif; ?>
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
<?php endif; ?>

<?php
$content = ob_get_clean();
require_once __DIR__ . '/../layouts/base.php';
?>

