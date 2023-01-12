<?php

namespace App\Controllers\Akun;

use App\Controllers\BaseController;
use App\Models\Akun\User;

class UserController extends BaseController
{
    protected $users;
    protected $session;

    public function __construct()
    {
        $this->users = new User();    
        $this->session = session();
    }

    public function index()
    {
        $data["users"] = $this->users->orderBy("id", "DESC")->findAll();

        return view("akun/users/v_index", $data);
    }

    public function store()
    {
        $data = $this->request->getPost("password");

        $password = password_hash($data, PASSWORD_DEFAULT);

        $this->users->insert([
            "username" => $this->request->getPost("username"),
            "password" => $password
        ]);

        $this->session->setFlashdata("pesan", "<strong>Good Job!</strong>, Data Berhasil di Tambahkan");

        return redirect()->back();
    }

    public function edit($id)
    {
        $this->users->update($id, [
            "username" => $this->request->getPost("username"),
            "password" => $this->request->getPost("password")
        ]);

        $this->session->setFlashdata("pesan", "<strong>Good Job!</strong>, Data Berhasil di Simpan");

        return redirect()->back();
    }

    public function destroy($id)
    {
        $this->users->delete($id);

        $this->session->setFlashdata("pesan", "<strong>Good Job!</strong>, Data Berhasil di Hapus");

        return redirect()->back();
    }
}
