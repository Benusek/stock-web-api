<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property $id
 * @property $product_id
 * @property $supply_id
 * @property $price
 * @property $quantity
 * @property $created_at
 * @property $updated_at
 */
class SupplyProducts extends Model
{
    protected $fillable = [
        'supply_id',
        'product_id',
        'price',
        'quantity'
    ];
    public $timestamps = false;
}
