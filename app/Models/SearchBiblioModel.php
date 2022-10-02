<?php

namespace App\Models;

use CodeIgniter\Model;

class SearchBiblioModel extends Model
{
    protected $DBGroup = 'db_slims';
    protected $table      = 'search_biblio';
    protected $primaryKey = 'biblio_id';
    protected $allowedFields = ['title'];
}