<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property $name
 *
 * @property-read Supply[] $supplies
 */
class Supplier extends Model
{
    protected $fillable = [
        'name'
    ];

    /**
     * List of supplier's supplies
     * @return HasMany
     */
    public function supplies(): HasMany
    {
        return $this->hasMany(Supply::class);
    }
}
