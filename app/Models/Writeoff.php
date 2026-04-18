<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * @property $id
 * @property $comment
 * @property $reason
 * @property $user_id
 *
 * @property-read $products
 */
class Writeoff extends Model
{
    protected $fillable = [
        'id',
        'comment',
        'reason',
        'user_id',
    ];

    /**
     * Get products from adjustment
     * @return BelongsToMany
     */
    public function products(): BelongsToMany
    {
        return $this->belongsToMany(Product::class, 'writeoff_products')
            ->withPivot('quantity');
    }

    public function action()
    {
        return $this->morphOne(Action::class, 'actionable');
    }
}
