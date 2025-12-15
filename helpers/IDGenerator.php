<?php

/**
 * Helper untuk generate ID dari aplikasi (bukan dari database)
 * Menggunakan kombinasi prefix + timestamp + random
 */
class IDGenerator {
    
    /**
     * Generate unique ID untuk Karyawan
     * Format: KAR-[timestamp]-[random 4 digit]
     */
    public static function generateKaryawanID() {
        return self::generate('KAR');
    }
    
    /**
     * Generate unique ID untuk Cuti
     * Format: CUT-[timestamp]-[random 4 digit]
     */
    public static function generateCutiID() {
        return self::generate('CUT');
    }
    
    /**
     * Generate unique ID untuk User
     * Format: USR-[timestamp]-[random 4 digit]
     */
    public static function generateUserID() {
        return self::generate('USR');
    }
    
    /**
     * Generate unique ID untuk Departemen
     * Format: DEP-[timestamp]-[random 4 digit]
     */
    public static function generateDepartemenID() {
        return self::generate('DEP');
    }
    
    /**
     * Generate unique ID untuk Master Cuti
     * Format: MAS-[timestamp]-[random 4 digit]
     */
    public static function generateMasterCutiID() {
        return self::generate('MAS');
    }
    
    /**
     * Generate unique ID untuk Slip Gaji
     * Format: SLI-[timestamp]-[random 4 digit]
     */
    public static function generateSlipGajiID() {
        return self::generate('SLI');
    }
    
    /**
     * Generate unique ID generic
     * Format: [prefix]-[timestamp]-[random 4 digit]
     */
    private static function generate($prefix) {
        $timestamp = time();
        $random = str_pad(mt_rand(0, 9999), 4, '0', STR_PAD_LEFT);
        return $prefix . '-' . $timestamp . '-' . $random;
    }
    
    /**
     * Generate password random untuk user baru
     */
    public static function generatePassword($length = 12) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ!@#$%^&*';
        $password = '';
        for ($i = 0; $i < $length; $i++) {
            $password .= $characters[mt_rand(0, strlen($characters) - 1)];
        }
        return $password;
    }
}
