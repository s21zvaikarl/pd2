<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DataController extends Controller
{
    // Metode atgriež 3 publicētus carmodel ierakstus nejaušā secībā
    public function gettopcarmodels()
    {
    $carmodels = CarModel::where('display', true)
    ->inRandomOrder()
    ->take(3)
    ->get();
    return $carmodels;
    }
    // Metode atgriež izvēlēto carmodels ierakstu, ja tas ir publicēts
    public function getcarmodels(CarModel $carmodels)
    {
    $selectedcarmodels = CarModel::where([
    'id' => $carmodels->id,
    'display' => true,
    ])
    ->firstOrFail();
    return $selectedcarmodels;
    }
    // Metode atgriež 3 publicētus CarModel ierakstus nejaušā secībā,
    // izņemot izvēlēto CarModel ierakstu
    public function getRelatedcarmodels(CarModel $carmodels)
    {
    $carmodels = CarModel::where('display', true)
    ->where('id', '<>', $carmodels->id)
    ->inRandomOrder()
    ->take(3)
    ->get();
    return $carmodels;
    }

}
