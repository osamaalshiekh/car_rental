@extends('layouts.home')

@section('content')
    <div class="container">
        <h1>Welcome to Your Panel, {{ Auth::user()->name }}!</h1>

        <!-- Display success messages if any -->
        @if(session('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
    @endif

    <!-- Nav tabs -->
        <ul class="nav nav-tabs" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="messages-tab" data-toggle="tab" href="#messages" role="tab" aria-controls="messages" aria-selected="true">My Messages</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="orders-tab" data-toggle="tab" href="#orders" role="tab" aria-controls="orders" aria-selected="false">My Orders</a>
            </li>
            </li><li class="nav-item">
                <a class="nav-link" id="old-tab" data-toggle="tab" href="#old" role="tab" aria-controls="old" aria-selected="false">old reservations</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="account-tab" data-toggle="tab" href="#account" role="tab" aria-controls="account" aria-selected="false">Account Settings</a>

        </ul>

        <!-- Tab panes -->
        <div class="tab-content">
            <!-- Section 1: My Messages -->
            <div class="tab-pane fade show active" id="messages" role="tabpanel" aria-labelledby="messages-tab">
                <h2>My Messages</h2>
                @if($messages->isEmpty())
                    <p>No messages available.</p>
                @else
                    <ul>
                        @foreach($messages as $message)
                            <li>{{ $message->message }}</li>
                        @endforeach
                    </ul>
                @endif            </div>

            <!-- Section 2: My Orders -->
            <div class="tab-pane fade" id="orders" role="tabpanel" aria-labelledby="orders-tab">
                <h2>My Orders</h2>
                @forelse($reservation->where('status', 'active') as $reservation)
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>Car ID</th>
                                <th>Car Details</th>
                                <th>Pickup Date</th>
                                <th>Return Date</th>
                                <th>Total Days</th>
                                <th>Total Price</th>
                                <th>Payment Status</th>
                                <th>Status</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>{{ $reservation->car_id }}</td>
                                <td><a href="{{ route('detail', ['pid' => $reservation->car_id]) }}">View Car</a></td>
                                <td>{{ $reservation->rezDate }}</td>
                                <td>{{ $reservation->retDate }}</td>
                                <td>{{ $reservation->days }}</td>
                                <td>${{ number_format($reservation->total, 2) }}</td>
                                <td>{{ $reservation->payment_status }}</td>
                                <td>{{ $reservation->status }}</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                @empty
                    <p>No reservations found.</p>
                @endforelse
            </div>
            <div class="tab-pane fade" id="old" role="tabpanel" aria-labelledby="old-tab">
              <h2>Old Reservations</h2>
             @forelse($reservation->where('status', 'completed') as $res)
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>Car ID</th>
                            <th>Car Details</th>
                            <th>Pickup Date</th>
                            <th>Return Date</th>
                            <th>Total Days</th>
                            <th>Total Price</th>
                            <th>Payment Status</th>
                            <th>Status</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>{{ $res->car_id }}</td>
                            <td><a href="{{ route('detail', ['pid' => $res->car_id]) }}">View Car</a></td>
                            <td>{{ $res->rezDate }}</td>
                            <td>{{ $res->retDate }}</td>
                            <td>{{ $res->days }}</td>
                            <td>${{ number_format($res->total, 2) }}</td>
                            <td>{{ $res->payment_status }}</td>
                            <td>{{ $res->status }}</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
             @empty
                <p>No old reservations found.</p>
             @endforelse
            </div>

            <!-- Section 3: Account Settings -->
            <div class="tab-pane fade" id="account" role="tabpanel" aria-labelledby="account-tab">
                <h2>Account Settings</h2>

                <!-- Laravel built-in email change form -->
                <div>
                    <h3>Change Email</h3>
                    <form method="POST" action="{{ route('user.update.email') }}">
                        @csrf
                        <label for="email">New Email:</label>
                        <input type="email" name="email" value="{{ Auth::user()->email }}" required>
                        <button type="submit">Update Email</button>
                    </form>
                </div>

                <!-- Laravel built-in password change form -->
                <div>
                    <h3>Change Password</h3>
                    <form method="POST" action="{{ route('user.update.password') }}">
                        @csrf
                        <label for="current_password">Current Password:</label>
                        <input type="password" name="current_password" required>
                        <label for="password">New Password:</label>
                        <input type="password" name="password" required>
                        <label for="password_confirmation">Confirm New Password:</label>
                        <input type="password" name="password_confirmation" required>
                        <button type="submit">Update Password</button>
                    </form>

                    @error('current_password')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div>
    </div>
@endsection
