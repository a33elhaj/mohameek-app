<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'ar-name',
    ];

    public function cities()
    {
        return $this->hasMany(City::class, 'province_id');
    }
}