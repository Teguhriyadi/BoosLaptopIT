<?php

namespace App\Models\Akun;

use CodeIgniter\Model;

class User extends Model
{
    protected $table = "users";

    protected $allowedFields = ['id', 'username', 'password'];
}
