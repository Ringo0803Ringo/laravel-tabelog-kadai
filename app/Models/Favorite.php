<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Favorite extends Model
{
    use HasFactory;

    protected $fillable = [
        'store_id',
        'user_id'
    ];

    public function stores() {
        return $this->hasMany(Store::class);
    }

    public function users() {
        return $this->hasMany(User::class);
    }
}
