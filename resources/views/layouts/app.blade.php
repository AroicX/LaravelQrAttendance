<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <!-- Styles -->
    {{-- <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="{{ asset('js/app.js') }}" defer></script> --}}

    <!-- Fonts -->
    {{-- <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet"> --}}

    <!-- Favicon -->
    <link href="./argon/img/brand/favicon.png" rel="icon" type="image/png">
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
    <!-- Icons -->
    <link href="../argon/js/plugins/nucleo/css/nucleo.css" rel="stylesheet" />
    <link href="../argon/js/plugins/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet" />
    <!-- CSS Files -->
    <link href="../argon/css/argon-dashboard.css?v=1.1.1" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
    <link rel="stylesheet" href="{{ asset('/css/select2.min.css') }}">
    @yield('css')
</head>

<body>
    <div id="app">


        @include('layouts.sidebar')
        <div class="main-content">
            <!-- Navbar -->
            <nav class="navbar navbar-top navbar-expand-md navbar-dark" id="navbar-main">
                <div class="container-fluid">
                    <!-- Brand -->
                    <a class="h4 mb-0 text-white text-uppercase d-none d-lg-inline-block"
                        href="/home">
                        @yield('routename')
                    </a>
                    <!-- Form -->
                    <form class="navbar-search navbar-search-dark form-inline mr-3 d-none d-md-flex ml-lg-auto">
                        <div class="form-group mb-0">
                            <div class="input-group input-group-alternative">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-search"></i></span>
                                </div>
                                <input class="form-control" placeholder="Search" type="text">
                            </div>
                        </div>
                    </form>
                    <!-- User -->
                    <ul class="navbar-nav align-items-center d-none d-md-flex">
                        <li class="nav-item dropdown">
                            <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true"
                                aria-expanded="false">
                                <div class="media align-items-center">
                                    <span class="avatar avatar-sm rounded-circle">
                                        <img alt="Image placeholder" src="./argon/img/theme/team-4-800x800.jpg">
                                    </span>
                                    <div class="media-body ml-2 d-none d-lg-block">
                                        <span class="mb-0 text-sm  font-weight-bold">{{Auth::User()->name}}</span>
                                    </div>
                                </div>
                            </a>
                            <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
                                <div class=" dropdown-header noti-title">
                                    <h6 class="text-overflow m-0">Welcome!</h6>
                                </div>
                                <a href="/profile" class="dropdown-item">
                                    <i class="ni ni-single-02"></i>
                                    <span>My profile</span>
                                </a>
                                {{-- <a href="./examples/profile.html" class="dropdown-item">
                                    <i class="ni ni-settings-gear-65"></i>
                                    <span>Settings</span>
                                </a>
                                <a href="./examples/profile.html" class="dropdown-item">
                                    <i class="ni ni-calendar-grid-58"></i>
                                    <span>Activity</span>
                                </a>
                                <a href="./examples/profile.html" class="dropdown-item">
                                    <i class="ni ni-support-16"></i>
                                    <span>Support</span>
                                </a> --}}
                                <div class="dropdown-divider"></div>
                                <a href="{{ route('logout') }}" class="dropdown-item" 
                                  onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        <i class="ni ni-user-run"></i>
                                        {{ __('Logout') }}
                              
                                  
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                        style="display: none;">
                                        @csrf
                                    </form>
                                </a>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
            <!-- End Navbar -->
            <!-- Header -->
            <div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
                <div class="container-fluid">
                    <div class="header-body">
                        <!-- Card stats -->
                        <div class="row">
                            <div class="col-xl-6 col-lg-6">
                            <a href="{{ route('courses')}}">
                                <div class="card card-stats mb-4 mb-xl-0">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col">
                                                <h5 class="card-title text-uppercase text-muted mb-0">Courses</h5>
                                            <span class="h2 font-weight-bold mb-0">
                                                <?php
                                                    $item = json_decode(Auth::User()->courses);
                                                if($item){
                                                    echo count($item);

                                                }
                                                ?>
                                            </span>
                                            </div>
                                            <div class="col-auto">
                                                <div class="icon icon-shape bg-danger text-white rounded-circle shadow">
                                                    <i class="fas fa-chart-bar"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <p class="mt-3 mb-0 text-muted text-sm">
                                            {{-- <span class="text-success mr-2"><i class="fa fa-arrow-up"></i> 3.48%</span> --}}
                                            <span class="text-nowrap">Add Your Course</span>
                                        </p>
                                    </div>
                                </div>
                              </a>
                            </div>
                            <div class="col-xl-6 col-lg-6">
                                <div class="card card-stats mb-4 mb-xl-0">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col">
                                                <h5 class="card-title text-uppercase text-muted mb-0">Students</h5>
                                            <span class="h2 font-weight-bold mb-0">{{ count(\App\Student::all()) }}</span>
                                            </div>
                                            <div class="col-auto">
                                                <div
                                                    class="icon icon-shape bg-warning text-white rounded-circle shadow">
                                                    <i class="fas fa-users"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <p class="mt-3 mb-0 text-muted text-sm">
                                            {{-- <span class="text-danger mr-2"><i class="fas fa-arrow-down"></i>
                                                3.48%</span>
                                            <span class="text-nowrap">Since last week</span> --}}
                                        </p>
                                    </div>
                                </div>
                            </div>
                            {{-- <div class="col-xl-3 col-lg-6">
                                <div class="card card-stats mb-4 mb-xl-0">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col">
                                                <h5 class="card-title text-uppercase text-muted mb-0">Sales</h5>
                                                <span class="h2 font-weight-bold mb-0">924</span>
                                            </div>
                                            <div class="col-auto">
                                                <div class="icon icon-shape bg-yellow text-white rounded-circle shadow">
                                                    <i class="fas fa-users"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <p class="mt-3 mb-0 text-muted text-sm">
                                            <span class="text-warning mr-2"><i class="fas fa-arrow-down"></i>
                                                1.10%</span>
                                            <span class="text-nowrap">Since yesterday</span>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-6">
                                <div class="card card-stats mb-4 mb-xl-0">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col">
                                                <h5 class="card-title text-uppercase text-muted mb-0">Performance</h5>
                                                <span class="h2 font-weight-bold mb-0">49,65%</span>
                                            </div>
                                            <div class="col-auto">
                                                <div class="icon icon-shape bg-info text-white rounded-circle shadow">
                                                    <i class="fas fa-percent"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <p class="mt-3 mb-0 text-muted text-sm">
                                            <span class="text-success mr-2"><i class="fas fa-arrow-up"></i> 12%</span>
                                            <span class="text-nowrap">Since last month</span>
                                        </p>
                                    </div>
                                </div>
                            </div> --}}
                        </div>
                    </div>
                </div>
            </div>
            @yield('content')
        </div>
    </div>

    <script src="../argon/js/plugins/jquery/dist/jquery.min.js"></script>
    <script src="../argon/js/plugins/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <!--   Optional JS   -->
    <script src="../argon/js/plugins/chart.js/dist/Chart.min.js"></script>
    <script src="../argon/js/plugins/chart.js/dist/Chart.extension.js"></script>
    <!--   Argon JS   -->
    <script src="./argon/js/argon-dashboard.min.js?v=1.1.1"></script>
    <script src="https://cdn.trackjs.com/agent/v3/latest/t.js"></script>
    <script src="{{ asset('/js/select2.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

    @yield('js')

</body>

</html>