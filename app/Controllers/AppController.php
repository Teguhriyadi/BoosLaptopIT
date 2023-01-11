<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class AppController extends BaseController
{
    protected $session;

    public function __construct()
    {
        $this->session = session();    
    }

    public function index()
    {
        return view("dashboard");
    }

    public function layouts()
    {
        return view("layouts/main");
    }
}
