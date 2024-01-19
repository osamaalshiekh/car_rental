<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Car;
use App\Models\Invoice;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $invoices= Invoice::all();
        return view(  'admin.invoice.index',compact('invoices'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $cars = Car::all();
        return view(  'admin.invoice.create', compact('cars'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the form data
        $validatedData = $request->validate([
            'invoice_number' => 'required|unique:invoices',
            'date' => 'required|date',
            'client_name' => 'required',
            'client_email' => 'required|email',
            'total_amount' => 'required|numeric',
            'due_date' => 'required|date',
            'status' => 'required|in:draft,sent,paid',
            'car_id' => 'required|exists:cars,id', // Make sure the selected car exists in the cars table
        ]);

        // Create a new invoice instance and fill it with the validated data
        $invoice = new Invoice($validatedData);

        // Save the invoice to the database
        $invoice->save();

        // Redirect to a success page or wherever you'd like
        return redirect()->route('admin.invoice.index')->with('success', 'Invoice created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $invoice = Invoice::findOrFail($id);
        $car = $invoice->car;

        return view('admin.invoice.show', compact('invoice', 'car'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
