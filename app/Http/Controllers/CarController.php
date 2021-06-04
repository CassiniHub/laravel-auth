<?php

namespace App\Http\Controllers;

use App\Car;
use App\Brand;
use App\Pilot;

use Illuminate\Http\Request;

class CarController extends Controller
{
    public function __construct()
    {
        $this -> middleware('auth') -> except(['index']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cars = Car::where('deleted', false) -> get();

        return view('pages.cars.index', compact(
            'cars'
        ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $brands = Brand::all();
        $pilots = Pilot::all();

        return view('pages.cars.create', compact(
            'brands',
            'pilots'
        ));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validate = $request -> validate([
            'name'  => 'required|string|min:3',
            'model' => 'required|string|min:3',
            'kw'    => 'required|integer|min:200|max:2000',
        ]);

        $brand = Brand::findOrFail($request -> get('brand_id'));


        $car = Car::make($validate);
        $car -> brand() -> associate($brand);
        $car -> save();

        $car -> pilots() -> attach($request -> get('pilots_id'));
        $car -> save();

        return redirect() -> route('cars.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function show(Car $car)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function edit(Car $car)
    {
        $brands = Brand::all();
        $pilots = Pilot::all();

        return view('pages.cars.edit', compact(
            'car',
            'pilots',
            'brands'
        ));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Car $car)
    {   
        $validated = $request -> validate([
            'name'  => 'required|string|min:3',
            'model' => 'required|string|min:3',
            'kw'    => 'required|integer|min:200|max:2000',
        ]);
        
        $car -> update($validated);
        
        // Take the entire object
        // $brand = Brand::findOrFail($request -> brand_id);
        // $car -> brand() -> associate($brand);

        // Take only object id
        $car -> brand() -> associate($request -> brand_id);
        $car -> save();
        
        // sync() -> Change the selection not considering the one before
        // attach() -> sum the old selection to the new one
        $car -> pilots() -> sync($request -> pilots_id);
        $car -> save();

        return redirect() -> route('cars.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function destroy(Car $car)
    {
        $car -> deleted = true;
        $car -> save();

        return redirect() -> route('cars.index');
    }
}
