@extends('layouts.app')

@section('routename')
{{$student->fullname}}
@endsection


@section('content')
<div class="container-fluid mt--7">
    <!-- Table -->
    <div class="row">
        <div class="col">
            <div class="card shadow">
                <div class="card-header border-0">
                    <h3 class="mb-0">User Attendance</h3>
                <a class="btn btn-success float-right " href="{{ url('send-attendance',array(encrypt($student->id)))}}">Send To Parent</a>
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
    </div>




    @endsection