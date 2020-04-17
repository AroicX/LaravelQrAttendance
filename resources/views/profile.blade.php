@extends('layouts.app')

@section('routename')
Profile
@endsection


@section('content')
<div class="container">
    <div class="row py-5">
       
        <div class="col-md-6">

            <div class="card">
                <div class="card-header">
                    <h5>User Profile</h5>
                </div>
                <div class="card-body">
                   
                    <form action="">

                        <div class="form-group">
                            <label for="fullname">Fullname</label>
                            <input class="form-control" type="text" name="fullname" value={{Auth::User()->name}} disabled>
                        </div>

                        <div class="form-group">
                            <label for="email">Email</label>
                            <input class="form-control" type="email" name="email" value={{Auth::User()->email}} disabled>
                        </div>

                    </form>


                </div>
            </div>

        </div>
        <div class="col-md-6">
            
            <div class="card">
                <div class="card-header">
                    <h5>Change Password:</h5>
                </div>
                <div class="card-body">
                   
                    <form action="">

                        <div class="form-group">
                            <label for="password">Password</label>
                            <input class="form-control" type="text" name="password">
                        </div>

                        <div class="form-group">
                            <label for="password">New Password</label>
                            <input class="form-control" type="text" name="old_password">
                        </div>

                        <div class="form-group">
                            <label for="password">Confirm Password</label>
                            <input class="form-control" type="text" name="new_password">
                        </div>

                        <div class="form-group">
                            <button class="btn btn-dark">Change Password</button>
                        </div>


                    </form>


                </div>
            </div>


        </div>
    </div>
</div>
@endsection