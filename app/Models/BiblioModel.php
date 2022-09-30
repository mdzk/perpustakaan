<?php

namespace App\Models;

use CodeIgniter\Model;

class BiblioModel extends Model
{
    protected $DBGroup = 'db_slims';
    protected $table      = 'biblio';
    protected $primaryKey = 'biblio_id';
    protected $allowedFields = ['title', 'publish_year', 'isbn_issn'];
}