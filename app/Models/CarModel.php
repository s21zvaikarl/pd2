<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarModel extends Model
{
    public function manufacturers()
    {
        return $this->belongsTo(Manufacturer::class);
    }

    public function jsonSerialize(): mixed
    {
        return [
            'id' => intval($this->id),
            'name' => $this->name,
            'description' => $this->description,
            //'manufacturers' => $this->manufacturers->name,
            'price' => number_format($this->price, 2),
            'year' => intval($this->year),
            'image' => asset('images/' . $this->image),
        ];
    }
}
