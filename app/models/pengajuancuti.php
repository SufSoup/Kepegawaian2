<?php

require_once __DIR__ . '/../../core/Model.php';

class PengajuanCuti extends Model {
    protected $table = 'pengajuan_cuti';
    protected $primaryKey = 'ID_Cuti';
    
    public function getAllWithDetails() {
        $db = Database::getInstance();
        $sql = "SELECT pc.*, 
                k.Nama_Lengkap, k.Email_Kantor,
                mc.Nama_Cuti, mc.Tipe_Cuti,
                d.Jabatan as Nama_Departemen
                FROM pengajuan_cuti pc
                LEFT JOIN karyawan k ON pc.ID_Karyawan = k.ID_Karyawan
                LEFT JOIN master_cuti mc ON pc.ID_Master_Cuti = mc.ID_Master_Cuti
                LEFT JOIN departemen d ON k.ID_Departemen = d.ID_Departemen
                ORDER BY pc.Tgl_Pengajuan DESC, pc.ID_Cuti DESC";
        $stmt = $db->query($sql);
        return $stmt->fetchAll();
    }
    
    public function getByKaryawan($karyawanId) {
        $db = Database::getInstance();
        $sql = "SELECT pc.*, mc.Nama_Cuti, mc.Tipe_Cuti
                FROM pengajuan_cuti pc
                LEFT JOIN master_cuti mc ON pc.ID_Master_Cuti = mc.ID_Master_Cuti
                WHERE pc.ID_Karyawan = :karyawan_id
                ORDER BY pc.Tgl_Pengajuan DESC";
        $stmt = $db->query($sql, ['karyawan_id' => $karyawanId]);
        return $stmt->fetchAll();
    }
    
    public function getPending() {
        $db = Database::getInstance();
        $sql = "SELECT pc.*, 
                k.Nama_Lengkap, k.Email_Kantor,
                mc.Nama_Cuti, mc.Tipe_Cuti,
                d.Jabatan as Nama_Departemen
                FROM pengajuan_cuti pc
                LEFT JOIN karyawan k ON pc.ID_Karyawan = k.ID_Karyawan
                LEFT JOIN master_cuti mc ON pc.ID_Master_Cuti = mc.ID_Master_Cuti
                LEFT JOIN departemen d ON k.ID_Departemen = d.ID_Departemen
                WHERE pc.Status_Pengajuan = 'Pending'
                ORDER BY pc.Tgl_Pengajuan ASC";
        $stmt = $db->query($sql);
        return $stmt->fetchAll();
    }
    
    public function findWithDetails($id) {
        $db = Database::getInstance();
        $sql = "SELECT pc.*, 
                k.Nama_Lengkap, k.Email_Kantor,
                mc.Nama_Cuti, mc.Tipe_Cuti,
                d.Jabatan as Nama_Departemen
                FROM pengajuan_cuti pc
                LEFT JOIN karyawan k ON pc.ID_Karyawan = k.ID_Karyawan
                LEFT JOIN master_cuti mc ON pc.ID_Master_Cuti = mc.ID_Master_Cuti
                LEFT JOIN departemen d ON k.ID_Departemen = d.ID_Departemen
                WHERE pc.ID_Cuti = :id";
        $stmt = $db->query($sql, ['id' => $id]);
        return $stmt->fetch();
    }
}


