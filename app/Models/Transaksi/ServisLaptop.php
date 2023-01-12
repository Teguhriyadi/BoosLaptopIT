<?php

namespace App\Models\Transaksi;

use CodeIgniter\Model;

class ServisLaptop extends Model
{
    protected $table            = 'servis_laptop';

    protected $primaryKey       = 'id';

    protected $allowedFields    = ['tgl_servis', 'part_servis', 'subtotal_servis'];
}
