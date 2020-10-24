@extends('layouts.app')



@section('routename')
Courses
@endsection




@section('content')


<div class="container-fluid mt--7">
    <!-- Table -->
    <div class="row">
        <div class="col">
            <div class="card shadow">
                <div class="card-header border-0">
                    <h3 class="mb-0">Select Courses</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <form action="{{ route('staff.course') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="my-input">Select Courses</label>
                                    <br>
                                    <span class="text-danger" style="font-size: 11px;">Please don't submit page if you
                                        have not finished selecting courses.</span>
                                    <select id="courses" class="form-control" name="course[]" multiple="multiple" >

                                        @foreach ($courses as $course)
                                        <option value="{{$course->id}}">{{$course->course_code}}</option>

                                        @endforeach


                                    </select>
                                </div>

                                <div class="form-group">
                                    <button class="btn btn-info" type="submit">Sumbit</button>
                                </div>

                            </form>

                        </div>


                    </div>
                </div>


                <div class="col-md-12">


                    <h2 class="text-dark mx-2">My Courses</h2>
                    <table class="table align-items-center table-flush">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col">Id</th>
                                <th scope="col">Course</th>
                                <th scope="col">Code</th>
                                <th scope="col">Unit</th>

                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(Auth::User()->courses != null)
                            @foreach (json_decode(Auth::User()->courses) as $key => $course)
                            <tr>
                                <?php 
                                        $item =  \App\Course::where('id',$course)->first();
                                    ?>

                                <td>{{$key + 1}}</td>
                                <td>{{$item->course_title}}</td>
                                <td>{{$item->course_code}}</td>
                                <td>{{$item->course_unit}}</td>
                                <td><button class="btn btn-danger close">x</button></td>

                            </tr>
                            @endforeach
                            @else

                            <span class="text-danger">You have no courses yet please add course</span>

                            @endif

                        </tbody>

                    </table>

                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>

                </div>




            </div>
        </div>
    </div>


</div>




@endsection


@section('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.19.2/axios.min.js"></script>
<script>
   
    
    $(document).ready(function () {
        // alert('fired')
        // $('#courses').select2({
        //     placeholder: 'Select an option'
        // });

         $.ajax({
                url: '/get-courses',
                type: 'GET'
            }).done(function(response){
                getCourse(response)
            })
        
        
        
        
        

        
    })

    function getCourse(vals){
        var s2 = $("#courses").select2({
                placeholder: "Choose event type",
                tags: true
            });

            vals.forEach(function(e){
            if(!s2.find('option:contains(' + e + ')').length) 
            s2.append($('<option>').text(e));
            });

            s2.val(vals).trigger("change"); 
        
    }
</script>


@endsection