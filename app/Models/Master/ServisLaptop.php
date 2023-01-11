<?php

namespace App\Models\Master;

use CodeIgniter\Model;

class ServisLaptop extends Model
{
    protected $table            = 'servis_laptop';

    protected $primaryKey       = 'tgl_servis';

    protected $useAutoIncrement = false;

    protected $allowedFields    = ['tgl_servis', 'part_servis', 'subtotal_servis'];
}
