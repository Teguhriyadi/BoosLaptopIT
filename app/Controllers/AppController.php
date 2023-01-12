<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Master\BebanOperasional;

class AppController extends BaseController
{
    protected $session;

    protected $table;

    public function __construct()
    {
        $this->session = session();    
        $this->table = new BebanOperasional();
    }

    public function index()
    {
        $data["count_beban_operasional"] = $this->table->countAll("beban_operasional");
        $data["count_bagian_keuangan"] = $this->table->countAll("bagian_keuangan");
        $data["count_coa"] = $this->table->countAll("coa");
        
        return view("dashboard", $data);
    }

    public function layouts()
    {
        return view("layouts/main");
    }
}
