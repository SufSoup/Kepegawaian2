<?php

require_once __DIR__ . '/../../core/Controller.php';
require_once __DIR__ . '/../../helpers/Auth.php';
require_once __DIR__ . '/../../helpers/IDGenerator.php';
require_once __DIR__ . '/../models/karyawan.php';
require_once __DIR__ . '/../models/department.php';
require_once __DIR__ . '/../models/user.php';

class KaryawanController extends Controller {
    
    public function index() {
        Auth::requireAuth();
        
        $user = Auth::user();
        $karyawanModel = new Karyawan();
        
        // Jika Karyawan (bukan HRD/Supervisor), hanya tampilkan data diri sendiri
        if ($user['role'] === 'Karyawan') {
            $karyawans = [$karyawanModel->findWithDepartment($user['karyawan_id'])];
        } else {
            // HRD dan Supervisor bisa lihat semua
            $karyawans = $karyawanModel->getAllWithDepartment();
        }
        
        // Get sort parameter
        $sort = $this->input('sort', 'default');
        
        if ($sort === 'nama_asc') {
            usort($karyawans, function($a, $b) {
                return strcmp($a['Nama_Lengkap'], $b['Nama_Lengkap']);
            });
        } elseif ($sort === 'nama_desc') {
            usort($karyawans, function($a, $b) {
                return strcmp($b['Nama_Lengkap'], $a['Nama_Lengkap']);
            });
        } elseif ($sort === 'departemen') {
            usort($karyawans, function($a, $b) {
                return strcmp($a['Nama_Departemen'] ?? '', $b['Nama_Departemen'] ?? '');
            });
        } elseif ($sort === 'tgl_masuk_terlama') {
            usort($karyawans, function($a, $b) {
                return strtotime($a['Tgl_Masuk']) - strtotime($b['Tgl_Masuk']);
            });
        } elseif ($sort === 'tgl_masuk_terbaru') {
            usort($karyawans, function($a, $b) {
                return strtotime($b['Tgl_Masuk']) - strtotime($a['Tgl_Masuk']);
            });
        }
        
        $this->view('karyawan/index', [
            'karyawans' => $karyawans,
            'user' => $user,
            'sort' => $sort
        ]);
    }
    
    public function create() {
        Auth::requireRole('HRD');
        
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $namaLengkap = $this->input('Nama_Lengkap');
            $role = $this->input('role', 'Karyawan');
            
            // Generate email berdasarkan role
            $firstName = strtolower(explode(' ', $namaLengkap)[0]);
            $emailBase = $firstName;
            
            switch ($role) {
                case 'Supervisor':
                    $emailKantor = $emailBase . '@supervisor.com';
                    break;
                case 'HRD':
                    $emailKantor = $emailBase . '@hrd.com';
                    break;
                default:
                    $emailKantor = $emailBase . '@karyawan.com';
                    $role = 'Karyawan';
                    break;
            }
            
            // Cek apakah email sudah ada
            $karyawanModel = new Karyawan();
            $existing = $karyawanModel->getByEmail($emailKantor);
            if ($existing) {
                // Tambahkan suffix jika email sudah ada
                $emailKantor = $emailBase . time() . '@' . (
                    $role === 'Supervisor' ? 'supervisor.com' :
                    ($role === 'HRD' ? 'hrd.com' : 'karyawan.com')
                );
            }
            
            $data = [
                'ID_Departemen' => $this->input('ID_Departemen'),
                'Nama_Lengkap' => $namaLengkap,
                'Tgl_Lahir' => $this->input('Tgl_Lahir'),
                'Tgl_Masuk' => $this->input('Tgl_Masuk'),
                'Email_Kantor' => $emailKantor,
                'Alamat' => $this->input('Alamat'),
                'Status_Kerja' => $this->input('Status_Kerja', 'Aktif')
            ];
            
            $karyawanModel = new Karyawan();
            $karyawanId = $karyawanModel->create($data);
            
            // Buat user login secara otomatis
            $userModel = new User();
            $password = 'password123'; // Default password untuk karyawan baru
            $userData = [
                'ID_Karyawan' => $karyawanId,
                'Username' => $emailKantor,
                'Password' => password_hash($password, PASSWORD_BCRYPT),
                'Role' => $role,
                'Status_Login' => 'Aktif'
            ];
            
            $userModel->create($userData);
            
            // Update jumlah karyawan di departemen
            $departmentModel = new Department();
            $departmentModel->updateJumlahKaryawan($data['ID_Departemen']);
            
            // Simpan info password untuk ditampilkan
            $_SESSION['new_user_password'] = $password;
            $_SESSION['new_user_email'] = $emailKantor;
            
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
                'Alamat' => $this->input('Alamat')
            ];
            
            // Hanya update Email_Kantor jika ada input (jangan set ke kosong)
            $emailKantor = $this->input('Email_Kantor');
            if (!empty($emailKantor)) {
                $data['Email_Kantor'] = $emailKantor;
            }
            
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
                
                // Hapus user juga
                $userModel = new User();
                $userData = $userModel->getByKaryawanId($id);
                if ($userData) {
                    $userModel->delete($userData['ID_User']);
                }
                
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


