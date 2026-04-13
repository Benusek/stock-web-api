<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property $id
 * @property $name
 * @property $type
 * @property $unit
 * @property $quantity
 * @property $created_at
 * @property $updated_at
 */
class Product extends Model
{
    protected $fillable = [
        'name',
        'type',
        'unit',
        'quantity',
    ];
}
