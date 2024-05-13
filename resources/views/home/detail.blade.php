@extends('layouts.home')

@section('title', 'Home')
@section('content')

    <div class="container pt-5 pb-3">
        <h1>{{$data->model}}</h1>
        <h1>{{$data->category_id}}</h1>
        <h1>{{$data->year}}</h1>
        <img src="{{Storage::url($data->image) }}"  style="height: 200px">
        <h1>{{$data->price}}</h1>
        <h1>{{$data->year}}</h1>
        <h1>{{$data->description}}</h1>
        <h1>{{$data->fuel_type}}</h1>
        <h1>{{$data->is_featured}}</h1>
        <h1>{{$data->license_plate}}</h1>
    </div>
    <br>
    <br>
    <style>
        .rating {
            display: flex;
            flex-direction: row-reverse;
            justify-content: center
        }

        .rating>input {
            display: none
        }

        .rating>label {
            position: relative;
            width: 1em;
            font-size: 3vw;
            color: #FFD600;
            cursor: pointer
        }

        .rating>label::before {
            content: "\2605";
            position: absolute;
            opacity: 0
        }

        .rating>label:hover:before,
        .rating>label:hover~label:before {
            opacity: 1 !important
        }

        .rating>input:checked~label:before {
            opacity: 1
        }

        .rating:hover>input:checked~label:before {
            opacity: 0.4
        }
        .special-label::before{
            content: '' !important;
        }
    </style>
    <div class="container-fluid pb-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <h2 class="mb-4">Booking Detail</h2>
                    <form action="#" method="POST">
                        <div class="mb-5">
                            <div class="row">
                                <div class="col-6 form-group">
                                    <div class="date" id="date2" data-target-input="nearest">
                                        <input type="date" class="form-control p-4 datetimepicker-input" name="pickup_date" id="pickup_date" placeholder="Pickup Date" min="<?php echo date('Y-m-d'); ?>">
                                    </div>
                                </div>
                                <div class="col-6 form-group">
                                    <div class="date" id="date3" data-target-input="nearest">
                                        <input type="date" class="form-control p-4 datetimepicker-input" name="return_date" id="return_date" placeholder="Return Date" min="<?php echo date('Y-m-d', strtotime('+1 day')); ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-block btn-primary py-3">Reserve Now</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-lg-4">
                    <div class="bg-secondary p-5 mb-5">
                        <h2 class="text-primary mb-4">Payment</h2>
                        <div class="form-group">
                            <div class="custom-control custom-radio">
                                <input type="radio" class="custom-control-input" name="payment" id="paypal">
                                <label class="custom-control-label" for="paypal">Paypal</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="custom-control custom-radio">
                                <input type="radio" class="custom-control-input" name="payment" id="directcheck">
                                <label class="custom-control-label" for="directcheck">Direct Check</label>
                            </div>
                        </div>
                        <div class="form-group mb-4">
                            <div class="custom-control custom-radio">
                                <input type="radio" class="custom-control-input" name="payment" id="banktransfer">
                                <label class="custom-control-label" for="banktransfer">Bank Transfer</label>
                            </div>
                        </div>
                        <button class="btn btn-block btn-primary py-3">Reserve Now</button>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    @foreach($comments as $comment)
                        @if($comment->type=="COMMENT")
                        <div class="col-12" style="margin-top:15px">
                            <article class="card bg-light">
                                <header class="card-header border-0 bg-transparent d-flex align-items-center">
                                    <div>
                                        <a class="fw-semibold text-decoration-none">{{$comment->user->name}}</a>
                                        <span class="ms-3 small text-muted">
                                            @for($i=0;$i<$comment->rate;$i++)
                                            <label style="color:#ff8800;font-weight: 900">☆</label>
                                            @endfor
                                        </span>
                                    </div>
                                    <div class="dropdown ms-auto">
                                        <button class="btn btn-link text-decoration-none" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="bi bi-three-dots-vertical"></i>
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="#">Report</a></li>
                                        </ul>
                                    </div>
                                </header>
                                <div class="card-body py-2 px-3">
                                    {{$comment->subject}}
                                </div>
                                @php
                                    $isAdminOrModerator = false;
                                    foreach(auth()->user()->roles as $role) {
                                        if ($role['name'] === 'Moderator' || $role['name'] === 'Admin') {
                                            $isAdminOrModerator = true;
                                            break;
                                        }
                                    }
                                @endphp
                                @auth
                                    <footer class="card-footer bg-white border-0 p-3">
                                        {{$comment?->reply?->subject}}
                                    </footer>

                                    </footer>


                                @if(!isset($comment?->reply) && $isAdminOrModerator)

                                <form class="card-footer bg-white border-0 p-3" method="post" action="{{route('detail.reply')}}">
                                    @csrf
                                    <input type="text" name="reply" class="form-control" >
                                    <input type="hidden" name="comment_id" class="form-control" value="{{$comment->id}}">
                                    <input type="hidden" name="car_id" class="form-control" value="{{$data->id}}">
                                    <button
                                        type="submit"
                                        class="btn btn-link btn-sm text-decoration-none"
                                    >
                                        Reply
                                    </button>

                                </form>
                                    @endif
                                    @endauth
                            </article>
                        </div>
                        @endif
                    @endforeach
                </div>
                <div class="col-md-6">
                    @auth
                        <div class="col-md-12">
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <form accept-charset="UTF-8" action="{{route('detail.comment')}}" method="post">
                                @csrf
                                <input name="car_id" type="hidden" value="{{$data->id}}">
                                <textarea class="form-control animated" cols="50" id="new-review" name="subject" placeholder="Enter your review here..." rows="5"></textarea>
                                <div class="rating"  >
                                    <input type="radio"  name="rate"  -o empty value="5" id="5"  ><label for="5">☆</label>
                                    <input type="radio"  name="rate"  -o empty value="4" id="4" ><label for="4">☆</label>
                                    <input type="radio"  name="rate"  -o empty value="3" id="3" ><label for="3">☆</label>
                                    <input type="radio"  name="rate"  -o empty value="2" id="2" ><label for="2">☆</label>
                                    <input type="radio"  name="rate" -o empty value="1" id="1" ><label for="1">☆</label>
                                    <label class="special-label" style="color: #0b0b0b;margin-right: 75px;font-size:xx-large" > Rating </label>
                                </div>
                                <div class="text-right">
                                    <div class="stars starrr" data-rating="0"></div>
                                    <a class="btn btn-danger btn-sm" href="#" id="close-review-box" style="display:none; margin-right: 10px;">
                                        <span class="glyphicon glyphicon-remove"></span>Cancel</a>
                                    <button class="btn btn-success btn-lg" type="submit">Save</button>
                                </div>
                            </form>
                        </div>
                    @endauth
                </div>
            </div>

        </div>
    </div>



    <script>
        document.getElementById('pickup_date').addEventListener('change', function() {
            var pickupDate = new Date(this.value);
            var returnDate = new Date(pickupDate.getTime() + (24 * 60 * 60 * 1000)); // Add one day

            var returnDateString = returnDate.toISOString().split('T')[0];
            document.getElementById('return_date').setAttribute('min', returnDateString);
        });
    </script>

@endsection
