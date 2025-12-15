<?php

require_once __DIR__ . '/../../core/Controller.php';
require_once __DIR__ . '/../../helpers/Auth.php';
require_once __DIR__ . '/../models/pengajuancuti.php';
require_once __DIR__ . '/../models/mastercuti.php';
require_once __DIR__ . '/../models/karyawan.php';

class PengajuanCutiController extends Controller {
    
    public function index() {
        Auth::requireAuth();
        $user = Auth::user();
        
        $pengajuanCutiModel = new PengajuanCuti();
        
        if ($user['role'] === 'Karyawan') {
            $pengajuans = $pengajuanCutiModel->getByKaryawan($user['karyawan_id']);
        } elseif ($user['role'] === 'Supervisor') {
            $pengajuans = $pengajuanCutiModel->getPending();
        } else {
            // HRD melihat semua
            $pengajuans = $pengajuanCutiModel->getAllWithDetails();
        }
        
        $this->view('pengajuancuti/index', [
            'pengajuans' => $pengajuans,
            'user' => $user
        ]);
    }
    
    public function create() {
        Auth::requireAuth();
        $user = Auth::user();
        
        // HRD dan Karyawan bisa membuat pengajuan
        if ($user['role'] !== 'HRD' && $user['role'] !== 'Karyawan') {
            $this->redirect('/Kepegawaian/pengajuancuti');
        }
        
<<<<<<< HEAD
=======
        $errorMessage = '';
        
>>>>>>> 29c4acf (initial commit project kepegawaian)
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $karyawanId = $user['role'] === 'HRD' 
                ? $this->input('ID_Karyawan') 
                : $user['karyawan_id'];
            
            $tglAwal = $this->input('Tgl_Mulai');
            $tglAkhir = $this->input('Tgl_Selesai');
            
            // Validate dates are not empty
            if (!$tglAwal || !$tglAkhir) {
                $this->redirect('/Kepegawaian/pengajuancuti/create');
                return;
            }
            
            $tglAwalDateTime = new DateTime($tglAwal);
            $tglAkhirDateTime = new DateTime($tglAkhir);
            $jumlahHari = $tglAwalDateTime->diff($tglAkhirDateTime)->days + 1;
            
<<<<<<< HEAD
=======
            // Check jatah cuti tahunan (maksimal 30 hari)
            $pengajuanCutiModel = new PengajuanCuti();
            if (!$pengajuanCutiModel->checkCutiJatah($karyawanId, $jumlahHari)) {
                $totalCutiTahunIni = $pengajuanCutiModel->getTotalHariCutiTahunIni($karyawanId);
                $sisaCuti = 30 - $totalCutiTahunIni;
                
                // Auto reject jika melebihi jatah
                $data = [
                    'ID_Karyawan' => $karyawanId,
                    'ID_Master_Cuti' => $this->input('ID_Master_Cuti'),
                    'Tgl_Awal' => $tglAwal,
                    'Tgl_Akhir' => $tglAkhir,
                    'Jumlah_Hari' => $jumlahHari,
                    'Status_Pengajuan' => 'Ditolak',
                    'Keterangan_Penolakan' => "Melebihi jatah cuti tahunan. Sisa cuti: $sisaCuti hari",
                    'Tgl_Persetujuan' => date('Y-m-d H:i:s'),
                    'Alasan' => $this->input('Keterangan')
                ];
                $pengajuanCutiModel->create($data);
                $this->redirect('/Kepegawaian/pengajuancuti');
                return;
            }
            
>>>>>>> 29c4acf (initial commit project kepegawaian)
            $data = [
                'ID_Karyawan' => $karyawanId,
                'ID_Master_Cuti' => $this->input('ID_Master_Cuti'),
                'Tgl_Awal' => $tglAwal,
                'Tgl_Akhir' => $tglAkhir,
                'Jumlah_Hari' => $jumlahHari,
                'Status_Pengajuan' => $user['role'] === 'HRD' ? 'Disetujui' : 'Pending',
                'Tgl_Persetujuan' => $user['role'] === 'HRD' ? date('Y-m-d H:i:s') : null,
                'Alasan' => $this->input('Keterangan')
            ];
            
<<<<<<< HEAD
            $pengajuanCutiModel = new PengajuanCuti();
=======
>>>>>>> 29c4acf (initial commit project kepegawaian)
            $pengajuanCutiModel->create($data);
            
            $this->redirect('/Kepegawaian/pengajuancuti');
        }
        
