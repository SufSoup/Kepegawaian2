<?php

require_once __DIR__ . '/../../core/Model.php';

class Karyawan extends Model {
    protected $table = 'karyawan';
    protected $primaryKey = 'ID_Karyawan';
    
    public function getAllWithDepartment() {
        $db = Database::getInstance();
        $sql = "SELECT k.*, d.Jabatan as Nama_Departemen 
                FROM karyawan k 
                LEFT JOIN departemen d ON k.ID_Departemen = d.ID_Departemen 
                ORDER BY k.ID_Karyawan DESC";
        $stmt = $db->query($sql);
        return $stmt->fetchAll();
    }
    
    public function findWithDepartment($id) {
        $db = Database::getInstance();
        $sql = "SELECT k.*, d.Jabatan as Nama_Departemen, u.Role 
                FROM karyawan k 
                LEFT JOIN departemen d ON k.ID_Departemen = d.ID_Departemen 
                LEFT JOIN user u ON k.ID_Karyawan = u.ID_Karyawan
                WHERE k.ID_Karyawan = :id";
        $stmt = $db->query($sql, ['id' => $id]);
        return $stmt->fetch();
    }
    
    public function getByEmail($email) {
        return $this->whereFirst('Email_Kantor', $email);
    }
    
    public function getByDepartemen($departemenId) {
        return $this->where('ID_Departemen', $departemenId);
    }
}


