@extends('layouts.admin')

@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Edit insurance</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item"><a href="#">Insurances</a></li>
                            <li class="breadcrumb-item active">Edit insurance</li>
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
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Edit insurance</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form action="{{route('admin.insurance.update',['id'=>$insurance->id ])}}" method="post" enctype="multipart/form-data">
                                @csrf


                                <div class="card-body">
                                    <select name="car_id" class="select2 form-control custom-select select2-hidden-accessible"  style="width: 100%; height:36px;" data-select2-id="1" tabindex="-1" aria-hidden="true">
                                        @foreach($car as $rs)
                                            <option value="{{$rs->id}}" data-select2-id="20">{{$rs->id}}</option>
                                        @endforeach
                                    </select>

                                    <div class="form-group">
                                        <label for="color">start date</label>
                                        <input type="date" class="form-control" id="color" name="start_date" value="{{ old('color', $insurance->start_date) }}" placeholder="Enter car color">
                                    </div>
                                    <div class="form-group">
                                        <label for="year">end date</label>
                                        <input type="date" class="form-control" id="year" name="end_date" value="{{ old('year', $insurance->end_date) }}" placeholder="Enter car year">
                                    </div>
                                    <div class="form-group">
                                        <label for="status">status</label>
                                        <select name="status" class="select2 form-control custom-select select2-hidden-accessible"  style="width: 100%; height:36px;" data-select2-id="1" tabindex="-1" aria-hidden="true">
                                            <option  data-select2-id="20">{{$insurance->status}}</option>
                                            <option  data-select2-id="20">true</option>
                                            <option  data-select2-id="20">false</option>
                                        </select>
                                    </div>
                                </div>
                                <!-- /.card-body -->

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </div>
                            </form>

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
