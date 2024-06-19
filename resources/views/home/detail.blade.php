@extends('layouts.home')

@section('title', 'Home')

@section('content')



    <div class="container pt-5 pb-3">
        <div class="card mb-3">
            <div class="row g-0">
                <div class="col-md-4">
                    <img src="{{ Storage::url($data->image) }}" class="img-fluid rounded-start"
                         alt="{{ $data->model }}">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h2 class="card-title">{{ $data->model }}</h2>
                        <p class="card-text"><strong>Category:</strong> {{ $data->category_id }}</p>
                        <p class="card-text"><strong>Year:</strong> {{ $data->year }}</p>
                        <p class="card-text"><strong>Price:</strong> ${{ $data->price }} per day</p>
                        <p class="card-text"><strong>Description:</strong> {{ $data->description }}</p>
                        <p class="card-text"><strong>Fuel Type:</strong> {{ $data->fuel_type }}</p>
                        <p class="card-text"><strong>Featured:</strong> {{ $data->is_featured ? 'Yes' : 'No' }}</p>
                        <p class="card-text"><strong>License Plate:</strong> {{ $data->license_plate }}</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="card mb-5">
            <div class="card-header">
                <h2>Booking and Payment Details</h2>
            </div>
            <div class="card-body">
                <form id="payment-form" action="{{ route('create.checkout.session', $data->id) }}" method="POST">
                    @csrf
                    <div class="mb-3 row">
                        <div class="col-md-6">
                            <label for="pickup_date" class="form-label">Pickup Date</label>
                            <input type="date" class="form-control" name="pickup_date" id="pickup_date"
                                   min="{{ date('Y-m-d') }}" required>
                        </div>
                        <div class="col-md-6">
                            <label for="return_date" class="form-label">Return Date</label>
                            <input type="date" class="form-control" name="return_date" id="return_date"
                                   min="{{ date('Y-m-d', strtotime('+1 day')) }}" required>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="total_price" class="form-label">Total Price</label>
                        <input type="text" class="form-control" id="total_price" name="total_price" readonly>
                    </div>
                    @auth
                        @if ($activeReservationExists)
                            <div style="background-color: #f8d7da; padding: 10px;">
                                <span style="color: #721c24;">You already have a reservation.</span>
                            </div>
                        @else
                    <button type="submit" class="btn btn-primary btn-block">Reserve and Pay</button>
                        @endif
                    @else
                        <a href="{{ route('login') }}" class="filled-button">Log in to book</a>

                    @endauth
                </form>
            </div>
        </div>





        <div class="row">
            <div class="col-md-6">
                <h3>Comments</h3>
                @foreach($comments as $comment)
                    @if($comment->type == "COMMENT")
                        <div class="card mb-3">
                            <div class="card-body">
                                <h5 class="card-title">{{ $comment->user->name }}</h5>
                                <h6 class="card-subtitle mb-2 text-muted">
                                    @for($i = 0; $i < $comment->rate; $i++)
                                        <i class="bi bi-star-fill text-warning"></i>
                                    @endfor
                                </h6>
                                <p class="card-text">{{ $comment->subject }}</p>
                                @auth  {{-- Checks if the user is authenticated --}}
                                @php
                                    $isAdminOrModerator = false;
                                    $user = auth()->user();
                                    foreach ($user->roles as $role) {
                                        if ($role['name'] === 'Moderator' || $role['name'] === 'Admin') {
                                            $isAdminOrModerator = true;
                                            break;
                                        }
                                    }
                                @endphp

                                @if(isset($comment->reply))
                                    <div class="card mt-3">
                                        <div class="card-body">
                                            <h6 class="card-subtitle mb-2 text-muted">Reply</h6>
                                            <p class="card-text">{{ $comment->reply->subject }}</p>
                                        </div>
                                    </div>
                                @endif

                                @if(!isset($comment->reply) && $isAdminOrModerator)
                                    <form class="mt-3" method="post" action="{{ route('detail.reply') }}">
                                        @csrf
                                        <input type="text" name="reply" class="form-control mb-2" placeholder="Write a reply...">
                                        <input type="hidden" name="comment_id" value="{{ $comment->id }}">
                                        <input type="hidden" name="car_id" value="{{ $data->id }}">
                                        <button type="submit" class="btn btn-sm btn-primary">Reply</button>
                                    </form>
                                @endif
                                @endauth
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>

            <div class="col-md-6">
                @auth
                    <div class="card mb-3">
                        <div class="card-header">
                            <h3>Add a Comment</h3>
                        </div>
                        <div class="card-body">
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
                                <textarea class="form-control animated" cols="50" id="new-review" name="subject"
                                          placeholder="Enter your review here..." rows="5"></textarea>

                                <div class="rating">
                                    <input type="radio" name="rate" -o empty value="5" id="5"><label for="5">☆</label>
                                    <input type="radio" name="rate" -o empty value="4" id="4"><label for="4">☆</label>
                                    <input type="radio" name="rate" -o empty value="3" id="3"><label for="3">☆</label>
                                    <input type="radio" name="rate" -o empty value="2" id="2"><label for="2">☆</label>
                                    <input type="radio" name="rate" -o empty value="1" id="1"><label for="1">☆</label>

                                </div>

                                <div class="text-right">
                                    <div class="stars starrr" data-rating="0"></div>
                                    <a class="btn btn-danger btn-sm" href="#" id="close-review-box"
                                       style="display:none; margin-right: 10px;">
                                        <span class="glyphicon glyphicon-remove"></span>Cancel</a>
                                    <button class="btn btn-success btn-lg" type="submit">Save</button>
                                </div>
                            </form>
                        </div>
                    </div>
                @endauth
            </div>
        </div>
    </div>

    <script>
        document.getElementById('pickup_date').addEventListener('change', function () {
            var pickupDate = new Date(this.value);
            var returnDate = new Date(pickupDate.getTime() + (24 * 60 * 60 * 1000)); // Add one day
            var returnDateString = returnDate.toISOString().split('T')[0];
            document.getElementById('return_date').setAttribute('min', returnDateString);
        });
    </script>
    <script>
        document.getElementById('pickup_date').addEventListener('change', calculateTotalPrice);
        document.getElementById('return_date').addEventListener('change', calculateTotalPrice);

        function calculateTotalPrice() {
            const pickupDate = new Date(document.getElementById('pickup_date').value);
            const returnDate = new Date(document.getElementById('return_date').value);
            const pricePerDay = {{ $data->price }};
            if (pickupDate && returnDate && returnDate > pickupDate) {
                const timeDifference = returnDate.getTime() - pickupDate.getTime();
                const days = timeDifference / (1000 * 3600 * 24);
                const totalPrice = pricePerDay * days;
                document.getElementById('total_price').value = `$${totalPrice.toFixed(2)}`;
            } else {
                document.getElementById('total_price').value = '';
            }
        }

        document.getElementById('reservation-form').addEventListener('submit', function (event) {
            var pickupDate = new Date(document.getElementById('pickup_date').value);
            var returnDate = new Date(document.getElementById('return_date').value);

            if (returnDate <= pickupDate) {
                alert('The return date must be after the pickup date.');
                event.preventDefault();  // Prevent form submission
            }
        });
    </script>

<style>
    .rating {
        display: flex;
        flex-direction: row-reverse;
        justify-content: center
    }

    .rating > input {
        display: none
    }

    .rating > label {
        position: relative;
        width: 1em;
        font-size: 3vw;
        color: #FFD600;
        cursor: pointer
    }

    .rating > label::before {
        content: "\2605";
        position: absolute;
        opacity: 0
    }

    .rating > label:hover:before,
    .rating > label:hover ~ label:before {
        opacity: 1 !important
    }

    .rating > input:checked ~ label:before {
        opacity: 1
    }

    .rating:hover > input:checked ~ label:before {
        opacity: 0.4
    }

    .special-label::before {
        content: '' !important;
    }
</style>

@endsection
