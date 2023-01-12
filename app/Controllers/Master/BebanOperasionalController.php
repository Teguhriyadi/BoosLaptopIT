<?php

namespace App\Controllers\Master;

use App\Controllers\BaseController;
use App\Models\Master\BebanOperasional;

class BebanOperasionalController extends BaseController
{
    protected $session;
    protected $beban_operasional;

    public function __construct()
    {
        $this->session = session();
        $this->beban_operasional = new BebanOperasional();       
    }

    public function index()
    {
        $data["beban_operasional"] = $this->beban_operasional->orderBy("id_beban", "DESC")->findAll();

        return view("master/beban_operasional/v_index", $data);
    }

    public function store()
    {
        $this->beban_operasional->insert([
            "id_beban" => $this->request->getPost("id_beban"),
            "keterangan" => $this->request->getPost("keterangan"),
            "nominal" => $this->request->getPost("nominal")
        ]);

        $this->session->setFlashdata("pesan", "<strong>Good Job!</strong>, Data Berhasil di Tambahkan");

        return redirect()->back();
    }

    public function edit($id)
    {
        $this->beban_operasional->update($id, [
            "keterangan" => $this->request->getPost("keterangan"),
            "nominal" => $this->request->getPost("nominal")
        ]);

        $this->session->setFlashdata("pesan", "<strong>Good Job!</strong>, Data Berhasil di Simpan");

        return redirect()->back();
    }

    public function destroy($id)
    {
        $this->beban_operasional->delete($id);

        $this->session->setFlashdata("pesan", "<strong>Good Job!</strong>, Data Berhasil di Hapus");

        return redirect()->back();
    }
}
