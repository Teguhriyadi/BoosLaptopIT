<?php

namespace App\Controllers\Transaksi;

use App\Controllers\BaseController;
use App\Models\Transaksi\PenerimaanKas;
use App\Models\Transaksi\ServisLaptop;

class PenerimaanKasController extends BaseController
{
    protected $penerimaan;
    protected $servis;
    protected $session;

    public function __construct()
    {
        $this->penerimaan = new PenerimaanKas();
        $this->servis = new ServisLaptop();
        $this->session = session();
    }

    public function index()
    {
        $data["penerimaan"] = $this->penerimaan->orderBy("id_penerimaan", "DESC")->findAll();
        $data["servis"] = $this->servis->findAll();

        return view("transaksi/penerimaan_kas/v_index", $data);
    }

    public function store()
    {
        $this->penerimaan->insert([
            "id_penerimaan" => $this->request->getPost("id_penerimaan"),
            "id_servis_laptop" => $this->request->getPost("id_servis_laptop"),
            "subtotal_penerimaan_kas" => $this->request->getPost("subtotal_penerimaan_kas")
        ]);

        $this->session->setFlashdata("pesan", "<strong>Good Job!</strong>, Data Berhasil di Tambahkan");

        return redirect()->back();
    }

    public function edit($id)
    {
        $this->penerimaan->update($id, [
            "id_servis_laptop" => $this->request->getPost("id_servis_laptop"),
            "subtotal_penerimaan_kas" => $this->request->getPost("subtotal_penerimaan_kas")
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
