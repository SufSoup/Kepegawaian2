<?php
/**
 * ========================================
 * LIBUR NASIONAL MODEL
 * ========================================
 * Model untuk mengelola data hari libur nasional
 * Digunakan untuk validasi tanggal cuti
 * 
 * Tabel: libur_nasional
 * Primary Key: ID_Libur
 */

require_once __DIR__ . '/../../core/Model.php';

class LiburNasional extends Model {
    protected $table = 'libur_nasional';
    protected $primaryKey = 'ID_Libur';
    
    /**
     * Get all libur nasional, ordered by tanggal
     * 
     * @return array Array of libur nasional
     */
    public function getAllOrdered() {
        $db = Database::getInstance();
        $sql = "SELECT * FROM libur_nasional ORDER BY Tanggal_Libur ASC";
        $stmt = $db->query($sql);
        return $stmt->fetchAll();
    }
    
    /**
     * Get libur nasional by year
     * 
     * @param int $year Year
     * @return array Array of libur nasional in that year
     */
    public function getByYear($year) {
        $db = Database::getInstance();
        $sql = "SELECT * FROM libur_nasional 
                WHERE YEAR(Tanggal_Libur) = :year 
                ORDER BY Tanggal_Libur ASC";
        $stmt = $db->query($sql, ['year' => $year]);
        return $stmt->fetchAll();
    }
    
    /**
     * Get upcoming libur nasional (dari hari ini)
     * 
     * @param int $limit Jumlah data yang ditampilkan
     * @return array Array of upcoming libur nasional
     */
    public function getUpcoming($limit = 5) {
        $db = Database::getInstance();
        $today = date('Y-m-d');
        
        $sql = "SELECT * FROM libur_nasional 
                WHERE Tanggal_Libur >= :today 
                ORDER BY Tanggal_Libur ASC 
                LIMIT :limit";
        
        $stmt = $db->query($sql, ['today' => $today, 'limit' => $limit]);
        return $stmt->fetchAll();
    }
    
    /**
     * Check if a date is libur nasional
     * 
     * @param string $date Date in Y-m-d format
     * @return bool True if libur, false otherwise
     */
    public function isLibur($date) {
        $db = Database::getInstance();
        $sql = "SELECT COUNT(*) as count FROM libur_nasional 
                WHERE Tanggal_Libur = :date";
        $stmt = $db->query($sql, ['date' => $date]);
        $result = $stmt->fetch();
        
        return $result['count'] > 0;
    }
    
    /**
     * Check if date range contains libur nasional
     * 
     * @param string $startDate Start date (Y-m-d)
     * @param string $endDate End date (Y-m-d)
     * @return array Array of libur dates in range
     */
    public function getLiburInRange($startDate, $endDate) {
        $db = Database::getInstance();
        $sql = "SELECT * FROM libur_nasional 
                WHERE Tanggal_Libur BETWEEN :start AND :end 
                ORDER BY Tanggal_Libur ASC";
        
        $stmt = $db->query($sql, [
            'start' => $startDate,
            'end' => $endDate
        ]);
        
        return $stmt->fetchAll();
    }
    
    /**
     * Count hari kerja (excluding weekends and libur nasional)
     * 
     * @param string $startDate Start date (Y-m-d)
     * @param string $endDate End date (Y-m-d)
     * @return int Number of working days
     */
    public function countHariKerja($startDate, $endDate) {
        $start = new DateTime($startDate);
        $end = new DateTime($endDate);
        $end->modify('+1 day'); // Include end date
        
        $interval = new DateInterval('P1D');
        $period = new DatePeriod($start, $interval, $end);
        
        $hariKerja = 0;
        $liburDates = $this->getLiburInRange($startDate, $endDate);
        $liburArray = array_column($liburDates, 'Tanggal_Libur');
        
        foreach ($period as $date) {
            $dayOfWeek = $date->format('N'); // 1 (Monday) to 7 (Sunday)
            $dateString = $date->format('Y-m-d');
            
            // Skip weekends (Saturday = 6, Sunday = 7)
            if ($dayOfWeek >= 6) {
                continue;
            }
            
            // Skip libur nasional
            if (in_array($dateString, $liburArray)) {
                continue;
            }
            
            $hariKerja++;
        }
        
        return $hariKerja;
    }
    
    /**
     * Check if libur already exists for a date
     * 
     * @param string $date Date (Y-m-d)
     * @return bool True if exists, false otherwise
     */
    public function exists($date) {
        return $this->whereFirst('Tanggal_Libur', $date) !== false;
    }
    
    /**
     * Bulk insert libur nasional for a year
     * 
     * @param array $liburData Array of [nama, tanggal, keterangan]
     * @return bool Success status
     */
    public function bulkInsert($liburData) {
        $db = Database::getInstance();
        
        try {
            foreach ($liburData as $libur) {
                // Check if already exists
                if (!$this->exists($libur['tanggal'])) {
                    $this->create([
                        'Nama_Libur' => $libur['nama'],
                        'Tanggal_Libur' => $libur['tanggal'],
                        'Keterangan' => $libur['keterangan'] ?? null
                    ]);
                }
            }
            return true;
        } catch (Exception $e) {
            error_log("Bulk insert libur error: " . $e->getMessage());
            return false;
        }
    }
}