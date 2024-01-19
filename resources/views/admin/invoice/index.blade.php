@extends('layouts.admin')

@section('content')


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Fixed Layout</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">Layout</a></li>
                        <li class="breadcrumb-item active">Fixed Layout</li>
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
                    <div class="mt-4">
                        <!-- Add buttons, links, or other elements related to invoice actions -->
                        <a href="{{ route('admin.invoice.create') }}" class="btn btn-primary">Create Invoice</a>
                    </div>
                    <!-- Default box -->
                    <div class="card-body">

                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th style="width: 10px">#</th>
                                <th>Invoice Number</th>
                                <th>Date</th>
                                <th>Client Name</th>
                                <th>Total Amount</th>
                                <th>Action</th>
                            </tr>
                            </thead>

                            <tbody>
                            @foreach ($invoices as $invoice)
                                <tr>
                                    <td>{{ $invoice->id }}</td>
                                    <td>{{ $invoice->invoice_number }}</td>
                                    <td>{{ $invoice->date }}</td>
                                    <td>{{ $invoice->client_name }}</td>
                                    <td>{{ $invoice->total_amount }}</td>
                                    <td>
                                        <a href={{route('admin.invoice.edit',['id'=>$invoice->id ])}} class="btn btn-success" >Edit</a>
                                        <a href={{route('admin.invoice.destroy',['id'=>$invoice->id ])}} class="btn btn-danger" >Delete </a>
                                        <a href={{route('admin.invoice.show',['id'=>$invoice->id ])}} class="btn btn-warning" >Show </a>

                                    </td>
                                </tr>
                            @endforeach
                            </tbody>

                        </table>



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
