<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{$student->fullname}} Attendance</title>

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

<div class="container-fluid my-5 ">
    <!-- Table -->
    <div class="row mx-auto ">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <div class="card shadow">
                <div class="card-header border-0">
                    <h3 class="mb-0">Attendance for {{$student->fullname}} </h3>
                
                </div>
                <div class="table-responsive">
                    <table class="table align-items-center table-flush">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col">Id</th>
                                <th scope="col">Course Code</th>
                                <th scope="col">Calendar</th>
                                <th scope="col">Attended</th>
                                <th scope="col">Attendance</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($courses as $key => $course)

                            <tr>
                                <td>{{$key + 1}}</td>
                                <td>{{$course["course_code"]}}</td>
                                <td>{{$course["calendar"]}}</td>
                                <td>{{$course["att"]}}</td>
                                <td>

                                    <div class="d-flex align-items-center">
                                        <div class="progress-wrapper">
                                            <div class="progress-info">
                                                <div class="progress-label">
                                                <span>Attedance Record {{$course['attendance']}}%</span>
                                    
                                                </div>
                                                <div class="progress-percentage">
                                                    <span id="progress"></span>
                                                </div>
                                            </div>
                                            <div class="progress">
                                                <div class="progress-bar bg-info" role="progressbar" aria-valuenow="{{$course["attendance"]}}" aria-valuemin="0" aria-valuemax="100" style="width: {{$course["attendance"]}}%;"></div>
                                            </div>
                                        </div>
                                    </div>




                                </td>
                            </tr>
                            @endforeach


                        </tbody>
                    </table>
                </div>

            </div>
        </div>
        <div class="col-md-3"></div>
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