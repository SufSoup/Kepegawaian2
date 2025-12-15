<?php
/**
 * ========================================
 * LAPORAN CONTROLLER
 * ========================================
 * Handle semua laporan:
 * - Laporan Karyawan
 * - Laporan Pengajuan Cuti
 * - Laporan Slip Gaji
 * - Export ke Excel/PDF
 */

require_once __DIR__ . '/../../core/Controller.php';
require_once __DIR__ . '/../../helpers/Auth.php';
require_once __DIR__ . '/../models/karyawan.php';
require_once __DIR__ . '/../models/department.php';
require_once __DIR__ . '/../models/pengajuancuti.php';
require_once __DIR__ . '/../models/slipgaji.php';

class LaporanController extends Controller {
    
    /**
     * Index - Halaman utama laporan
     * Hanya HRD dan Supervisor yang bisa akses
     */
    public function index() {
        Auth::requireRole(['HRD', 'Supervisor']);
        
        $user = Auth::user();
        
        $this->view('laporan/index', [
            'user' => $user
        ]);
    }
    
    /**
     * Laporan Data Karyawan
     */
    public function karyawan() {
        Auth::requireRole(['HRD', 'Supervisor']);
        
        $karyawanModel = new Karyawan();
        $departmentModel = new Department();
        
        // Filter parameters
        $filterDepartemen = $this->input('departemen', 'all');
        $filterStatus = $this->input('status', 'all');
        
        // Get all karyawan
        $karyawans = $karyawanModel->getAllWithDepartment();
        
        // Apply filters
        if ($filterDepartemen !== 'all') {
            $karyawans = array_filter($karyawans, function($k) use ($filterDepartemen) {
                return $k['ID_Departemen'] == $filterDepartemen;
            });
        }
        
        if ($filterStatus !== 'all') {
            $karyawans = array_filter($karyawans, function($k) use ($filterStatus) {
                return $k['Status_Kerja'] === $filterStatus;
            });
        }
        
        // Get departments for filter
        $departments = $departmentModel->all();
        
        // Statistics
        $stats = [
            'total' => count($karyawans),
            'aktif' => count(array_filter($karyawans, fn($k) => $k['Status_Kerja'] === 'Aktif')),
            'non_aktif' => count(array_filter($karyawans, fn($k) => $k['Status_Kerja'] === 'Non-Aktif')),
            'cuti' => count(array_filter($karyawans, fn($k) => $k['Status_Kerja'] === 'Cuti'))
        ];
        
        $this->view('laporan/karyawan', [
            'karyawans' => array_values($karyawans),
            'departments' => $departments,
            'stats' => $stats,
            'filterDepartemen' => $filterDepartemen,
            'filterStatus' => $filterStatus,
            'user' => Auth::user()
        ]);
    }
    
    /**
     * Laporan Pengajuan Cuti
     */
    public function cuti() {
        Auth::requireRole(['HRD', 'Supervisor']);
        
        $pengajuanCutiModel = new PengajuanCuti();
        $karyawanModel = new Karyawan();
        
        // Filter parameters
        $filterStatus = $this->input('status', 'all');
        $filterBulan = $this->input('bulan', date('m'));
        $filterTahun = $this->input('tahun', date('Y'));
        
        // Get pengajuan cuti
        $pengajuans = $pengajuanCutiModel->getAllWithDetails();
        
        // Apply filters
        if ($filterStatus !== 'all') {
            $pengajuans = array_filter($pengajuans, function($p) use ($filterStatus) {
                return $p['Status_Pengajuan'] === $filterStatus;
            });
        }
        
        // Filter by month and year
        $pengajuans = array_filter($pengajuans, function($p) use ($filterBulan, $filterTahun) {
            $tglAwal = new DateTime($p['Tgl_Awal']);
            return $tglAwal->format('Y') == $filterTahun && 
                   $tglAwal->format('m') == $filterBulan;
        });
        
        // Statistics
        $stats = [
            'total' => count($pengajuans),
            'pending' => count(array_filter($pengajuans, fn($p) => $p['Status_Pengajuan'] === 'Pending')),
            'disetujui' => count(array_filter($pengajuans, fn($p) => $p['Status_Pengajuan'] === 'Disetujui')),
            'ditolak' => count(array_filter($pengajuans, fn($p) => $p['Status_Pengajuan'] === 'Ditolak')),
            'total_hari' => array_sum(array_column($pengajuans, 'Jumlah_Hari'))
        ];
        
        $this->view('laporan/cuti', [
            'pengajuans' => array_values($pengajuans),
            'stats' => $stats,
            'filterStatus' => $filterStatus,
            'filterBulan' => $filterBulan,
            'filterTahun' => $filterTahun,
            'user' => Auth::user()
        ]);
    }
    
