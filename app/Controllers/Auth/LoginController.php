<?php

namespace App\Controllers\Auth;

use App\Controllers\BaseController;
use App\Models\Akun\User;

class LoginController extends BaseController
{
    protected $session;
    protected $model;

    public function __construct()
    {
        $this->session = session();    
        $this->model = new User();
    }

    public function index()
    {
        return view("autentikasi/login");
    }

    public function proses_login()
    {
        $username = $this->request->getVar("username");
        $password = $this->request->getVar("password");
        $data = $this->model->where("username", $username)->first();

        if ($data) {
            $pass = $data["password"];
            $verifikasi_password = password_verify($password, $pass);
            if ($verifikasi_password) {
                $data_session = [
                    'username' => $data["username"],
                    'logged_in' => TRUE
                ];
                $this->session->set($data_session);
                return redirect()->to("/dashboard");
            } else {
                $this->session->setFlashdata('msg', 'Password Salah');
                return redirect()->to("/login");
            }
        } else {
            $this->session->setFlashdata('msg', 'Username Tidak Ditemukan');
            return redirect()->to("/login");
        }
    }

    public function logout()
    {
        $this->session->destroy();
        return redirect()->to("/login");
    }
}