        $masterCutiModel = new MasterCuti();
        $masterCutis = $masterCutiModel->getAllActive();
        
        $karyawanModel = new Karyawan();
        $karyawans = $user['role'] === 'HRD' ? $karyawanModel->getAllWithDepartment() : [];
        
<<<<<<< HEAD
        $this->view('pengajuancuti/create', [
            'masterCutis' => $masterCutis,
            'karyawans' => $karyawans,
            'user' => $user
=======
        // Get info cuti karyawan untuk ditampilkan
        $pengajuanCutiModel = new PengajuanCuti();
        $cutiInfo = null;
        if ($user['role'] === 'Karyawan') {
            $totalCutiTahunIni = $pengajuanCutiModel->getTotalHariCutiTahunIni($user['karyawan_id']);
            $cutiInfo = [
                'total_disetujui' => $totalCutiTahunIni,
                'sisa_jatah' => 30 - $totalCutiTahunIni,
                'maksimal' => 30
            ];
        }
        
        $this->view('pengajuancuti/create', [
            'masterCutis' => $masterCutis,
            'karyawans' => $karyawans,
            'user' => $user,
            'cutiInfo' => $cutiInfo,
            'errorMessage' => $errorMessage
>>>>>>> 29c4acf (initial commit project kepegawaian)
        ]);
    }
    
    public function edit($id) {
        Auth::requireAuth();
        $user = Auth::user();
        
        $pengajuanCutiModel = new PengajuanCuti();
        $pengajuan = $pengajuanCutiModel->findWithDetails($id);
        
        if (!$pengajuan) {
            $this->redirect('/Kepegawaian/pengajuancuti');
        }
        
        // Karyawan hanya bisa edit pengajuan mereka sendiri yang masih Pending
        if ($user['role'] === 'Karyawan') {
            if ($pengajuan['ID_Karyawan'] != $user['karyawan_id'] || $pengajuan['Status_Pengajuan'] !== 'Pending') {
                $this->redirect('/Kepegawaian/pengajuancuti');
            }
        } elseif ($user['role'] === 'Supervisor') {
            // Supervisor tidak bisa edit
            $this->redirect('/Kepegawaian/pengajuancuti');
        }
        
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $tglAwal = $this->input('Tgl_Mulai');
            $tglAkhir = $this->input('Tgl_Selesai');
            
            // Validate dates are not empty
            if (!$tglAwal || !$tglAkhir) {
                $this->redirect('/Kepegawaian/pengajuancuti/edit/' . $id);
                return;
            }
            
            $tglAwalDateTime = new DateTime($tglAwal);
            $tglAkhirDateTime = new DateTime($tglAkhir);
            $jumlahHari = $tglAwalDateTime->diff($tglAkhirDateTime)->days + 1;
            
            $data = [
                'ID_Master_Cuti' => $this->input('ID_Master_Cuti'),
                'Tgl_Awal' => $tglAwal,
                'Tgl_Akhir' => $tglAkhir,
                'Jumlah_Hari' => $jumlahHari,
                'Alasan' => $this->input('Keterangan')
            ];
            
            // HRD bisa edit semua
            if ($user['role'] === 'HRD') {
                $data['ID_Karyawan'] = $this->input('ID_Karyawan');
                $data['Status_Pengajuan'] = $this->input('Status_Pengajuan', 'Pending');
                if ($data['Status_Pengajuan'] !== 'Pending') {
                    $data['Tgl_Persetujuan'] = date('Y-m-d H:i:s');
                }
            }
            
            $pengajuanCutiModel->update($id, $data);
            
            $this->redirect('/Kepegawaian/pengajuancuti');
        }
        
        $masterCutiModel = new MasterCuti();
        $masterCutis = $masterCutiModel->getAllActive();
        
        $karyawanModel = new Karyawan();
        $karyawans = $user['role'] === 'HRD' ? $karyawanModel->getAllWithDepartment() : [];
        
        $this->view('pengajuancuti/edit', [
            'pengajuan' => $pengajuan,
            'masterCutis' => $masterCutis,
            'karyawans' => $karyawans,
            'user' => $user
        ]);
    }
    
