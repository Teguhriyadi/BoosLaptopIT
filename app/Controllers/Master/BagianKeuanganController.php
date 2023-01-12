<?php

namespace App\Controllers\Master;

use App\Controllers\BaseController;
use App\Models\Master\BagianKeuangan;

class BagianKeuanganController extends BaseController
{
    protected $session;
    protected $bagian_keuangan;

    public function __construct()
    {
        $this->session = session();
        $this->bagian_keuangan = new BagianKeuangan();       
    }

    public function index()
    {
        $data["bagian_keuangan"] = $this->bagian_keuangan->orderBy("id_bagian_keuangan", "DESC")->findAll();

        return view("master/bagian_keuangan/v_index", $data);
    }

    public function store()
    {
        $this->bagian_keuangan->insert([
            "id_bagian_keuangan" => $this->request->getPost("id_bagian_keuangan"),
            "nama" => $this->request->getPost("nama"),
            "no_tlp" => $this->request->getPost("no_tlp")
        ]);

        $this->session->setFlashdata("pesan", "<strong>Good Job!</strong>, Data Berhasil di Tambahkan");

        return redirect()->back();
    }

    public function edit($id)
    {
        $this->bagian_keuangan->update($id, [
            "nama" => $this->request->getPost("nama"),
            "no_tlp" => $this->request->getPost("no_tlp")
        ]);

        $this->session->setFlashdata("pesan", "<strong>Good Job!</strong>, Data Berhasil di Simpan");

        return redirect()->back();
    }

    public function destroy($id)
    {
        $this->bagian_keuangan->delete($id);

        $this->session->setFlashdata("pesan", "<strong>Good Job!</strong>, Data Berhasil di Hapus");

        return redirect()->back();
    }
}
