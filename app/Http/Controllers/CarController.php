<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Car;

class CarController extends Controller
{
    public function index()
    {
       $car = Car::all();
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
            'model' => 'required',
            'color' => 'required',
            'price' => 'required|decimal:2',
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
            'model' => 'required',
            'color' => 'required',
            'price' => 'required|decimal:1,4',
        ]);
        $car->update($validated);
        return redirect()->route('index')->with('edit','Car Updated');

    }

    public function archive(Car $car){
        $car = array('cars' => Car::onlyTrashed()->orderBy('id')->get());
        return view('archive', $car);
    }

    public function destroy(Car $car){
        if($car->trashed()){
            $car->forceDelete();
            return redirect()->route('index')->with('delete','Car Deleted');

        }
        $car->delete();
        return redirect()->route('index')->with('archive','Car Archived');
    }

    public function restore(Car $car){
        $car->restore();
        return redirect()->route('index')->with('restore','Car Restored');
    }
}
