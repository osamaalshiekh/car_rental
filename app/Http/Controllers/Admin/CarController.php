<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Car;
use App\Models\Category;

use Illuminate\Http\Request;

class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $cars= Car::all();
        return view(  'admin.car.index',compact('cars'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all(); // Fetch all categories from the database

        return view(  'admin.car.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $cars= new Car();
        $cars->model = $request->model;
        $cars->category_id = $request->category_id;
        $cars->color = $request->color;
        $cars->year = $request->year;
        $cars->price = $request->price;
        $cars->availability = $request->has('availability') ? true : false;
        $cars->transmission = $request->transmission;
        $cars->mileage = $request->mileage;
        $cars->fuel_type = $request->fuel_type;
        $cars->license_plate = $request->license_plate;
        $cars->description = $request->description;

        $cars->save();
        return redirect(to:'admin/car');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $car = Car::find($id);
        $categories = Category::all();
        return view('admin.car.edit', compact('car', 'categories'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $cars= Car::find($id);
        $cars->model = $request->model;
        $cars->category_id = $request->category_id;
        $cars->color = $request->color;
        $cars->year = $request->year;
        $cars->price = $request->price;
        $cars->availability = $request->has('availability') ? true : false;
        $cars->transmission = $request->transmission;
        $cars->mileage = $request->mileage;
        $cars->fuel_type = $request->fuel_type;
        $cars->license_plate = $request->license_plate;
        $cars->description = $request->description;

        $cars->save();
        return redirect(to:'admin/car');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data= Car::find($id);
        $data->delete();
        return view('admin.car.index');
}
}
