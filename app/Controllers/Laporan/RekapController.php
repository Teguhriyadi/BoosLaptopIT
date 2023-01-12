<?php

namespace App\Controllers\Laporan;

use App\Controllers\BaseController;
use App\Models\Transaksi\ServisLaptop;

class RekapController extends BaseController
{
    protected $session;
    protected $data;
    protected $db;

    public function __construct()
    {
        $this->data = new ServisLaptop();
        $this->session = session();
        $this->db;
    }

    public function index()
    {
        return view("laporan/v_rekap");
    }

    public function cari()
    {
        $tanggal_mulai = $this->request->getPost("tanggal_mulai");
        $tanggal_akhir = $this->request->getPost("tanggal_akhir");
        
        $tgl_mulai = strtotime($tanggal_mulai);
        $tgl_akhir = strtotime($tanggal_akhir);

        if ($tgl_mulai > $tgl_akhir) {
            
            $this->session->setFlashdata("pesan", "<strong>Oopss!</strong>, Terjadi Kesalahan Data");

            return redirect()->back();
        } else {

            $laporan = $this->data->rekap_laporan_data($tanggal_mulai, $tanggal_akhir);
            
            $data["data_laporan"] = $laporan;
            $data["tanggal_mulai"] = $tanggal_mulai;
            $data["tanggal_akhir"] = $tanggal_akhir;

            return view("laporan/v_rekap", $data);
        }
    }
}
