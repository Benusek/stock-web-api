<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphTo;

/**
 * @property $id
 * @property $type
 * @property $actionable_id
 * @property $actionable_type
 * @property $user_id
 * @property $amount
 * @property $comment
 *
 * @property-read $actionable
 * @property-read $user
 */
class Action extends Model
{
    protected $fillable = [
        'type',
        'actionable_id',
        'actionable_type',
        'user_id',
        'amount',
        'comment',
    ];

    /**
     * Get models from row
     * @return MorphTo
     */
    public function actionable(): MorphTo
    {
        return $this->morphTo();
    }

    /**
     * Get author of row
     * @return BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
