@extends('layouts.app')

@section('routename')
Check Attendance
@endsection


@section('content')
<div class="container py-3">
    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Filter</h5>
                <form action="{{ url('find-attendance')}}" method="POST">
                
{{-- 
                        @foreach (\App\Calendar::where('user_id', Auth::id())->with('Course')->get() as $cal)
                       {{$cal}}
                        @endforeach --}}

                        @csrf
                        <div class="form-group">
                            <label>Date </label>
                            <select class="form-control" name="filter" id="">
                                <option>-- Select Calendar --</option>
                                @foreach (\App\Calendar::where('user_id', Auth::id())->with('Course')->get() as $cal)
                                <option value="[cal => {{$cal->id}}, course => {{$cal->course->id}} ]">{{$cal->course->course_code}} - {{$cal->date}}</option>
                                @endforeach
                            </select>

                        </div>


                        <div class="form-group">
                            <button class="btn btn-dark" type="submit">Search</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection