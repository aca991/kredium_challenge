<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @property int $id
 * @property string $first_name
 * @property string $last_name
 * @property string $email
 * @property string $phone_number
 * @property string $created_at
 * @property string $updated_at
 * @property string $deleted_at
 *
 * @property CashLoan $cashLoan
 * @property HomeLoan $homeLoan
 */
class Client extends Model
{
    use SoftDeletes;

    protected $table = 'clients';

    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'phone_number',
    ];

    /**
     * @return HasOne
     */
    public function cashLoan(): HasOne
    {
        return $this->hasOne(CashLoan::class);
    }

    /**
     * @return HasOne
     */
    public function homeLoan(): HasOne
    {
        return $this->hasOne(HomeLoan::class);
    }
}
