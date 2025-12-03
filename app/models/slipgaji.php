<?php

require_once __DIR__ . '/../../core/Model.php';

class SlipGaji extends Model {
    protected $table = 'slip_gaji';
    protected $primaryKey = 'ID_Slip';
    
    public function getAllWithDetails() {
        $db = Database::getInstance();
        $sql = "SELECT sg.*, k.Nama_Lengkap, k.Email_Kantor, d.Jabatan as Nama_Departemen
                FROM slip_gaji sg
                LEFT JOIN karyawan k ON sg.ID_Karyawan = k.ID_Karyawan
                LEFT JOIN departemen d ON k.ID_Departemen = d.ID_Departemen
                ORDER BY sg.Periode_Tahun DESC, sg.Periode_Bulan DESC, sg.ID_Slip DESC";
        $stmt = $db->query($sql);
        return $stmt->fetchAll();
    }
    
    public function getByKaryawan($karyawanId) {
        $db = Database::getInstance();
        $sql = "SELECT * FROM slip_gaji 
                WHERE ID_Karyawan = :karyawan_id 
                ORDER BY Periode_Tahun DESC, Periode_Bulan DESC";
        $stmt = $db->query($sql, ['karyawan_id' => $karyawanId]);
        return $stmt->fetchAll();
    }
    
    public function findWithDetails($id) {
        $db = Database::getInstance();
        $sql = "SELECT sg.*, k.Nama_Lengkap, k.Email_Kantor, d.Jabatan as Nama_Departemen
                FROM slip_gaji sg
                LEFT JOIN karyawan k ON sg.ID_Karyawan = k.ID_Karyawan
                LEFT JOIN departemen d ON k.ID_Departemen = d.ID_Departemen
                WHERE sg.ID_Slip = :id";
        $stmt = $db->query($sql, ['id' => $id]);
        return $stmt->fetch();
    }
    
    public function calculateTotal($data) {
        $gajiPokok = floatval($data['Gaji_Pokok'] ?? 0);
        $tunjangan = floatval($data['Tunjangan_Jabatan'] ?? 0);
        $potonganBPJS = floatval($data['Potongan_BPJS'] ?? 0);
        
        $totalPendapatan = $gajiPokok + $tunjangan;
        $totalPotongan = $potonganBPJS;
        $takeHomePay = $totalPendapatan - $totalPotongan;
        
        return [
            'Total_Pendapatan' => $totalPendapatan,
            'Total_Potongan' => $totalPotongan,
            'Take_Home_Pay' => $takeHomePay
        ];
    }
}