    public function approve($id) {
        Auth::requireRole(['HRD', 'Supervisor']);
        
        $pengajuanCutiModel = new PengajuanCuti();
        $pengajuan = $pengajuanCutiModel->find($id);
        
        if ($pengajuan) {
            $data = [
                'Status_Pengajuan' => 'Disetujui',
                'Tgl_Persetujuan' => date('Y-m-d H:i:s'),
                'Approved_By' => Auth::user()['karyawan_id']
            ];
            
            $pengajuanCutiModel->update($id, $data);
        }
        
        $this->redirect('/Kepegawaian/pengajuancuti');
    }
    
    public function reject($id) {
        Auth::requireRole(['HRD', 'Supervisor']);
        
        $pengajuanCutiModel = new PengajuanCuti();
        $pengajuan = $pengajuanCutiModel->find($id);
        
        if ($pengajuan) {
            $data = [
                'Status_Pengajuan' => 'Ditolak',
                'Tgl_Persetujuan' => date('Y-m-d H:i:s'),
                'Approved_By' => Auth::user()['karyawan_id']
            ];
            
            $pengajuanCutiModel->update($id, $data);
        }
        
        $this->redirect('/Kepegawaian/pengajuancuti');
    }
    
    public function delete($id) {
        Auth::requireRole('HRD');
        
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $pengajuanCutiModel = new PengajuanCuti();
            $pengajuanCutiModel->delete($id);
            
            $this->redirect('/Kepegawaian/pengajuancuti');
        }
        
        $pengajuanCutiModel = new PengajuanCuti();
        $pengajuan = $pengajuanCutiModel->findWithDetails($id);
        
        $this->view('pengajuancuti/delete', [
            'pengajuan' => $pengajuan,
            'user' => Auth::user()
        ]);
    }
<<<<<<< HEAD
=======
    
    public function history() {
        Auth::requireRole('Supervisor');
        
        // Get history pengajuan cuti yang sudah disetujui atau ditolak
        $pengajuanCutiModel = new PengajuanCuti();
        $db = Database::getInstance();
        
        $sql = "SELECT pc.*, 
                k.Nama_Lengkap as Pengaju, 
                ka.Nama_Lengkap as Penyetuju,
                mc.Nama_Cuti, 
                d.Jabatan as Nama_Departemen
                FROM pengajuan_cuti pc
                LEFT JOIN karyawan k ON pc.ID_Karyawan = k.ID_Karyawan
                LEFT JOIN karyawan ka ON pc.Approved_By = ka.ID_Karyawan
                LEFT JOIN master_cuti mc ON pc.ID_Master_Cuti = mc.ID_Master_Cuti
                LEFT JOIN departemen d ON k.ID_Departemen = d.ID_Departemen
                WHERE pc.Status_Pengajuan IN ('Disetujui', 'Ditolak')
                ORDER BY pc.Tgl_Persetujuan DESC";
        
        $stmt = $db->query($sql);
        $histories = $stmt->fetchAll();
        
        $this->view('pengajuancuti/history', [
            'histories' => $histories,
            'user' => Auth::user()
        ]);
    }
>>>>>>> 29c4acf (initial commit project kepegawaian)
}

