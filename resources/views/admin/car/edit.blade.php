@extends('layouts.admin')

@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Edit Car</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item"><a href="#">Cars</a></li>
                            <li class="breadcrumb-item active">Edit Car</li>
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
                                <h3 class="card-title">Edit Car</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form action="{{route('admin.car.update',['id'=>$car->id ])}}" method="post" enctype="multipart/form-data">
                                @csrf

                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="model">Car Model</label>
                                        <input type="text" class="form-control" id="model" name="model" value="{{ old('model', $car->model) }}" placeholder="Enter car model">
                                    </div>
                                    <div class="form-group">
                                        <label for="category">Category</label>
                                        <select class="form-control" id="category" name="category_id">
                                            @foreach($categories as $category)
                                                <option value="{{ $category->id }}" {{ $category->id == $car->category_id ? 'selected' : '' }}>{{ $category->type }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="color">Color</label>
                                        <input type="text" class="form-control" id="color" name="color" value="{{ old('color', $car->color) }}" placeholder="Enter car color">
                                    </div>
                                    <div class="form-group">
                                        <label for="year">Year</label>
                                        <input type="number" class="form-control" id="year" name="year" value="{{ old('year', $car->year) }}" placeholder="Enter car year">
                                    </div>
                                    <div class="form-group">
                                        <label for="price">Price</label>
                                        <input type="text" class="form-control" id="price" name="price" value="{{ old('price', $car->price) }}" placeholder="Enter car price">
                                    </div>
                                    <div class="form-group">
                                        <label for="transmission">Transmission</label>
                                        <input type="text" class="form-control" id="transmission" name="transmission" value="{{ old('transmission', $car->transmission) }}" placeholder="Enter transmission type">
                                    </div>
                                    <div class="form-group">
                                        <label for="mileage">Mileage</label>
                                        <input type="text" class="form-control" id="mileage" name="mileage" value="{{ old('mileage', $car->mileage) }}" placeholder="Enter car mileage">
                                    </div>
                                    <div class="form-group">
                                        <label for="fuel_type">Fuel Type</label>
                                        <input type="text" class="form-control" id="fuel_type" name="fuel_type" value="{{ old('fuel_type', $car->fuel_type) }}" placeholder="Enter fuel type">
                                    </div>
                                    <div class="form-group">
                                        <label for="engine_size">License plate</label>
                                        <input type="text" class="form-control" id="engine_size" name="engine_size" value="{{ old('license_plate', $car->license_plate) }}" placeholder="Enter license plate">
                                    </div>
                                    <div class="form-group">
                                        <label for="description">Description</label>
                                        <textarea class="form-control" id="description" name="description" placeholder="Enter car description">{{ old('description', $car->description) }}</textarea>
                                    </div>
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="availability" name="availability" {{ $car->availability ? 'checked' : '' }}>
                                        <label class="form-check-label" for="availability">Available</label>
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
