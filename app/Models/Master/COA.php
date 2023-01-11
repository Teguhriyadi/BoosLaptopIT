<?php

namespace App\Models\Master;

use CodeIgniter\Model;

class COA extends Model
{
    protected $table            = 'coa';

    protected $primaryKey       = 'kode_coa';
    
    protected $useAutoIncrement = false;
    
    protected $allowedFields    = ["kode_coa", "nama_coa", "header_coa"];
}
