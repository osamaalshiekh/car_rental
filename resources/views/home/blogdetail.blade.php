@extends('layouts.home')

@section('title', 'Home')

@section('content')


    <div class="container pt-5 pb-3">
        <div class="card mb-3">
            <div class="row g-0">
                <img src="{{ Storage::url($data->image) }}" class="img-fluid rounded-start">

                <div class="col-md-2">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h2 class="card-title">{{ $data->title }}</h2>
                        <p class="card-text" style="font-size: 30px; font-style: oblique"> {{ $data->bcontent }}</p>

                    </div>
                </div>
            </div>
        </div>
    </div>



@endsection
