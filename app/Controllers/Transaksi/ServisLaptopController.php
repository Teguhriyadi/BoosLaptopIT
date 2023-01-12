<?php

namespace App\Controllers\Transaksi;

use App\Controllers\BaseController;
use App\Models\Transaksi\ServisLaptop;

class ServisLaptopController extends BaseController
{
    protected $servis_laptop;
    protected $session;

    public function __construct()
    {
        $this->servis_laptop = new ServisLaptop();    
        $this->session = session();
    }

    public function index()
    {
        $data["servis_laptop"] = $this->servis_laptop->orderBy("id", "DESC")->findAll();

        return view("transaksi/servis_laptop/v_index", $data);
    }

    public function store()
    {
        $this->servis_laptop->insert([
            "tgl_servis" => $this->request->getPost("tgl_servis"),
            "part_servis" => $this->request->getPost("part_servis"),
            "subtotal_servis" => $this->request->getPost("subtotal_servis")
        ]);

        $this->session->setFlashdata("pesan", "<strong>Good Job!</strong>, Data Berhasil di Tambahkan");

        return redirect()->back();
    }

    public function edit($id)
    {
        $this->servis_laptop->update($id, [
            "tgl_servis" => $this->request->getPost("tgl_servis"),
            "part_servis" => $this->request->getPost("part_servis"),
            "subtotal_servis" => $this->request->getPost("subtotal_servis")
        ]);

        $this->session->setFlashdata("pesan", "<strong>Good Job!</strong>, Data Berhasil di Simpan");

        return redirect()->back();
    }

    public function destroy($id)
    {
        $this->servis_laptop->delete($id);

        $this->session->setFlashdata("pesan", "<strong>Good Job!</strong>, Data Berhasil di Hapus");

        return redirect()->back();
    }
}
