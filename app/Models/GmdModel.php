<?php

namespace App\Models;

use CodeIgniter\Model;

class GmdModel extends Model
{
    protected $DBGroup = 'db_slims';
    protected $table      = 'mst_gmd';
    protected $primaryKey = 'gmd_id';
    protected $allowedFields = ['gmd_code', 'gmd_name'];
}