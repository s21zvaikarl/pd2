<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CarModel;
use App\Models\Manufacturer;

class CarModelController extends Controller
{
    public function list()
    {
    $items = CarModel::orderBy('name', 'asc')->get();
    return view(
    'car_models.list',
    [
    'title' => 'Auto Modeļi',
    'items' => $items
    ]
    );
    }

    public function create()
    {
        $car_models = Manufacturer::orderBy('name', 'asc')->get();
        return view(
        'car_models.form',
        [
        'title' => 'Pievienot',
        'car_models' => new CarModel(),
        'manufacturers' => $car_models,
        ]
        );
    }

    public function put(Request $request)
    {
    $validatedData = $request->validate([
    'name' => 'required|min:3|max:256',
    'manufacturer_id' => 'required',
    'description' => 'nullable',
    'price' => 'nullable|numeric',
    'year' => 'numeric',
    'image' => 'nullable|image',
    'display' => 'nullable'
    ]);
    $car_models = new CarModel();
    $car_models->name = $validatedData['name'];
    $car_models->manufacturer_id = $validatedData['manufacturer_id'];
    $car_models->description = $validatedData['description'];
    $car_models->price = $validatedData['price'];
    $car_models->year = $validatedData['year'];
    $car_models->display = (bool) ($validatedData['display'] ?? false);

    if ($request->hasFile('image')) {
        $uploadedFile = $request->file('image');
        $extension = $uploadedFile->clientExtension();
        $name = uniqid();
        $car_models->image = $uploadedFile->storePubliclyAs(
        '/',
        $name . '.' . $extension,
        'uploads'
        );
    }

    $car_models->save();
    return redirect('/car_models');
    }

    public function update(CarModel $car_models)
    {
    $manufacturers = Manufacturer::orderBy('name', 'asc')->get();
    return view(
    'car_models.form',
    [
    'title' => 'Rediģēt',
    'car_models' => $car_models,
    'manufacturers' => $manufacturers,
    ]
    );
    }
    public function patch(CarModel $car_models, Request $request)
    {
    $validatedData = $request->validate([
    'name' => 'required|min:3|max:256',
    'manufacturer_id' => 'required',
    'description' => 'nullable',
    'price' => 'nullable|numeric',
    'year' => 'numeric',
    'image' => 'nullable|image',
    'display' => 'nullable'
    ]);
    $car_models->name = $validatedData['name'];
    $car_models->manufacturer_id = $validatedData['manufacturer_id'];
    $car_models->description = $validatedData['description'];
    $car_models->price = $validatedData['price'];
    $car_models->year = $validatedData['year'];
    $car_models->display = (bool) ($validatedData['display'] ?? false);
    $car_models->save();
    return redirect('/car_models/update/' . $car_models->id);
    }

    public function delete(CarModel $car_models)
    {
    $car_models->delete();
    return redirect('/car_models');
    }

    public function __construct()
    {
    $this->middleware('auth');
    }

}
