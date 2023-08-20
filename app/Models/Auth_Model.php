<?php

namespace App\Models;

use CodeIgniter\Model;

class Auth_Model extends Model
{
    protected $table = 'users';
    protected $allowedFields = ['username', 'password'];

    public function getUserByUsername($username)
    {
        return $this->where('username', $username)->first();
    }
}
