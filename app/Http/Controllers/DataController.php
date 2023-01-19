<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CarModel;

class DataController extends Controller
{
    // Metode atgriež 3 publicētus carmodel ierakstus nejaušā secībā
    public function gettopcarmodels()
    {
    $carmodel = CarModel::where('display', true)
    ->inRandomOrder()
    ->take(3)
    ->get();
    return $carmodel;
    }
    // Metode atgriež izvēlēto carmodels ierakstu, ja tas ir publicēts
    public function getcarmodels(CarModel $carmodel)
    {
    $selectedcarmodels = CarModel::where([
    'id' => $carmodel->id,
    'display' => true,
    ])
    ->firstOrFail();
    return $selectedcarmodels;
    }
    // Metode atgriež 3 publicētus CarModel ierakstus nejaušā secībā,
    // izņemot izvēlēto CarModel ierakstu
    public function getrelatedcarmodels(CarModel $carmodel)
    {
    $carmodel = CarModel::where('display', true)
    ->where('id', '<>', $carmodel->id)
    ->inRandomOrder()
    ->take(3)
    ->get();
    return $carmodel;
    }

}
