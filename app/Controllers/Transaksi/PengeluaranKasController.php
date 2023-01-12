<?php

namespace App\Controllers\Transaksi;

use App\Controllers\BaseController;
use App\Models\Master\BebanOperasional;
use App\Models\Transaksi\PengeluaranKas;

class PengeluaranKasController extends BaseController
{
    protected $pengeluaran;
    protected $beban_operasional;
    protected $session;

    public function __construct()
    {
        $this->pengeluaran = new PengeluaranKas();
        $this->beban_operasional = new BebanOperasional();
        $this->session = session();
    }

    public function index()
    {
        $data["pengeluaran"] = $this->pengeluaran->orderBy("id_pengeluaran_kas", "DESC")->findAll();
        $data["beban_operasional"] = $this->beban_operasional->findAll();

        return view("transaksi/pengeluaran_kas/v_index", $data);
    }

    public function store()
    {
        $this->pengeluaran->insert([
            "id_pengeluaran_kas" => $this->request->getPost("id_pengeluaran_kas"),
            "id_beban_operasional" => $this->request->getPost("id_beban_operasional"),
            "subtotal_pengeluaran_kas" => $this->request->getPost("subtotal_pengeluaran_kas")
        ]);

        $this->session->setFlashdata("pesan", "<strong>Good Job!</strong>, Data Berhasil di Tambahkan");

        return redirect()->back();
    }

    public function edit($id)
    {
        $this->pengeluaran->update($id, [
            "id_beban_operasional" => $this->request->getPost("id_beban_operasional"),
            "subtotal_pengeluaran_kas" => $this->request->getPost("subtotal_pengeluaran_kas")
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
