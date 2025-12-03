<?php

require_once __DIR__ . '/../../core/Controller.php';
require_once __DIR__ . '/../../helpers/Auth.php';
require_once __DIR__ . '/../models/karyawan.php';
require_once __DIR__ . '/../models/department.php';
require_once __DIR__ . '/../models/user.php';

class KaryawanController extends Controller {
    
    public function index() {
        Auth::requireAuth();
        
        $karyawanModel = new Karyawan();
        $karyawans = $karyawanModel->getAllWithDepartment();
        
        $user = Auth::user();
        
        $this->view('karyawan/index', [
            'karyawans' => $karyawans,
            'user' => $user
        ]);
    }
    
    public function create() {
        Auth::requireRole('HRD');
        
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [
                'ID_Departemen' => $this->input('ID_Departemen'),
                'Nama_Lengkap' => $this->input('Nama_Lengkap'),
                'Tgl_Lahir' => $this->input('Tgl_Lahir'),
                'Tgl_Masuk' => $this->input('Tgl_Masuk'),
                'Email_Kantor' => $this->input('Email_Kantor'),
                'Alamat' => $this->input('Alamat'),
                'Status_Kerja' => $this->input('Status_Kerja', 'Aktif')
            ];
            
            $karyawanModel = new Karyawan();
            $karyawanId = $karyawanModel->create($data);
            
            // Update jumlah karyawan di departemen
            $departmentModel = new Department();
            $departmentModel->updateJumlahKaryawan($data['ID_Departemen']);
            
            $this->redirect('/Kepegawaian/karyawan');
        }
        
        $departmentModel = new Department();
        $departments = $departmentModel->all();
        
        $this->view('karyawan/create', [
            'departments' => $departments,
            'user' => Auth::user()
        ]);
    }
    
    public function edit($id) {
        Auth::requireAuth();
        
        $karyawanModel = new Karyawan();
        $karyawan = $karyawanModel->findWithDepartment($id);
        
        if (!$karyawan) {
            $this->redirect('/Kepegawaian/karyawan');
        }
        
        $user = Auth::user();
        
        // Supervisor dan Karyawan hanya bisa edit data mereka sendiri atau Supervisor bisa edit semua
        if ($user['role'] === 'Karyawan' && $user['karyawan_id'] != $id) {
            $this->redirect('/Kepegawaian/karyawan');
        }
        
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [
                'Nama_Lengkap' => $this->input('Nama_Lengkap'),
                'Tgl_Lahir' => $this->input('Tgl_Lahir'),
                'Tgl_Masuk' => $this->input('Tgl_Masuk'),
                'Email_Kantor' => $this->input('Email_Kantor'),
                'Alamat' => $this->input('Alamat')
            ];
            
            // HRD bisa edit semua termasuk departemen dan status
            if ($user['role'] === 'HRD') {
                $data['ID_Departemen'] = $this->input('ID_Departemen');
                $data['Status_Kerja'] = $this->input('Status_Kerja', 'Aktif');
            }
            
            $karyawanModel->update($id, $data);
            
            // Update jumlah karyawan jika departemen berubah
            if ($user['role'] === 'HRD' && $karyawan['ID_Departemen'] != $data['ID_Departemen']) {
                $departmentModel = new Department();
                $departmentModel->updateJumlahKaryawan($karyawan['ID_Departemen']);
                $departmentModel->updateJumlahKaryawan($data['ID_Departemen']);
            }
            
            $this->redirect('/Kepegawaian/karyawan');
        }
        
        $departmentModel = new Department();
        $departments = $departmentModel->all();
        
        $this->view('karyawan/edit', [
            'karyawan' => $karyawan,
            'departments' => $departments,
            'user' => $user
        ]);
    }
    
    public function delete($id) {
        Auth::requireRole('HRD');
        
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $karyawanModel = new Karyawan();
            $karyawan = $karyawanModel->find($id);
            
            if ($karyawan) {
                $departemenId = $karyawan['ID_Departemen'];
                $karyawanModel->delete($id);
                
                // Update jumlah karyawan
                $departmentModel = new Department();
                $departmentModel->updateJumlahKaryawan($departemenId);
            }
            
            $this->redirect('/Kepegawaian/karyawan');
        }
        
        $karyawanModel = new Karyawan();
        $karyawan = $karyawanModel->findWithDepartment($id);
        
        $this->view('karyawan/delete', [
            'karyawan' => $karyawan,
            'user' => Auth::user()
        ]);
    }
    
    public function show($id) {
        Auth::requireAuth();
        
        $karyawanModel = new Karyawan();
        $karyawan = $karyawanModel->findWithDepartment($id);
        
        if (!$karyawan) {
            $this->redirect('/Kepegawaian/karyawan');
        }
        
        $this->view('karyawan/show', [
            'karyawan' => $karyawan,
            'user' => Auth::user()
        ]);
    }
}


