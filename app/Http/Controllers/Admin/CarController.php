<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Car;
use App\Models\Category;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

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
        if ($request->file('image')) {
            $cars->image = $request->file('image')->store('car_images', 'public');
        }
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
    public function show(string $carId)
    {

        $car =Car::find($carId);

        if (!$car) {
            abort(404, 'Car not found');
        }

        $qrCodeContent = "Car ID: $car->id, Model: $car->model, Color: $car->color";

        $qrCode = QrCode::size(300)->generate($qrCodeContent);

        // Return the view with the QR code
        return view('admin.car.show', compact('car', 'qrCode','qrCodeContent'));

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
        if ($request->file('image')) {
            $cars->image = $request->file('image')->store('car_images', 'public');
        }
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

    public function destroy($id)
    {
        DB::transaction(function () use ($id) {
            $car = Car::with('comments.replies')->find($id);
            if (!$car) {
                return redirect()->route('admin.car.index')->with('error', 'Car not found');
            }

            // Recursively delete all comments and their replies
            $this->deleteComments($car->comments);

            // Delete the car
            $car->delete();
        });

        return redirect()->route('admin.car.index')->with('success', 'Car deleted successfully');
    }

    protected function deleteComments($comments)
    {
        foreach ($comments as $comment) {
            if ($comment->replies) {
                $this->deleteComments($comment->replies);
            }
            $comment->delete();
        }
}
}
