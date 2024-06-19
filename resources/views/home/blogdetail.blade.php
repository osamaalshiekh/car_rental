@extends('layouts.home')

@section('title', 'Home')

@section('content')


    <div class="container pt-5 pb-3">
        <div class="card mb-3">
            <div class="row g-0">
                <div class="col-md-4">
                    <img src="{{ Storage::url($data->image) }}" class="img-fluid rounded-start">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h2 class="card-title">{{ $data->title }}</h2>
                        <h3 class="card-text"> {{ $data->bcontent }}</h3>

                    </div>
                </div>
            </div>
        </div>
    </div>



@endsection
