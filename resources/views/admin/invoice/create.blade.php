@extends('layouts.admin')

@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Create Invoice</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item"><a href="#">Invoices</a></li>
                            <li class="breadcrumb-item active">Create Invoice</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">

            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <!-- Default box -->
                        <div class="card">
                            <div class="card-body">
                                <form action="{{ route('admin.invoice.store') }}" method="post">
                                    @csrf

                                    <!-- Add your form fields here -->
                                    <div class="form-group">
                                        <label for="invoice_number">Invoice Number</label>
                                        <input type="text" name="invoice_number" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="car_id">Select Car</label>
                                        <select name="car_id" class="form-control" required>
                                            <option value="" disabled selected>Select a car</option>
                                            @foreach ($cars as $car)
                                                <option value="{{ $car->id }}">{{ $car->model }} - {{ $car->color }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="date">Date</label>
                                        <input type="date" name="date" class="form-control" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="client_name">Client Name</label>
                                        <input type="text" name="client_name" class="form-control" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="client_email">Client Email</label>
                                        <input type="email" name="client_email" class="form-control" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="total_amount">Total Amount</label>
                                        <input type="number" name="total_amount" class="form-control" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="due_date">Due Date</label>
                                        <input type="date" name="due_date" class="form-control" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="status">Status</label>
                                        <select name="status" class="form-control" required>
                                            <option value="draft">Draft</option>
                                            <option value="sent">Sent</option>
                                            <option value="paid">Paid</option>
                                        </select>
                                    </div>

                                    <!-- Add more form fields as needed -->

                                    <button type="submit" class="btn btn-primary">Create Invoice</button>
                                </form>
                            </div>
                        </div>
                        <!-- /.card -->
                    </div>
                </div>
            </div>
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
