<?php

namespace App\Models;

use CodeIgniter\Model;

class LocationModel extends Model
{
    protected $DBGroup = 'db_slims';
    protected $table      = 'mst_location';
    protected $primaryKey = 'location_id';
    protected $allowedFields = ['location_name'];
}