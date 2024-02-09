<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Customer_Case extends Model
{
    use HasFactory;

    protected $fillable = [
        'summary',
        'duration',
        'customer_id',
        'major_id',
        'city_id',
    ];

    public function customer(): BelongsTo
    {
        return $this->belongsTo(Customer::class);
    }

    public function city(): HasOne
    {
        return $this->hasOne(City::class);
    }

    public function major(): HasOne
    {
        return $this->hasOne(Major::class);
    }

    public function offers(): HasMany
    {
        return $this->hasMany(Case_Offer::class);
    }

}
