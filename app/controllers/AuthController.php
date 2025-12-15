<?php

require_once __DIR__ . '/../../core/Controller.php';
require_once __DIR__ . '/../../helpers/Auth.php';
require_once __DIR__ . '/../models/karyawan.php';
require_once __DIR__ . '/../models/department.php';
require_once __DIR__ . '/../models/pengajuancuti.php';

class AuthController extends Controller {
    
    public function login() {
        if (Auth::check()) {
            $user = Auth::user();
            $this->redirect('/Kepegawaian/dashboard');
        }
        
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = $this->input('username');
            $password = $this->input('password');
            
            if (Auth::login($email, $password)) {
                $user = Auth::user();
                $this->redirect('/Kepegawaian/dashboard');
            } else {
                $error = 'Email atau password salah';
                $this->view('auth/login', ['error' => $error]);
                return;
            }
        }
        
        $this->view('auth/login');
    }
    
    public function logout() {
        Auth::logout();
        $this->redirect('/Kepegawaian/login');
    }
    
    public function dashboard() {
        Auth::requireAuth();
        
        $user = Auth::user();
        
        switch ($user['role']) {
            case 'HRD':
                $this->redirect('/Kepegawaian/dashboard/hrd');
                break;
            case 'Supervisor':
                $this->redirect('/Kepegawaian/dashboard/supervisor');
                break;
            case 'Karyawan':
                $this->redirect('/Kepegawaian/dashboard/karyawan');
                break;
            default:
                Auth::logout();
                $this->redirect('/Kepegawaian/login');
        }
    }
    
    public function hrdDashboard() {
        Auth::requireRole('HRD');
        
        // Ambil statistik untuk dashboard
        $karyawanModel = new Karyawan();
        $departmentModel = new Department();
        $pengajuanCutiModel = new PengajuanCuti();
        
        $stats = [
            'total_karyawan' => count($karyawanModel->all()),
            'total_departemen' => count($departmentModel->all()),
            'pengajuan_pending' => count($pengajuanCutiModel->getPending()),
            'pengajuan_disetujui' => $this->countByStatus($pengajuanCutiModel, 'Disetujui'),
            'pengajuan_ditolak' => $this->countByStatus($pengajuanCutiModel, 'Ditolak')
        ];
        
        $this->view('dashboard/hrd_dashboard', [
            'user' => Auth::user(),
            'stats' => $stats
        ]);
    }
    
    public function supervisorDashboard() {
        Auth::requireRole('Supervisor');
        
        // Ambil statistik untuk dashboard
        $pengajuanCutiModel = new PengajuanCuti();
        
        $stats = [
            'pengajuan_pending' => count($pengajuanCutiModel->getPending()),
            'pengajuan_disetujui' => $this->countByStatus($pengajuanCutiModel, 'Disetujui'),
            'pengajuan_ditolak' => $this->countByStatus($pengajuanCutiModel, 'Ditolak')
        ];
        
        $this->view('dashboard/supervisor_dashboard', [
            'user' => Auth::user(),
            'stats' => $stats
        ]);
    }
    
    public function karyawanDashboard() {
        Auth::requireRole('Karyawan');
        
        $user = Auth::user();
        
        // Ambil data biodata karyawan
        $karyawanModel = new Karyawan();
        $biodatakaryawan = $karyawanModel->findWithDepartment($user['karyawan_id']);
        
        // Ambil statistik cuti
        $pengajuanCutiModel = new PengajuanCuti();
        $pengajuans = $pengajuanCutiModel->getByKaryawan($user['karyawan_id']);
        
        $stats = [
            'total_cuti_pending' => $this->countCutiByStatus($pengajuans, 'Pending'),
            'total_cuti_disetujui' => $this->countCutiByStatus($pengajuans, 'Disetujui'),
            'total_cuti_ditolak' => $this->countCutiByStatus($pengajuans, 'Ditolak'),
            'total_hari_cuti_tahun_ini' => $pengajuanCutiModel->getTotalHariCutiTahunIni($user['karyawan_id'])
        ];
        
        $this->view('dashboard/karyawan_dashboard', [
            'user' => $user,
            'biodata' => $biodatakaryawan,
            'stats' => $stats
        ]);
    }
    
    private function countByStatus($model, $status) {
        $all = $model->getAllWithDetails();
        return count(array_filter($all, function($item) use ($status) {
            return $item['Status_Pengajuan'] === $status;
        }));
    }
    
    private function countCutiByStatus($pengajuans, $status) {
        return count(array_filter($pengajuans, function($item) use ($status) {
            return $item['Status_Pengajuan'] === $status;
        }));
    }
}


