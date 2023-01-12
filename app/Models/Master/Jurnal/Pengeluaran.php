<?php

namespace App\Models\Master\Jurnal;

use CodeIgniter\Model;

class Pengeluaran extends Model
{
    protected $table            = "jurnal_pengeluaran_kas";

    protected $primaryKey       = "kode_coa";
    
    protected $useAutoIncrement = false;

    protected $allowedFields    = ["kode_coa", "header", "nama"];
}
