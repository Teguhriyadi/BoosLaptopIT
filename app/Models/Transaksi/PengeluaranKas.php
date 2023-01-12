<?php

namespace App\Models\Transaksi;

use CodeIgniter\Model;

class PengeluaranKas extends Model
{
    protected $table            = "data_pengeluaran_kas";

    protected $primaryKey       = "id_pengeluaran_kas";

    protected $useAutoIncrement = false;

    protected $allowedFields    = ["id_pengeluaran_kas", "id_beban_operasional", "subtotal_pengeluaran_kas"];
}
