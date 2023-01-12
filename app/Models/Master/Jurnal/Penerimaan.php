<?php

namespace App\Models\Master\Jurnal;

use CodeIgniter\Model;

class Penerimaan extends Model
{
    protected $table            = 'jurnal_penerimaan_kas';

    protected $primaryKey       = "kode_coa";

    protected $useAutoIncrement = false;

    protected $allowedFields    = ["kode_coa", "header", "nama"];
}
