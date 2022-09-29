<?php

namespace App\Models;

use CodeIgniter\Model;

class UsersModel extends Model
{
    protected $table      = 'users';
    protected $primaryKey = 'id_users';
    protected $allowedFields = ['name', 'username', 'password', 'roles'];
}