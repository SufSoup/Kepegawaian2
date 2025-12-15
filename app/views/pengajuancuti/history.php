<?php
$title = 'History Pengajuan Cuti';
ob_start();
?>

<div class="d-flex justify-content-between align-items-center mb-3">
    <div>
        <a href="/Kepegawaian/dashboard" class="btn btn-secondary btn-sm">← Kembali ke Dashboard</a>
        <h3 class="d-inline-block ms-2">History Pengajuan Cuti</h3>
    </div>
</div>

<div class="card">
    <div class="card-header bg-info text-white">
        <h5 class="mb-0">Riwayat Pengajuan Cuti yang Sudah Diproses</h5>
    </div>
    <div class="card-body">
        <p>Berikut adalah history dari semua pengajuan cuti yang sudah disetujui atau ditolak</p>
    </div>
</div>

<div class="card mt-3">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Pengaju (Karyawan)</th>
                        <th>Jenis Cuti</th>
                        <th>Tanggal Mulai</th>
                        <th>Tanggal Selesai</th>
                        <th>Hari</th>
                        <th>Status</th>
                        <th>Disetujui Oleh</th>
                        <th>Tanggal Persetujuan</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (empty($histories)): ?>
                        <tr>
                            <td colspan="9" class="text-center">Belum ada history pengajuan cuti yang diproses</td>
                        </tr>
                    <?php else: ?>
                        <?php foreach ($histories as $h): ?>
                            <tr>
                                <td><?= htmlspecialchars($h['ID_Cuti']) ?></td>
                                <td><?= htmlspecialchars($h['Pengaju'] ?? '-') ?></td>
                                <td><?= htmlspecialchars($h['Nama_Cuti'] ?? '-') ?></td>
                                <td><?= date('d/m/Y', strtotime($h['Tgl_Awal'] ?? '2000-01-01')) ?></td>
                                <td><?= date('d/m/Y', strtotime($h['Tgl_Akhir'] ?? '2000-01-01')) ?></td>
                                <td><?= htmlspecialchars($h['Jumlah_Hari']) ?> hari</td>
                                <td>
                                    <?php
                                    $badgeClass = 'secondary';
                                    if ($h['Status_Pengajuan'] === 'Disetujui') $badgeClass = 'success';
                                    if ($h['Status_Pengajuan'] === 'Ditolak') $badgeClass = 'danger';
                                    ?>
                                    <span class="badge bg-<?= $badgeClass ?>">
                                        <?= htmlspecialchars($h['Status_Pengajuan']) ?>
                                    </span>
                                </td>
                                <td><?= htmlspecialchars($h['Penyetuju'] ?? '-') ?></td>
                                <td><?= $h['Tgl_Persetujuan'] ? date('d/m/Y H:i', strtotime($h['Tgl_Persetujuan'])) : '-' ?></td>
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
