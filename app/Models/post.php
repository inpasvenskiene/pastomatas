<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class post extends Model
{
    use HasFactory;

    public $fillable = ['town', 'capacity', 'code'];

    public function parcels()
    {
        return $this->hasMany('App\Models\parcel');
    }
}
