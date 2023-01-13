<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Manufacturer;

class ManufacturerController extends Controller
{
    //display all manufacturers
    public function list()
    {
        $items = Manufacturer::orderBy('name', 'asc')->get();
        return view(
            'manufacturers.list',
            [
            'title' => 'Ražotāji',
            'items' => $items
            ]
        );
    }

    public function create()
    {
        $manufacturers = Manufacturer::all();
        return view(
        'manufacturers.form',
        [
        'title' => 'Pievienot ražotāju',
        'manufacturers' => new Manufacturer(),
        'manufacturers_data' => $manufacturers
        ]
        );
        
    }

    public function put(Request $request)
    {
        $validatedData = $request->validate([
        'name' => 'required',
        ]);
        $manufacturers = new Manufacturer();
        $manufacturers->name = $validatedData['name'];
        $manufacturers->save();
        return redirect('/manufacturers');
    }

    public function update(Manufacturer $manufacturers)
    {
        return view(
        'manufacturers.form',
        [
        'title' => 'Rediģēt ražotāju',
        'manufacturers' => $manufacturers
        ]
        );
    }

    public function patch(Manufacturer $manufacturers, Request $request)
    {
        $validatedData = $request->validate([
        'name' => 'required',
        ]);
        $manufacturers->name = $validatedData['name'];
        $manufacturers->save();
        return redirect('/manufacturers');
    }

    public function delete(Manufacturer $manufacturers)
    {
        $manufacturers->delete();
        return redirect('/manufacturers');
    }

    public function __construct()
    {
    $this->middleware('auth');
    }

}