<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @property int $id
 * @property float $value
 * @property float $down_payment_amount
 * @property int $user_id
 * @property int $client_id
 * @property string $created_at
 * @property string $updated_at
 * @property string $deleted_at
 *
 * @property User $user
 * @property Client $client
 */
class HomeLoan extends Model
{
    use SoftDeletes;

    protected $table = 'home_loans';

    protected $fillable = [
        'value',
        'down_payment_amount',
        'user_id',
        'client_id',
    ];

    public function client(): BelongsTo
    {
        return $this->belongsTo(Client::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
