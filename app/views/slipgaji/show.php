<?php
$title = 'Detail Slip Gaji';
ob_start();
?>

<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header bg-info text-white">
                <h4>Slip Gaji</h4>
            </div>
            <div class="card-body">
                <div class="row mb-3">
                    <div class="col-md-6">
                        <h6>Nama Karyawan</h6>
                        <p><?= htmlspecialchars($slipGaji['Nama_Lengkap']) ?></p>
                    </div>
                    <div class="col-md-6">
                        <h6>Periode</h6>
                        <p><?= date('F Y', mktime(0, 0, 0, $slipGaji['Periode_Bulan'], 1, $slipGaji['Periode_Tahun'])) ?></p>
                    </div>
                </div>
                
                <hr>
                
                <div class="row mb-2">
                    <div class="col-md-6"><strong>Gaji Pokok</strong></div>
                    <div class="col-md-6 text-end">Rp <?= number_format($slipGaji['Gaji_Pokok'], 0, ',', '.') ?></div>
                </div>
                
                <div class="row mb-2">
                    <div class="col-md-6"><strong>Tunjangan Jabatan</strong></div>
                    <div class="col-md-6 text-end">Rp <?= number_format($slipGaji['Tunjangan_Jabatan'], 0, ',', '.') ?></div>
                </div>
                
                <div class="row mb-2">
                    <div class="col-md-6"><strong>Total Pendapatan</strong></div>
                    <div class="col-md-6 text-end">Rp <?= number_format($slipGaji['Total_Pendapatan'], 0, ',', '.') ?></div>
                </div>
                
                <hr>
                
                <div class="row mb-2">
                    <div class="col-md-6"><strong>Potongan BPJS</strong></div>
                    <div class="col-md-6 text-end">Rp <?= number_format($slipGaji['Potongan_BPJS'], 0, ',', '.') ?></div>
                </div>
                
                <div class="row mb-2">
                    <div class="col-md-6"><strong>Total Potongan</strong></div>
                    <div class="col-md-6 text-end">Rp <?= number_format($slipGaji['Total_Potongan'], 0, ',', '.') ?></div>
                </div>
                
                <hr>
                
                <div class="row mb-3">
                    <div class="col-md-6"><h5>Take Home Pay</h5></div>
                    <div class="col-md-6 text-end"><h5>Rp <?= number_format($slipGaji['Take_Home_Pay'], 0, ',', '.') ?></h5></div>
                </div>
                
                <div class="d-flex justify-content-between">
                    <a href="/Kepegawaian/slipgaji" class="btn btn-secondary">Kembali</a>
                    <button onclick="window.print()" class="btn btn-primary">Cetak</button>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
$content = ob_get_clean();
require_once __DIR__ . '/../layouts/base.php';
?>

