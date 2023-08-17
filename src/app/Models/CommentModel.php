<?php

namespace App\Models;

use CodeIgniter\Model;

class CommentModel extends Model
{
    protected $table = 'comments';
    protected $primaryKey = 'id';

    protected $allowedFields = ['name', 'text', 'date', 'productID'];

    protected $validationRules = [
        'name' => 'required',
        'text' => 'required',
        'productID' => 'required|integer'
    ];

    protected $returnType = 'array';
}