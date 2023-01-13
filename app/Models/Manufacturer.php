<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Manufacturer extends Model
{
    public function car_models()
    {
        return $this->hasMany(CarModel::class);
    }
}
