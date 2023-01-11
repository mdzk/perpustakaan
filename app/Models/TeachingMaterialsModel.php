<?php

namespace App\Models;

use CodeIgniter\Model;

class TeachingMaterialsModel extends Model
{
    protected $table      = 'teaching_materials';
    protected $primaryKey = 'id_materials';
    protected $allowedFields = ['title', 'material', 'description', 'status', 'id_users', 'id_prodi'];
}