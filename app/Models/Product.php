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
 * @property $minimum
 *
 * @method static filter(array $all)
 */
class Product extends Model
{
    protected $fillable = [
        'name',
        'type',
        'unit',
        'quantity',
        'minimum',
    ];

    public function scopeFilter($q, $filters)
    {
        return $q
            ->when($filters['search'] ?? null, fn($request, $str) => $request->where('name', 'like', '%' . $filters['search'] . '%'))
            ->when($filters['type'] ?? null, fn($request, $type) => $request->where('type', $type))
            ->when($filters['unit'] ?? null, fn($request, $unit) => $request->where('unit', $unit))
            ->when($filters['minimum'] ?? null, fn($request, $availability) => $request->where('minimum', $availability))
            ->when($filters['min_quantity'] ?? null, fn($request, $min) => $request->where('quantity', '>=', $min))
            ->when($filters['max_quantity'] ?? null, fn($request, $max) => $request->where('quantity', '<=', $max));
    }
}
