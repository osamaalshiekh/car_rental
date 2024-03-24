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
    <br>
    <br>
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
