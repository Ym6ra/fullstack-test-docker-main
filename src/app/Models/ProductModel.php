<?php

namespace App\Models;

use CodeIgniter\Model;

class ProductModel extends Model
{
    protected $table = 'product';
    protected $primaryKey = 'productID';

    protected $allowedFields = ['src'];

    protected $validationRules = [
        'src' => 'required'
    ];

    protected $returnType = 'array';
}