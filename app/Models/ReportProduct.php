<?php

namespace App\Models;

use CodeIgniter\Model;

class ReportProduct extends Model

{
    protected $table = 'report_product';

    public function getData()
    {
        return $this->findAll(); 
    }
}