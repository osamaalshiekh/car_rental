@extends('layouts.admin')

@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Add insurance</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item"><a href="#">insurances</a></li>
                            <li class="breadcrumb-item active">Add insurance</li>
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
                                <h3 class="card-title">Add a New insurance</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form action="{{ route('admin.insurance.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="title">car name</label>
                                <select name="car_id" class="select2 form-control custom-select select2-hidden-accessible"  style="width: 100%; height:36px;" data-select2-id="1" tabindex="-1" aria-hidden="true">
                                @foreach($car as $rs)
                                    <option value="{{$rs->id}}" data-select2-id="20">{{$rs->id}}</option>
                                @endforeach
                                </select>
                                </div>
                                    <div class="form-group">
                                    <label for="title">start date</label>
                                    <input type="date" name="start_date" class="form-control" required>
                                </div>

                                <div class="form-group">
                                    <label for="m_title">end date</label>
                                    <input type="date" name="end_date" class="form-control">
                                </div>

                                <select name="status" class="select2 form-control custom-select select2-hidden-accessible"  style="width: 100%; height:36px;" data-select2-id="1" tabindex="-1" aria-hidden="true">
                                    <option data-select2-id="3">Select</option>

                                    <option value="true" data-select2-id="20">true</option>
                                    <option value="false" data-select2-id="21">false</option>


                                </select><span class="select2 select2-container select2-container--default select2-container--below select2-container--focus" dir="ltr" data-select2-id="2" style="width: 100%;"><span class="selection"><span class="select2-selection select2-selection--single" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-labelledby="select2-vump-container"><span class="select2-selection__rendered" id="select2-vump-container" role="textbox" aria-readonly="true" title="Select"></span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>

                                <button type="submit" class="btn btn-primary">Create insurance</button>
                            </form>
                        </div>
                    </div>
@endsection
