@extends('layouts.app')

@section('routename')
View Attendance
@endsection


@section('content')
<div class="container-fluid mt--7">
    <!-- Table -->
    <div class="row">
        <div class="col">
            <div class="card shadow">
                <div class="card-header border-0">
                <h3 class="mb-0">View Attendance for {{$cal->day}} - {{$cal->date}}</h3>
                </div>
                <div class="table-responsive">
                    <table class="table align-items-center table-flush">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col">Id</th>
                                <th scope="col">Fullname</th>
                                <th scope="col">Email</th>

                                <th scope="col">Matric No</th>
                                <th scope="col">Level</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($att as $key => $user)
                            <tr>
                                <th scope="row">
                                    {{$key+1}}
                                </th>
                                <td>
                                    {{$user->student->fullname}}
                                </td>
                                <td>
                                    {{$user->student->email}}
                                </td>

                                <td>
                                    {{$user->student->matric_no}}

                                </td>
                                <td>
                                    {{$user->student->level}}

                                </td>
                                <td class="text-right">
                                    <div class="dropdown">
                                        <a class="btn btn-sm btn-icon-only text-light" href="#" role="button"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fas fa-ellipsis-v"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                            <a class="dropdown-item" href="#" onclick="view({{$user->student->id}})">View
                                                profile</a>
                                            <a class="dropdown-item "
                                                href="{{ url('get-attendance',array($user->student->id))}}"
                                                target="_blank">Attendance</a>
                                            <a class="dropdown-item disabled" href="#">Disable</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
                <div class="card-footer py-4">
                    <nav aria-label="...">
                        <ul class="pagination justify-content-end mb-0">
                            <li class="page-item disabled">
                                <a class="page-link" href="#" tabindex="-1">
                                    <i class="fas fa-angle-left"></i>
                                    <span class="sr-only">Previous</span>
                                </a>
                            </li>
                            <li class="page-item active">
                                <a class="page-link" href="#">1</a>
                            </li>
                            <li class="page-item">
                                <a class="page-link" href="#">2 <span class="sr-only">(current)</span></a>
                            </li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item">
                                <a class="page-link" href="#">
                                    <i class="fas fa-angle-right"></i>
                                    <span class="sr-only">Next</span>
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>


    <div class="modal fade student-profile" id="modal-default" tabindex="-1" role="dialog"
        aria-labelledby="modal-default" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-7" role="document">
            <div class="modal-content">

                <div class="modal-header">
                    <h6 class="modal-title" id="modal-title-default">Student Profile</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>

                <div class="modal-body">

                    <div class="row">

                        <div class="col-md-6">
                            <p> <b>Fullname</b> : <span id="fullname"></span></p>
                            <p> <b>Email</b> : <span id="email"></span></p>
                            <p> <b>Phone</b> : <span id="phone"></span></p>
                            <p> <b>Matric No</b> : <span id="matric"></span></p>
                            <p> <b>Level</b> : <span id="level"></span></p>
                        </div>
                        <div class="col-md-6">
                            <p> <b>Course</b> : <span id="course"></span></p>
                            <p> <b>Gender</b> : <span id="gender"></span></p>
                            <p> <b>Parent Name</b> : <span id="parentName"></span></p>
                            <p> <b>Parent Number</b> : <span id="parentNumber"></span></p>

                        </div>


                   
                    </div>

                </div>

                <div class="modal-footer">
                    {{-- <button type="button" class="btn btn-primary">Save changes</button> --}}
                    <button type="button" class="btn btn-link  ml-auto" data-dismiss="modal">Close</button>
                </div>

            </div>
        </div>



    </div>


    @endsection


    @section('js')

    <script>
        function view(id) {
            // var id = $(this).attr('id');
            console.log(id);

            toastr.info('Loading Student Profile....');

            $.ajax({
                url: '/students/' + id,
                type: "GET",
                success: function (response) {
                    var student = JSON.parse(response.user);
                    // console.log(student.fullname);

                    $('#fullname').html(student.fullname);
                    $('#email').html(student.email);
                    $('#phone').html(student.phone);
                    $('#level').html(student.level);
                    $('#gender').html(student.gender);
                    $('#course').html(student.course);
                    $('#matric').html(student.matric_no);
                    $('#parentName').html(student.parent_name);
                    $('#parentNumber').html(student.parent_number);
                    $('#progress').html(`${response.attendance}%`);
                    $('.progress-bar').css('width', `${response.attendance}%`);

                    $('.student-profile').modal('show');
                    // return false;



                }
            });









        }
    </script>


    @endsection