    /**
     * Laporan Slip Gaji
     */
    public function gaji() {
        Auth::requireRole('HRD');
        
        $slipGajiModel = new SlipGaji();
        
        // Filter parameters
        $filterBulan = $this->input('bulan', date('m'));
        $filterTahun = $this->input('tahun', date('Y'));
        
        // Get slip gaji
        $slipGajis = $slipGajiModel->getAllWithDetails();
        
        // Filter by month and year
        $slipGajis = array_filter($slipGajis, function($sg) use ($filterBulan, $filterTahun) {
            return $sg['Bulan'] == $filterBulan && $sg['Tahun'] == $filterTahun;
        });
        
        // Statistics
        $stats = [
            'total_karyawan' => count($slipGajis),
            'total_gaji_pokok' => array_sum(array_column($slipGajis, 'Gaji_Pokok')),
            'total_tunjangan' => array_sum(array_map(function($sg) {
                return $sg['Tunjangan_Transportasi'] + 
                       $sg['Tunjangan_Kesehatan'] + 
                       $sg['Tunjangan_Lainnya'];
            }, $slipGajis)),
            'total_potongan' => array_sum(array_map(function($sg) {
                return $sg['Potongan_Tetap'] + $sg['Potongan_Lainnya'];
            }, $slipGajis)),
            'total_gaji_bersih' => array_sum(array_column($slipGajis, 'Gaji_Bersih'))
        ];
        
        $this->view('laporan/gaji', [
            'slipGajis' => array_values($slipGajis),
            'stats' => $stats,
            'filterBulan' => $filterBulan,
            'filterTahun' => $filterTahun,
            'user' => Auth::user()
        ]);
    }
    
    /**
     * Export Karyawan ke CSV
     */
    public function exportKaryawanCSV() {
        Auth::requireRole(['HRD', 'Supervisor']);
        
        $karyawanModel = new Karyawan();
        $karyawans = $karyawanModel->getAllWithDepartment();
        
        // Set headers for CSV download
        header('Content-Type: text/csv; charset=utf-8');
        header('Content-Disposition: attachment; filename="laporan_karyawan_' . date('Y-m-d') . '.csv"');
        
        // Create output stream
        $output = fopen('php://output', 'w');
        
        // Add BOM for UTF-8
        fprintf($output, chr(0xEF).chr(0xBB).chr(0xBF));
        
        // CSV Headers
        fputcsv($output, [
            'ID', 'Nama Lengkap', 'Departemen', 'Email', 
            'Tanggal Lahir', 'Tanggal Masuk', 'Status', 'Alamat'
        ]);
        
        // CSV Data
        foreach ($karyawans as $k) {
            fputcsv($output, [
                $k['ID_Karyawan'],
                $k['Nama_Lengkap'],
                $k['Nama_Departemen'] ?? '-',
                $k['Email_Kantor'],
                date('d/m/Y', strtotime($k['Tgl_Lahir'])),
                date('d/m/Y', strtotime($k['Tgl_Masuk'])),
                $k['Status_Kerja'],
                $k['Alamat']
            ]);
        }
        
        fclose($output);
        exit;
    }
    
    /**
     * Export Cuti ke CSV
     */
    public function exportCutiCSV() {
        Auth::requireRole(['HRD', 'Supervisor']);
        
        $pengajuanCutiModel = new PengajuanCuti();
        $pengajuans = $pengajuanCutiModel->getAllWithDetails();
        
        // Set headers
        header('Content-Type: text/csv; charset=utf-8');
        header('Content-Disposition: attachment; filename="laporan_cuti_' . date('Y-m-d') . '.csv"');
        
        $output = fopen('php://output', 'w');
        fprintf($output, chr(0xEF).chr(0xBB).chr(0xBF));
        
        // CSV Headers
        fputcsv($output, [
            'ID', 'Nama Karyawan', 'Jenis Cuti', 'Tanggal Mulai', 
            'Tanggal Selesai', 'Jumlah Hari', 'Status', 'Alasan'
        ]);
        
        // CSV Data
        foreach ($pengajuans as $p) {
            fputcsv($output, [
                $p['ID_Cuti'],
                $p['Nama_Lengkap'],
                $p['Nama_Cuti'],
                date('d/m/Y', strtotime($p['Tgl_Awal'])),
                date('d/m/Y', strtotime($p['Tgl_Akhir'])),
                $p['Jumlah_Hari'],
                $p['Status_Pengajuan'],
                $p['Alasan'] ?? '-'
            ]);
        }
        
        fclose($output);
        exit;
    }
    
    /**
     * Print Laporan (untuk preview sebelum print)
     */
    public function printKaryawan() {
        Auth::requireRole(['HRD', 'Supervisor']);
        
        $karyawanModel = new Karyawan();
        $karyawans = $karyawanModel->getAllWithDepartment();
        
        $this->view('laporan/print_karyawan', [
            'karyawans' => $karyawans,
            'tanggal_cetak' => date('d F Y')
        ]);
    }
}