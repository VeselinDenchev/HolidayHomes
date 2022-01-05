<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class House extends Model
{
    use HasFactory;

    public function objectType()
    {
        return $this->hasOne(ObjectType::class);
    }

    public function populatedPlace()
    {
        return $this->hasOne(PopulatedPlace::class);
    }

    public function owner()
    {
        return $this->hasOne(User::class);
    }

    public function images()
    {
        return $this->hasMany('House', 'house_id');
    }
}
