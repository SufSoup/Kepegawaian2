<?php

require_once __DIR__ . '/../../core/Controller.php';
require_once __DIR__ . '/../../helpers/Auth.php';

class AuthController extends Controller {
    
    public function login() {
        if (Auth::check()) {
            $user = Auth::user();
            $this->redirect('/Kepegawaian/dashboard');
        }
        
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $this->input('username');
            $password = $this->input('password');
            
            if (Auth::login($username, $password)) {
                $user = Auth::user();
                $this->redirect('/Kepegawaian/dashboard');
            } else {
                $error = 'Username atau password salah';
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
        
        $this->view('dashboard/hrd_dashboard', [
            'user' => Auth::user()
        ]);
    }
    
    public function supervisorDashboard() {
        Auth::requireRole('Supervisor');
        
        $this->view('dashboard/supervisor_dashboard', [
            'user' => Auth::user()
        ]);
    }
    
    public function karyawanDashboard() {
        Auth::requireRole('Karyawan');
        
        $this->view('dashboard/karyawan_dashboard', [
            'user' => Auth::user()
        ]);
    }
}


