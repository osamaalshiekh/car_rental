@extends('layouts.admin')

@section('content')
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
                        <!-- Default box -->
                        <div class="card-body">

                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th style="width: 10px">#</th>
                                    <th>user Id</th>
                                    <th>Car Id</th>
                                    <th>Pick up date</th>
                                    <th>Return date</th>
                                    <th>Price</th>
                                    <th>total</th>
                                    <th>note</th>
                                    <th>payment status</th>

                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($reservation as $res)
                                    <tr>
                                        <td>{{ $res->id }}</td>
                                        <td>{{ $res->user_id }}</td>
                                        <td>{{ $res->car_id }}</td>
                                        <td>{{ $res->rezDate }}</td>
                                        <td>{{ $res->retDate }}</td>
                                        <td>{{ $res->price }}</td>
                                        <td>{{ $res->total }}</td>
                                        <td>{{ $res->note }}</td>
                                        <td>{{ $res->status }}</td>


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
