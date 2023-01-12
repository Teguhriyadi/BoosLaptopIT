<?php

namespace App\Models\Transaksi;

use CodeIgniter\Model;

class ServisLaptop extends Model
{
    protected $table            = 'servis_laptop';

    protected $primaryKey       = 'id';

    protected $allowedFields    = ['tgl_servis', 'part_servis', 'subtotal_servis'];

    public function rekap_laporan_data($tanggal_mulai, $tanggal_akhir)
    {
        return $this->table("servis_laptop")->where('tgl_servis >=', $tanggal_mulai)->where('tgl_servis <=', $tanggal_akhir)->get();
    }
}
