<?php

namespace App\Models;

use CodeIgniter\Model;

class DonateModel extends Model
{
    protected $table      = 'donate';
    protected $primaryKey = 'id_donate';
    protected $allowedFields = ['donors','npm', 'title', 'author', 'id_users', 'picture', 'status'];
}