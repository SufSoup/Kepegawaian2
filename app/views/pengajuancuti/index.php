<?php
$title = 'Pengajuan Cuti';
ob_start();
?>

<div class="d-flex justify-content-between align-items-center mb-3">
    <div>
        <a href="/Kepegawaian/dashboard" class="btn btn-secondary btn-sm">← Kembali</a>
        <h3 class="d-inline-block ms-2">Halaman Pengajuan Cuti</h3>
    </div>
    <div>
        <?php if ($user['role'] === 'Supervisor'): ?>
            <a href="/Kepegawaian/pengajuancuti/history" class="btn btn-info btn-sm me-2">📋 Lihat History</a>
        <?php endif; ?>
        <?php if ($user['role'] === 'HRD'): ?>
            <a href="/Kepegawaian/pengajuancuti/delete-all" class="btn btn-danger btn-sm me-2" onclick="return confirm('Yakin ingin menghapus semua pengajuan cuti?')">Hapus Semua</a>
        <?php endif; ?>
        <?php if ($user['role'] === 'Karyawan'): ?>
            <a href="/Kepegawaian/pengajuancuti/create" class="btn btn-primary">Tambah Pengajuan Cuti</a>
        <?php endif; ?>
    </div>
</div>

<div class="card">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>No</th>
                        <?php if ($user['role'] !== 'Karyawan'): ?>
                            <th>Nama Karyawan</th>
                        <?php endif; ?>
                        <th>Jenis Cuti</th>
                        <th>Tanggal Mulai</th>
                        <th>Tanggal Selesai</th>
                        <th>Hari</th>
                        <th>Keterangan</th>
                        <th>Status</th>
                        <th>Disetujui Oleh</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (empty($pengajuans)): ?>
                        <tr>
                            <td colspan="10" class="text-center">Tidak ada data pengajuan cuti</td>
                        </tr>
                    <?php else: ?>
                        <?php $no = 0; foreach ($pengajuans as $p): $no++; ?>
                            <tr>
                                <td><?= $no ?></td>
                                <?php if ($user['role'] !== 'Karyawan'): ?>
                                    <td><?= htmlspecialchars($p['Nama_Lengkap'] ?? '-') ?></td>
                                <?php endif; ?>
                                <td><?= htmlspecialchars($p['Nama_Cuti'] ?? '-') ?></td>
                                <td><?= date('d/m/Y', strtotime($p['Tgl_Awal'] ?? '2000-01-01')) ?></td>
                                <td><?= date('d/m/Y', strtotime($p['Tgl_Akhir'] ?? '2000-01-01')) ?></td>
                                <td><?= htmlspecialchars($p['Jumlah_Hari']) ?> hari</td>
                                <td><?= htmlspecialchars(substr($p['Alasan'] ?? '-', 0, 50)) ?></td>
                                <td>
                                    <?php
                                    $badgeClass = 'secondary';
                                    if ($p['Status_Pengajuan'] === 'Disetujui') $badgeClass = 'success';
                                    if ($p['Status_Pengajuan'] === 'Ditolak') $badgeClass = 'danger';
                                    ?>
                                    <span class="badge bg-<?= $badgeClass ?>">
                                        <?= htmlspecialchars($p['Status_Pengajuan']) ?>
                                    </span>
                                </td>
                                <td>
                                    <?php if ($p['Status_Pengajuan'] !== 'Pending'): ?>
                                        <?= htmlspecialchars($p['Nama_Penyetuju'] ?? '-') ?>
                                    <?php else: ?>
                                        <span class="text-muted">-</span>
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <?php if ($user['role'] === 'Supervisor' && $p['Status_Pengajuan'] === 'Pending'): ?>
                                        <a href="/Kepegawaian/pengajuancuti/approve/<?= $p['ID_Cuti'] ?>" class="btn btn-sm btn-success" onclick="return confirm('Setujui pengajuan cuti?')">Setujui</a>
                                        <a href="/Kepegawaian/pengajuancuti/reject/<?= $p['ID_Cuti'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Tolak pengajuan cuti?')">Tolak</a>
                                    <?php endif; ?>
                                    
                                    <?php if ($user['role'] === 'Karyawan' && $p['Status_Pengajuan'] === 'Pending'): ?>
                                        <a href="/Kepegawaian/pengajuancuti/edit/<?= $p['ID_Cuti'] ?>" class="btn btn-sm btn-warning">Edit</a>
                                    <?php endif; ?>
                                    
                                    <?php if ($user['role'] === 'Karyawan'): ?>
                                        <a href="/Kepegawaian/pengajuancuti/delete/<?= $p['ID_Cuti'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus?')">Hapus</a>
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

