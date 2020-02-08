@extends('layouts.app')

@section('routename')
Students
@endsection


@section('content')
<div class="container-fluid mt--7">
    <!-- Table -->
    <div class="row">
        <div class="col">
            <div class="card shadow">
                <div class="card-header border-0">
                    <h3 class="mb-0">Students Datatable</h3>
                </div>
                <div class="table-responsive">
                    <table class="table align-items-center table-flush">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col">Id</th>
                                <th scope="col">Fullname</th>
                                <th scope="col">Email</th>
                                <th scope="col">Attedance</th>
                                <th scope="col">Matric No</th>
                                <th scope="col">Level</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($students as $key => $student)
                            <tr>
                                <th scope="row">
                                   {{$key+1}}
                                </th>
                                <td>
                                   {{$student->fullname}}
                                </td>
                                <td>
                                  {{$student->email}} 
                                </td>
                                <td>
                                    <span class="badge badge-dot mr-4">
                                        <i class="bg-warning"></i> pending
                                    </span>
                                </td>
                                <td>
                                    {{$student->matric_no}} 

                                </td>
                                <td>
                                    {{$student->level}} 

                                </td>
                                <td class="text-right">
                                    <div class="dropdown">
                                        <a class="btn btn-sm btn-icon-only text-light" href="#" role="button"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fas fa-ellipsis-v"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                            <a class="dropdown-item" href="#">Action</a>
                                            <a class="dropdown-item" href="#">Another action</a>
                                            <a class="dropdown-item" href="#">Something else here</a>
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


</div>
@endsection