<?php

namespace App\Models;

use CodeIgniter\Model;

class ArticlesModel extends Model
{
    protected $table      = 'articles';
    protected $primaryKey = 'id_articles';
    protected $allowedFields = ['title', 'description', 'thumbnail', 'date', 'slug', 'id_categories', 'id_users'];
}