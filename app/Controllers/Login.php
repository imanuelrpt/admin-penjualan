<?php

namespace App\Controllers;

use App\Models\UserModel;

class Login extends BaseController
{
    public function index()
    {
        return view('auth/login');
    }

    public function auth()
    {
        $session = session();
        $userModel = new UserModel();

        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        $user = $userModel->getUserByUsername($username);

        if ($user) {
            if (password_verify($password, $user['password'])) {
                $session->set([
                    'id' => $user['id'],
                    'username' => $user['username'],
                    'role' => $user['role'],
                    'logged_in' => true,
                ]);
                return redirect()->to('/dashboard');
            } else {
                return redirect()->back()->with('error', 'Password salah');
            }
        } else {
            return redirect()->back()->with('error', 'Username tidak ditemukan');
        }
    }

    public function register()
{
    return view('auth/register');
}

public function save()
{
    $userModel = new \App\Models\UserModel();

    $username = $this->request->getPost('username');
    $password = $this->request->getPost('password');
    $role = $this->request->getPost('role');

    // Validasi sederhana
    if (empty($username) || empty($password)) {
        return redirect()->back()->with('error', 'Username dan Password wajib diisi.');
    }

    // Cek jika username sudah ada
    if ($userModel->where('username', $username)->first()) {
        return redirect()->back()->with('error', 'Username sudah digunakan.');
    }

    $userModel->insert([
        'username' => $username,
        'password' => password_hash($password, PASSWORD_DEFAULT),
        'role'     => $role ?? 'admin',
    ]);

    return redirect()->to('/login')->with('success', 'Registrasi berhasil, silakan login.');
}

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login');
    }
}
