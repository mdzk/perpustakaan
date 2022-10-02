<?php

namespace App\Models;

use CodeIgniter\Model;

class MstAuthorModel extends Model
{
    protected $DBGroup = 'db_slims';
    protected $table      = 'mst_author';
    protected $primaryKey = 'author_id';
    protected $allowedFields = ['author_id', 'author_name'];
}