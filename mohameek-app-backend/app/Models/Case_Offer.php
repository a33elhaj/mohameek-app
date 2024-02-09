<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Case_Offer extends Model
{
    use HasFactory;

    protected $fillable = [
        'price',
        'status',
        'lawyer_id',
        'customer_case_id',
    ];

    public function lawyer(): BelongsTo
    {
        return $this->belongsTo(Lawyer::class);
    }

    public function customer_case(): BelongsTo
    {
        return $this->belongsTo(Customer_Case::class);
    }
}
