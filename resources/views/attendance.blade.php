@extends('layouts.app')



@section('routename')
Attendance
@endsection




@section('content')


<div class="container">
    <div class="row py-5">
        <div class="col-md-4">
            <h3 class="text-success">List of Users</h3>
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




@endsection


@section('js')
<script type="text/javascript" src="{{ asset('js/instascan.min.js')}}"></script>
<script type="text/javascript">
    let scanner = new Instascan.Scanner({
        video: document.getElementById('preview')
    });
    scanner.addListener('scan', function (content) {
        alert(content);
    });
    Instascan.Camera.getCameras().then(function (cameras) {



        if (cameras.length > 0) {


            // console.log(cameras)

            cameras.map((item, key) => {
                $('#getCam').append("<option value=" + key + ">" + item.name + "</option>");
            })

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
</script>

@endsection