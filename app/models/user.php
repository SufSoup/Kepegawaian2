<?php

require_once __DIR__ . '/../../core/Model.php';

class User extends Model {
    protected $table = 'user';
    protected $primaryKey = 'ID_User';
    
    public function findByUsername($username) {
        return $this->whereFirst('Username', $username);
    }
    
    public function getByKaryawanId($karyawanId) {
        return $this->whereFirst('ID_Karyawan', $karyawanId);
    }
}


