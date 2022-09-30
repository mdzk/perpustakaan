<?php

namespace App\Models;

use CodeIgniter\Model;

class CollTypeModel extends Model
{
    protected $DBGroup = 'db_slims';
    protected $table      = 'mst_coll_type';
    protected $primaryKey = 'coll_type_id';
    protected $allowedFields = ['coll_type_name'];
}