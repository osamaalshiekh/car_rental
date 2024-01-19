@extends('layouts.admin')

@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Invoice Details</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item"><a href="#">Invoices</a></li>
                            <li class="breadcrumb-item active">Invoice Details</li>
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

                        <div class="card">
                            <button onclick="printPage()">Print Page</button>

                            <div class="card-body">
                                <h2>Invoice Information</h2>

                                <p><strong>Invoice Number:</strong> {{ $invoice->invoice_number }}</p>
                                <p><strong>Date:</strong> {{ $invoice->date }}</p>
                                <p><strong>Client Name:</strong> {{ $invoice->client_name }}</p>
                                <p><strong>Client Email:</strong> {{ $invoice->client_email }}</p>
                                <p><strong>Total Amount:</strong> ${{ $invoice->total_amount }}</p>
                                <p><strong>Due Date:</strong> {{ $invoice->due_date }}</p>
                                <p><strong>Status:</strong> {{ ucfirst($invoice->status) }}</p>

                                <!-- Add more details as needed -->

                                <hr>

                                <h2>Associated Car</h2>

                                @if ($invoice->car)
                                    <p><strong>Car ID:</strong> {{ $invoice->car->id }}</p>
                                    <p><strong>Model:</strong> {{ $invoice->car->model }}</p>
                                    <p><strong>Color:</strong> {{ $invoice->car->color }}</p>
                                @else
                                    <p>No associated car</p>
                                @endif
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
<script>
    function printPage() {
        window.print();
    }
</script>
