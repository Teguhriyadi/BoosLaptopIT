<?php

namespace App\Controllers\Master;

use App\Controllers\BaseController;
use App\Models\Master\COA;

class CoaController extends BaseController
{
    protected $coa;
    protected $session;

    public function __construct()
    {
        $this->coa = new COA();    
        $this->session = session();
    }

    public function index()
    {
        $data["coa"] = $this->coa->orderBy("kode_coa", "DESC")->findAll();

        return view("master/coa/v_index", $data);
    }

    public function store()
    {
        $this->coa->insert([
            "kode_coa" => $this->request->getPost("kode_coa"),
            "nama_coa" => $this->request->getPost("nama_coa"),
            "header_coa" => $this->request->getPost("header_coa")
        ]);

        $this->session->setFlashdata("pesan", "<strong>Good Job!</strong>, Data Berhasil di Tambahkan");

        return redirect()->back();
    }

    public function edit($id)
    {
        $this->coa->update($id, [
            "nama_coa" => $this->request->getPost("nama_coa"),
            "header_coa" => $this->request->getPost("header_coa")
        ]);

        $this->session->setFlashdata("pesan", "<strong>Good Job!</strong>, Data Berhasil di Simpan");

        return redirect()->back();
    }

    public function destroy($id)
    {
        $this->coa->delete($id);

        $this->session->setFlashdata("pesan", "<strong>Good Job!</strong>, Data Berhasil di Hapus");

        return redirect()->back();
    }
}
