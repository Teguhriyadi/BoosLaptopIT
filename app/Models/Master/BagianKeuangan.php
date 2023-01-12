<?php

namespace App\Models\Master;

use CodeIgniter\Model;

class BagianKeuangan extends Model
{
    protected $table            = 'bagian_keuangan';

    protected $primaryKey       = "id_bagian_keuangan";

    protected $useAutoIncrement = false;

    protected $allowedFields    = ["id_bagian_keuangan", "nama", "no_tlp"];
}
