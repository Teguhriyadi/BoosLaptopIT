<?php

namespace App\Controllers\Transaksi;

use App\Controllers\BaseController;
use App\Models\Master\Jurnal\Pengeluaran;

class JurnalPengeluaranKasController extends BaseController
{
    protected $pengeluaran;
    protected $session;

    public function __construct()
    {
        $this->pengeluaran = new Pengeluaran();
        $this->session = session();
    }

    public function index()
    {
        $data["pengeluaran"] = $this->pengeluaran->orderBy("kode_coa", "DESC")->findAll();

        return view("transaksi/jurnal/pengeluaran/v_index", $data);
    }

    public function store()
    {
        $this->pengeluaran->insert([
            "kode_coa" => $this->request->getPost("kode_coa"),
            "nama" => $this->request->getPost("nama"),
            "header" => $this->request->getPost("header")
        ]);

        $this->session->setFlashdata("pesan", "<strong>Good Job!</strong>, Data Berhasil di Tambahkan");

        return redirect()->back();
    }

    public function edit($id)
    {
        $this->pengeluaran->update($id, [
            "nama" => $this->request->getPost("nama"),
            "header" => $this->request->getPost("header")
        ]);

        $this->session->setFlashdata("pesan", "<strong>Good Job!</strong>, Data Berhasil di Simpan");

        return redirect()->back();
    }

    public function destroy($id)
    {
        $this->pengeluaran->delete($id);

        $this->session->setFlashdata("pesan", "<strong>Good Job!</strong>, Data Berhasil di Hapus");

        return redirect()->back();
    }
}
