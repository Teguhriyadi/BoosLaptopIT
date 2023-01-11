<?php

namespace App\Models\Master;

use CodeIgniter\Model;

class BebanOperasional extends Model
{
    protected $table            = "beban_operasional";

    protected $primaryKey       = "id_beban";
    
    protected $useAutoIncrement = false;

    protected $allowedFields    = ["id_beban", "keterangan", "nominal"];
}
