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
                    <!-- Default box -->
                    <div class="card-body">

                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th style="width: 10px">#</th>
                                <th>name</th>
                                <th>email</th>
                                <th>phone</th>
                                <th>message</th>


                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($data as $rs)
                            <tr>
                                <td>{{ $rs->id }}</td>
                                <td>{{ $rs->name }}</td>
                                <td>{{ $rs->email }}</td>
                                <td>{{ $rs->phone }}</td>
                                <td>{{ $rs->message }}</td>

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
