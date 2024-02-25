@extends('layouts.home')

@section('title', 'Home')
@section('content')

    <div class="container pt-5 pb-3">
    <h1>{{$data->model}}</h1>
        <h1>{{$data->category_id}}</h1>
        <h1>{{$data->year}}</h1>
        <h1>{{$data->price}}</h1>
        <h1>{{$data->year}}</h1>
        <h1>{{$data->description}}</h1>
        <h1>{{$data->fuel_type}}</h1>
        <h1>{{$data->is_featured}}</h1>
        <h1>{{$data->license_plate}}</h1>

    </div>












@endsection
