<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Supply extends Model
{
    protected $fillable = [
        'price',
        'status_id',
        'supplier_id',
        'unit_type_id',
    ];
}
