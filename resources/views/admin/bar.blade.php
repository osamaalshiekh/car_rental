<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{route('admin.index')}}" class="brand-link">

        <span class="brand-text font-weight-light">ADMIN PANEL</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user (optional) -->


        <!-- SidebarSearch Form -->
        <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="{{route('admin.category.index')}}" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Categories

                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('admin.car.index')}}" class="nav-link">
                        <i class="nav-icon fas fa-car"></i>
                        <p>
                            Cars
                            <span class="right badge badge-danger"></span>
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{route('admin.reservation.index')}}" class="nav-link">
                        <i class="nav-icon fas fa-lock"></i>
                        <p>
                            Reservations
                            <span class="right badge badge-danger"></span>
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('admin.blog.index')}}" class="nav-link">
                        <i class="nav-icon fas fa-book"></i>
                        <p>
                            Blog
                            <span class="right badge badge-danger"></span>
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('admin.message.index')}}" class="nav-link">
                        <i class="nav-icon fas fa-paper-plane"></i>
                        <p>
                            Message
                            <span class="right badge badge-danger"></span>
                        </p>
                    </a>
                </li> <li class="nav-item">
                    <a href="{{route('admin.invoice.index')}}" class="nav-link">
                        <i class="nav-icon fas fa-money-bill"></i>
                        <p>
                            invoice
                            <span class="right badge badge-danger"></span>
                        </p>
                    </a>
                </li>

                </li> <li class="nav-item">
                    <a href="{{route('admin.insurance.index')}}" class="nav-link">
                        <i class="nav-icon fas fa-lock"></i>
                        <p>
                            insurance
                            <span class="right badge badge-danger"></span>
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('admin.setting.index')}}" class="nav-link">
                        <i class="nav-icon fas fa-edit"></i>
                        <p>
                            Setting
                            <span class="right badge badge-danger"></span>
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('admin.roles.index')}}" class="nav-link">
                        <i class="nav-icon fas fa-user"></i>
                        <p>
                            Roles
                            <span class="right badge badge-danger"></span>
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('admin.faq.index')}}" class="nav-link">
                        <i class="nav-icon fas fa-user"></i>
                        <p>
                            FAQ
                            <span class="right badge badge-danger"></span>
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
