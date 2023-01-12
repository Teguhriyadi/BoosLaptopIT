<?php

namespace App\Models\Transaksi;

use CodeIgniter\Model;

class PenerimaanKas extends Model
{
    protected $table            = 'data_penerimaan_kas';

    protected $primaryKey       = "id_penerimaan";

    protected $useAutoIncrement = false;
    
    protected $allowedFields    = ["id_penerimaan", "id_servis_laptop", "subtotal_penerimaan_kas"];
}
