<?php

require_once __DIR__ . '/../../core/Model.php';

class MasterCuti extends Model {
    protected $table = 'master_cuti';
    protected $primaryKey = 'ID_Master_Cuti';
    
    public function getAllActive() {
        $db = Database::getInstance();
        $sql = "SELECT * FROM master_cuti ORDER BY Nama_Cuti";
        $stmt = $db->query($sql);
        return $stmt->fetchAll();
    }
}


