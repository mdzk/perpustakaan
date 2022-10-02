<?php

namespace App\Models;

use CodeIgniter\Model;

class BiblioAuthorModel extends Model
{
    protected $DBGroup = 'db_slims';
    protected $table      = 'biblio_author';
    protected $primaryKey = ['biblio_id', 'author_id'];
    protected $allowedFields = ['biblio_id', 'author_id'];
}