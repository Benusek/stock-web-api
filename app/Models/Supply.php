<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * @property $id
 * @property $status
 * @property $supplier_id
 * @property $user_id
 * @property $created_at
 * @property $updated_at
 *
 * @property-read Product[] $products
 * @property-read Collection|SupplyProducts[] $supplies
 * @property-read Supplier $supplier
 * @property-read User $user
 * @method static filter(array $all)
 */
class Supply extends Model
{
    protected $fillable = [
        'supplier_id',
        'user_id',
        'status',
    ];

    /**
     * Get supplier from supply
     * @return HasOne
     */
    public function supplier(): hasOne
    {
        return $this->hasOne(Supplier::class, 'id', 'supplier_id');
    }

    /**
     * Get author of supply
     * @return HasOne
     */
    public function user(): hasOne
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    /**
     * Get supplies with products
     * @return HasMany
     */
    public function supplies(): HasMany
    {
        return $this->hasMany(SupplyProducts::class, 'supply_id', 'id');
    }

    /**
     * Get products in supply
     * @return BelongsToMany
     */
    public function products(): BelongsToMany
    {
        return $this->belongsToMany(Product::class, 'supply_products', 'supply_id', 'product_id');
    }

    public function scopeFilter($q, $filters)
    {
        return $q
            ->when($filters['search'] ?? null, fn($request, $str) => $request->where('id', $str)->orWhereHas('products', function($request) use($filters) {
                $request->where('name', 'like', '%' . $filters['search'] . '%');
            }))
            ->when($filters['start'] ?? null, fn($request, $date) => $request->whereDate('created_at', '>=', $date))
            ->when($filters['end'] ?? null, fn($request, $date) => $request->whereDate('created_at', '<=', $date))
            ->when($filters['status'] ?? null, fn($request, $status) => $request->where('status', $status))
            ->when($filters['supplier_id'] ?? null, fn($request, $supplier) => $request->where('supplier_id', $supplier))
            ->when($filters['user_id'] ?? null, fn($request, $user) => $request->where('user_id', $user))
            ->when($filters['min'] ?? null, fn($request, $min) => $request->having('total_price', '>=', $min))
            ->when($filters['max'] ?? null, fn($request, $max) => $request->having('total_price', '<=', $max));
    }
}
