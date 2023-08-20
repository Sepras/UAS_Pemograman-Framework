<?php

namespace App\Controllers;

use App\Models\Auth_Model;
use CodeIgniter\Controller;

class Auth extends Controller
{
    public function index()
    {
        return view('login/index');
    }

    public function login()
    {
        $session = session();

        // Load the database model
        $model = new Auth_Model();

        // Koneksi ke database (tidak perlu dilakukan jika model sudah melakukan koneksi)
        $db = \Config\Database::connect();

        $username = $this->request->getVar('username');
        $password = $this->request->getVar('password');

        // Gunakan model untuk mendapatkan informasi pengguna
        $user = $model->getUserByUsername($username);

        if ($user) {
            if (password_verify($password, $user['password'])) {
                $session->set([
                    'id' => $user['id'],
                    'username' => $user['username'],
                    'isLoggedIn' => true,
                ]);
                return redirect()->to('/user/dashboard');
            } else {
                return redirect()->back()->withInput()->with('error', 'Invalid password');
            }
        } else {
            return redirect()->back()->withInput()->with('error', 'Username not found');
        }
    }

    public function logout()
    {
        $session = session();
        $session->destroy();
        return redirect()->to('/');
    }
}