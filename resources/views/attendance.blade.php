@extends('layouts.app')

@section('routename')
Attendance
@endsection


@section('content')

<style>
    .hide {
        display: none;
    }
</style>



<div class="container hide" id="scanner">
    <div class="row py-5">
        <div class="col-md-4">
            
            {{-- <h3 class="text-success">List of Users</h3> --}}
        </div>
        <div class="col-md-4">
            <label for="camera">Select Your Camera </label>
            <select class="form-control" name="camera" id="getCam">
                <option value="0">--No Selected ---</option>

            </select>


            <br>
            <br>

            <video id="preview"></video>
        </div>
        <div class="col-md-4">

        </div>
    </div>
</div>


<div class="container " id="calendar">
    <div class="row py-5">
        <div class="col-md-4">
            <a href="/check-attendance" class="mx-2 my-5 btn btn-dark">Check Attendance</a>

        </div>
        <div class="col-md-4">
            <form action="{{ route('new.calendar') }}" method="POST">

                @csrf
                <div class="form-group">
                    <label>Select Course</label>
              
                    <select class="form-control" id="usercourse">
                        <option>-- Select Course --</option>
                        @if(Auth::User()->courses != [])
                            @foreach (\json_decode(Auth::User()->courses) as $course)
                       
                                    <?php 
                                        $item =  \App\Course::where('id',$course)->first();
                                    ?>

                                    <option value="{{$item->id}}">{{$item->course_code}}</option>


                            @endforeach
                        @endif
                    </select>
                </div>

                <div class="form-group">
                    <label>Date </label>

                    <input class="form-control" id="date" type="text"
                        value="{{ Carbon\Carbon::now()->format('d F, Y') }}" disabled>
                </div>


                <div class="form-group">
                    <button id="create" class="btn btn-info">Submit</button>
                </div>

            </form>
        </div>
        <div class="col-md-4"></div>
    </div>
</div>




@endsection


@section('js')
<script type="text/javascript" src="{{ asset('js/instascan.min.js')}}"></script>
<script type="text/javascript">
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('[name="_token"]').val()
        }
    });


    $('#create').click(function (event) {
        event.preventDefault();

        var course = $('#usercourse').val();
        var date = $('#date').val();

        const data = {
            course,
            date
        };

        $.ajax({
            url: 'create-calendar',
            type: "post",
            data: data,
            success: function (response) {

                if (response.status === 200) {
                    toastr.success(response.msg);
                    $('#scanner').removeClass('hide');
                    $('#calendar').addClass('hide');
                }
                if (response.status === 400) {
                    toastr.warning(response.msg);
                    $('#scanner').removeClass('hide');
                    $('#calendar').addClass('hide');
                }

            }
        });



    });


    let scanner = new Instascan.Scanner({
        video: document.getElementById('preview')
    });
    scanner.addListener('scan', function (content) {
        toastr.info('scanning....')
        signIn(content);
    });

    Instascan.Camera.getCameras().then(function (cameras) {

        if (cameras.length > 0) {
            // console.log(cameras)
            cameras.map((item, key) => {
                $('#getCam').append("<option value=" + key + ">" + item.name + "</option>");
            });

            $("#getCam").change(function () {
                let val = $(this).val();
                // scanner.end();
                scanner.start(cameras[val]);
                // console.log();
            });

            scanner.start(cameras[0]);
        } else {
            console.error('No cameras found.');
        }
    }).catch(function (e) {
        console.error(e);
    });


    function signIn(content) {
        // alert(content);

        var course = $('#usercourse').val();

        $.ajax({
            url: 'create-attendance',
            type: "POST",
            data: {
                tag: content,
                course_id: course
            },
            success: function (response) {
                toastr.clear();
                console.log(response);

                if (response.status === 200) {
                    toastr.success(response.msg);

                }
                if (response.status === 400) {
                    toastr.warning(response.msg);
                    $('#scanner').removeClass('hide');
                    $('#calendar').addClass('hide');
                }

            }
        });

    }
</script>

@endsection