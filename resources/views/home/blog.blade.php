@extends('layouts.home')

@section('title', 'Our blog')
@section('content')



    <div class="container-fluid py-5">
        <div class="container pt-5 pb-3">

            <h1 class="display-4 text-uppercase text-center mb-5">Latest News</h1>
            <div class="row">
                @foreach($data as $rs)
                <div class="col-lg-4 col-md-6 mb-2">
                    <div class="rent-item mb-4">
                        <img class="img-fluid mb-4" src="{{Storage::url($rs->image)}}" alt="" style="width: 100%; height: 200px; object-fit: cover;" >
                        <h4 class="text-uppercase mb-4">{{$rs->title}}</h4>

                        <a class="btn btn-primary px-3" href="{{route('blogdetail',['id'=>$rs->id])}}">Read</a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>


@endsection
