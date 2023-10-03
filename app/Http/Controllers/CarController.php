<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Car;

class CarController extends Controller
{
    public function index()
    {
        $car = Car::orderBy('created_at', 'desc')->paginate(5);
        return view('welcome',['cars' => $car]);
    }

    public function add()
    {
        return view('register');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'brand' => 'required',
            'model' => 'required|unique:cars,model',
            'color' => 'required',
            'price' => 'required|numeric|decimal:2|between:0.00,9999999999.99',
        ]);

        Car::create($validated);
        return redirect()->route('index')->with('register','Car Added');
    }

    public function edit(Car $car, Request $request){
        return view('edit', ['cars' => $car]);
    }

    public function update(Car $car, Request $request){
        $validated = $request->validate([
            'brand' => 'required',
            'model' => 'required|unique:cars,model,'.$car->id,
            'color' => 'required',
            'price' => 'required|numeric|decimal:2|between:0.00,9999999999.99',
        ]);
        $car->update($validated);
        return redirect()->route('index')->with('edit','Car Updated');
    }

    public function archive(Car $car){
        $car = array('cars' => Car::onlyTrashed()->orderBy('deleted_at', 'desc')->paginate(5));
        return view('archive', $car);
    }

    public function destroy(Car $car){
        if($car->trashed()){
            $car->forceDelete();
            return redirect()->route('car.archive')->with('delete','Car Deleted');
        }
        $car->delete();
        return redirect()->route('index')->with('archive','Car Archived');
    }

    public function restore(Car $car){
        $car->restore();
        return redirect()->route('index')->with('restore','Car Restored');
    }
}
