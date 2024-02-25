<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Car;
use App\Models\Insurance;
use Illuminate\Http\Request;

class InsuranceController extends Controller
{
    //
    public function index()
    {
        $insurance = Insurance::all();
        return view('admin.insurance.index',compact('insurance'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $car=Car::all();
        return view('admin.insurance.create',compact('car'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {



        
        Insurance::create([
            'car_id' => $request->input('car_id'),
            'start_date' => $request->input('start_date'),
            'end_date' => $request->input('end_date'),
            'status' => $request->input('status'),


        ]);

        // Redirect back to the form with a success message
        return redirect()->route('admin.insurance.index')->with('success', 'insurance post created successfully.');
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
        $car=Car::all();
        $insurance = Insurance::find($id);

        if (!$insurance) {
            abort(404);
        }

        return view('admin.insurance.edit', compact('insurance','car'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Find the insurance record by its ID
        $insurance = Insurance::findOrFail($id);

        // Update the attributes of the insurance record
        $insurance->update([
            'car_id' => $request->input('car_id'),
            'start_date' => $request->input('start_date'),
            'end_date' => $request->input('end_date'),
            'status' => $request->input('status'),
        ]);

        // Redirect back to the form with a success message
        return redirect()->route('admin.insurance.index')->with('success', 'Insurance post updated successfully.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // Find the insurance record by its ID
        $insurance = Insurance::find($id);

        // If the record does not exist, return a response or redirect back with an error message
        if (!$insurance) {
            return redirect()->route('admin.insurance.index')->with('error', 'Insurance post not found.');
        }

        // Delete the insurance record
        $insurance->delete();

        // Redirect back to the index page with a success message
        return redirect()->route('admin.insurance.index')->with('success', 'Insurance post deleted successfully.');
    }

}
