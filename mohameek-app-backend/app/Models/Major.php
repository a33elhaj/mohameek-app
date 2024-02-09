<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Major extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    public function customer_case(): BelongsTo
    {
        return $this->belongsTo(Customer_Case::class);
    }

    public function lawyers()
    {
        return $this->belongsToMany(Lawyer::class, 'lawyer_majors', 'lawyer_id', 'major_id');
    }
}
