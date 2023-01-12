<?php

namespace App\Controllers\Transaksi;

use App\Controllers\BaseController;
use App\Models\Master\Jurnal\Penerimaan;

class JurnalPenerimaanKasController extends BaseController
{
    protected $penerimaan;
    protected $session;

    public function __construct()
    {
        $this->penerimaan = new Penerimaan();
        $this->session = session();
    }

    public function index()
    {
        $data["penerimaan"] = $this->penerimaan->orderBy("kode_coa", "DESC")->findAll();

        return view("transaksi/jurnal/penerimaan/v_index", $data);
    }

    public function store()
    {
        $this->penerimaan->insert([
            "kode_coa" => $this->request->getPost("kode_coa"),
            "nama" => $this->request->getPost("nama"),
            "header" => $this->request->getPost("header")
        ]);

        $this->session->setFlashdata("pesan", "<strong>Good Job!</strong>, Data Berhasil di Tambahkan");

        return redirect()->back();
    }

    public function edit($id)
    {
        $this->penerimaan->update($id, [
            "nama" => $this->request->getPost("nama"),
            "header" => $this->request->getPost("header")
        ]);

        $this->session->setFlashdata("pesan", "<strong>Good Job!</strong>, Data Berhasil di Simpan");

        return redirect()->back();
    }

    public function destroy($id)
    {
        $this->penerimaan->delete($id);

        $this->session->setFlashdata("pesan", "<strong>Good Job!</strong>, Data Berhasil di Hapus");

        return redirect()->back();
    }
}
