<?php

namespace App\Models;

use CodeIgniter\Model;

class VisitorsModel extends Model
{
    protected $table      = 'visitors';
    protected $primaryKey = 'id_visitors';
    protected $allowedFields = ['type', 'created_at', 'id_articles'];
}