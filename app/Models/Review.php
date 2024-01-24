<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    protected $fillable = [
        'star',
        'content',
        'store_id',
        'user_id'
    ];

    public function stores() {
        return $this->belongsTo(Store::class);
    }

    public function users() {
        return $this->hasMany(User::class);
    }
}
