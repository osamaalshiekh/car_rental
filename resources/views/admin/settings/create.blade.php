@extends('layouts.admin')

@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Add Car</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item"><a href="#">Cars</a></li>
                            <li class="breadcrumb-item active">Add Car</li>
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
                                <h3 class="card-title">Add a New Car</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form action="{{ route('admin.car.store') }}" method="POST">
                                @csrf
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="model">Car Model</label>
                                        <input type="text" class="form-control" id="model" name="model"
                                               placeholder="Enter car model">
                                    </div>
                                    <div class="form-group">
                                        <label for="category">Category</label>
                                        <select class="form-control" id="category" name="category_id">
                                            @foreach($categories as $category)
                                                <option value="{{ $category->id }}">{{ $category->type }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="color">Color</label>
                                        <input type="text" class="form-control" id="color" name="color"
                                               placeholder="Enter car color">
                                    </div>
                                    <div class="form-group">
                                        <label for="year">Year</label>
                                        <input type="number" class="form-control" id="year" name="year"
                                               placeholder="Enter car year">
                                    </div>
                                    <div class="form-group">
                                        <label for="price">Price</label>
                                        <input type="text" class="form-control" id="price" name="price"
                                               placeholder="Enter car price">
                                    </div>

                                    <!-- Add more fields for other attributes -->
                                    <div class="form-group">
                                        <label for="transmission">Transmission</label>
                                        <input type="text" class="form-control" id="transmission" name="transmission"
                                               placeholder="Enter transmission type">
                                    </div>
                                    <div class="form-group">
                                        <label for="mileage">Mileage</label>
                                        <input type="text" class="form-control" id="mileage" name="mileage"
                                               placeholder="Enter car mileage">
                                    </div>
                                    <div class="form-group">
                                        <label for="fuel_type">Fuel Type</label>
                                        <input type="text" class="form-control" id="fuel_type" name="fuel_type"
                                               placeholder="Enter fuel type">
                                    </div>
                                    <div class="form-group">
                                        <label for="license_plate">license plate</label>
                                        <input type="text" class="form-control" id="license_plate" name="license_plate"
                                               placeholder="Enter license plate">
                                    </div>
                                    <div class="form-group">
                                        <label for="description">Description</label>
                                        <textarea class="form-control" id="description" name="description"
                                                  placeholder="Enter car description"></textarea>
                                    </div>
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="availability"
                                               name="availability" checked>
                                        <label class="form-check-label" for="availability">Available</label>
                                    </div>
                                </div>
                                <!-- /.card-body -->


                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Submit</button>
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
