<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class AppController extends BaseController
{
    public function index()
    {
        return view("dashboard");
    }

    public function layouts()
    {
        return view("layouts/main");
    }
}
