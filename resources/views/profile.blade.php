@extends('layouts.app')

@section('content')

    <section>
        <div class="container-fluid">
            <div id="update-profile" class="card" style="width: 100%;">
                <div class="card-close">
                    <div class="dropdown">
                        <button type="button" id="closeCard1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-ellipsis-v"></i></button>
                        <div aria-labelledby="closeCard1" class="dropdown-menu dropdown-menu-right has-shadow"><a href="#" class="dropdown-item remove"> <i class="fa fa-times"></i>Close</a><a href="#" class="dropdown-item edit"> <i class="fa fa-gear"></i>Edit</a></div>
                    </div>
                </div>
                <div class="card-header">
                    <div class="card-title">Update Profile Form</div>
                </div>
                <div class="card-body">
                    <form class="" action="{{ url('/profile/update') }}" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            {{ csrf_field() }}
                        </div>

                        <div class="form-group">
                            <label for="name" class="form-control-label">Name: <span class="text-danger">*</span></label>
                            <input class="form-control" placeholder="Your Name" type="text" name="name" value="{{ old('name', Auth::user()->name) }}" required>
                        </div>

                        <div class="form-group">
                            <label for="email" class="form-control-label">Email: <span class="text-danger">*</span></label>
                            <input class="form-control" placeholder="Your Email" type="email" name="email" value="{{ old('email', Auth::user()->email) }}" required>
                        </div>

                        <div class="text-right">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </form>
                </div>
            </div>

            <div class="clearfix"></div>
            <br>

            <div id="change-password" class="card" style="width: 100%;">
                <div class="card-close">
                    <div class="dropdown">
                        <button type="button" id="closeCard1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-ellipsis-v"></i></button>
                        <div aria-labelledby="closeCard1" class="dropdown-menu dropdown-menu-right has-shadow"><a href="#" class="dropdown-item remove"> <i class="fa fa-times"></i>Close</a><a href="#" class="dropdown-item edit"> <i class="fa fa-gear"></i>Edit</a></div>
                    </div>
                </div>
                <div class="card-header">
                    <div class="card-title">Change Password Form</div>
                </div>
                <div class="card-body">
                    <form class="" action="{{ url('/password/change') }}" method="POST">
                        <div class="form-group">
                            {{ csrf_field() }}
                        </div>

                        <div class="form-group">
                            <label for="current_password" class="form-control-label">Current Password: <span class="text-danger">*</span></label>
                            <input class="form-control" placeholder="Your Current Password" type="password" name="current_password" required>
                        </div>

                        <div class="form-group" class="form-control-label">
                            <label for="new_password" class="form-control-label">New Password: <span class="text-danger">*</span></label>
                            <input class="form-control" placeholder="Your New Password" type="password" name="new_password" required>
                        </div>

                        <div class="form-group" class="form-control-label">
                            <label for="new_password_confirmation" class="form-control-label">Confirm New Password: <span class="text-danger">*</span></label>
                            <input class="form-control" placeholder="Confirm New Password" type="password" name="new_password_confirmation" required>
                        </div>

                        <div class="text-right">
                            <button type="submit" class="btn btn-primary">Change</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

@endsection
