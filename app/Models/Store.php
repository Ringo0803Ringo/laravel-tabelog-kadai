<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'image',
        'description',
        'business_hour',
        'price',
        'postal_code',
        'address',
        'phone_number',
        'holiday'
    ];
}
