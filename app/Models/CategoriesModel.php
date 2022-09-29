<?php

namespace App\Models;

use CodeIgniter\Model;

class CategoriesModel extends Model
{
    protected $table      = 'categories';
    protected $primaryKey = 'id_categories';
    protected $allowedFields = ['name'];
}