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
        'holiday',
        'category_id',
    ];

    public function bookings() {
        return $this->hasMany(Booking::class);
    }

    public function category() {
        return $this->belongsTo(Category::class);
    }

    public function favorites() {
        return $this->hasMany(Favorite::class);
    }

    public function reviews() {
        return $this->hasMany(Review::class);
    }
}
