<div class="container-fluid bg-dark py-3 px-lg-5 d-none d-lg-block">
    <div class="row">
        <div class="col-md-6 text-center text-lg-left mb-2 mb-lg-0">
            <div class="d-inline-flex align-items-center">
                <a class="text-body pr-3" href=""><i class="fa fa-phone-alt mr-2"></i>+012 345 6789</a>
                <span class="text-body">|</span>
                <a class="text-body px-3" href=""><i class="fa fa-envelope mr-2"></i>info@example.com</a>
            </div>
        </div>
        <div class="col-md-6 text-center text-lg-right">
            <div class="d-inline-flex align-items-center">
                <a class="text-body px-3" href="">
                    <i class="fab fa-facebook-f"></i>
                </a>
                <a class="text-body px-3" href="">
                    <i class="fab fa-twitter"></i>
                </a>
                <a class="text-body px-3" href="">
                    <i class="fab fa-linkedin-in"></i>
                </a>
                <a class="text-body px-3" href="">
                    <i class="fab fa-instagram"></i>
                </a>
                <a class="text-body pl-3" href="">
                    <i class="fab fa-youtube"></i>
                </a>
            @if(auth()->check())
                @if(auth()->user()->is_admin)
                    <!-- Display admin dashboard link -->
                        <a class="text-body pl-3" href="{{ route('admin.dashboard') }}">Admin Dashboard</a>
                @else
                    <!-- Display user panel link -->
                        <a class="text-body pl-3" href="{{ route('user.panel') }}">My Panel</a>
                @endif
            @endif

            @if(auth()->check())
                <!-- Display logout link if authenticated -->
                    <a class="text-body pl-3" href="{{ route('logout') }}"
                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        Logout
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
            @else
                <!-- Display login link if not authenticated -->
                    <a class="text-body pl-3" href="/login">Login</a>
                @endif
            </div>
            </div>
        </div>
    </div>
</div>
<!-- Topbar End -->


<!-- Navbar Start -->
<div class="container-fluid position-relative nav-bar p-0">
    <div class="position-relative px-lg-5" style="z-index: 9;">
        <nav class="navbar navbar-expand-lg bg-secondary navbar-dark py-3 py-lg-0 pl-3 pl-lg-5">
            <a href="{{route('home')}}" class="navbar-brand">
                <h1 class="text-uppercase text-primary mb-1">Royal Cars</h1>
            </a>
            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-between px-3" id="navbarCollapse">
                <div class="navbar-nav ml-auto py-0">
                    <a href="{{route('home')}}" class="nav-item nav-link active">Home</a>
                    <a href="about.html" class="nav-item nav-link">About</a>
                    <a href="{{route('blog')}}" class="nav-item nav-link">Our Blog</a>

                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Cars</a>
                        <div class="dropdown-menu rounded-0 m-0">
                            <a href="car.html" class="dropdown-item">Car Listing</a>
                            <a href="detail.html" class="dropdown-item">Car Detail</a>
                            <a href="booking.html" class="dropdown-item">Car Booking</a>

                        </div>
                    </div>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Pages</a>
                        <div class="dropdown-menu rounded-0 m-0">
                            <a href="team.html" class="dropdown-item">The Team</a>
                            <a href="testimonial.html" class="dropdown-item">Testimonial</a>
                        </div>
                    </div>
                    <a href="{{route('mail')}}" class="nav-item nav-link">Contact</a>
                </div>
            </div>
        </nav>
    </div>
</div>
<!-- Navbar End -->


<!-- Search Start -->
<div class="container-fluid bg-white pt-3 px-lg-5">
    <div class="row mx-n2">
        <div class="col-xl-2 col-lg-4 col-md-6 px-2">
            <select class="custom-select px-4 mb-3" style="height: 50px;">
                <option selected>Pickup Location</option>
                <option value="1">Location 1</option>
                <option value="2">Location 2</option>
                <option value="3">Location 3</option>
            </select>
        </div>
        <div class="col-xl-2 col-lg-4 col-md-6 px-2">
            <select class="custom-select px-4 mb-3" style="height: 50px;">
                <option selected>Drop Location</option>
                <option value="1">Location 1</option>
                <option value="2">Location 2</option>
                <option value="3">Location 3</option>
            </select>
        </div>
        <div class="col-xl-2 col-lg-4 col-md-6 px-2">
            <div class="date mb-3" id="date" data-target-input="nearest">
                <input type="text" class="form-control p-4 datetimepicker-input" placeholder="Pickup Date"
                       data-target="#date" data-toggle="datetimepicker" />
            </div>
        </div>
        <div class="col-xl-2 col-lg-4 col-md-6 px-2">
            <div class="time mb-3" id="time" data-target-input="nearest">
                <input type="text" class="form-control p-4 datetimepicker-input" placeholder="Pickup Time"
                       data-target="#time" data-toggle="datetimepicker" />
            </div>
        </div>
        <div class="col-xl-2 col-lg-4 col-md-6 px-2">
            <select class="custom-select px-4 mb-3" style="height: 50px;">
                <option selected>Select A Car</option>
                <option value="1">Car 1</option>
                <option value="2">Car 1</option>
                <option value="3">Car 1</option>
            </select>
        </div>
        <div class="col-xl-2 col-lg-4 col-md-6 px-2">
            <button class="btn btn-primary btn-block mb-3" type="submit" style="height: 50px;">Search</button>
        </div>
    </div>
</div>
<!-- Search End -->
