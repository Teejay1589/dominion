@extends('layouts.app')

@section('content')
{{--<div class="container">--}}
    {{--<div class="row">--}}
        {{--<div class="col-md-8 col-md-offset-2">--}}
            {{--<div class="panel panel-default">--}}
                {{--<div class="panel-heading">Register</div>--}}

                {{--<div class="panel-body">--}}
                    {{--<form class="form-horizontal" method="POST" action="{{ route('register') }}">--}}
                        {{--{{ csrf_field() }}--}}

                        {{--<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">--}}
                            {{--<label for="name" class="col-md-4 control-label">Name</label>--}}

                            {{--<div class="col-md-6">--}}
                                {{--<input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>--}}

                                {{--@if ($errors->has('name'))--}}
                                    {{--<span class="help-block">--}}
                                        {{--<strong>{{ $errors->first('name') }}</strong>--}}
                                    {{--</span>--}}
                                {{--@endif--}}
                            {{--</div>--}}
                        {{--</div>--}}

                        {{--<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">--}}
                            {{--<label for="email" class="col-md-4 control-label">E-Mail Address</label>--}}

                            {{--<div class="col-md-6">--}}
                                {{--<input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>--}}

                                {{--@if ($errors->has('email'))--}}
                                    {{--<span class="help-block">--}}
                                        {{--<strong>{{ $errors->first('email') }}</strong>--}}
                                    {{--</span>--}}
                                {{--@endif--}}
                            {{--</div>--}}
                        {{--</div>--}}

                        {{--<div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">--}}
                            {{--<label for="password" class="col-md-4 control-label">Password</label>--}}

                            {{--<div class="col-md-6">--}}
                                {{--<input id="password" type="password" class="form-control" name="password" required>--}}

                                {{--@if ($errors->has('password'))--}}
                                    {{--<span class="help-block">--}}
                                        {{--<strong>{{ $errors->first('password') }}</strong>--}}
                                    {{--</span>--}}
                                {{--@endif--}}
                            {{--</div>--}}
                        {{--</div>--}}

                        {{--<div class="form-group">--}}
                            {{--<label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>--}}

                            {{--<div class="col-md-6">--}}
                                {{--<input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>--}}
                            {{--</div>--}}
                        {{--</div>--}}

                        {{--<div class="form-group">--}}
                            {{--<div class="col-md-6 col-md-offset-4">--}}
                                {{--<button type="submit" class="btn btn-primary">--}}
                                    {{--Register--}}
                                {{--</button>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</form>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}
{{--</div>--}}

<div class="page login-page">
    <div class="container d-flex align-items-center">
        <div class="form-holder has-shadow">
            <div class="row">
                
                <!-- Form Panel    -->
                <div class="col-lg-6 bg-white">
                    <div class="form d-flex align-items-center">
                        <div class="content">
                            <form id="register-form" method="POST" action="{{ route('m.register') }}">
                                {{ csrf_field() }}

                                <div class="form-group">
                                    <input id="register-username" type="text" name="first_name" required class="input-material">
                                    <label for="register-username" class="label-material">First Name</label>
                                </div>
                                <div class="form-group">
                                    <input id="register-username" type="text" name="last_name" required class="input-material">
                                    <label for="register-username" class="label-material">Last Name</label>
                                </div>
                                <div class="form-group">
                                    <input id="register-email" type="email" name="email" required class="input-material">
                                    <label for="register-email" class="label-material">Email Address      </label>
                                </div>
                                <div class="form-group">
                                    <input id="register-passowrd" type="password" name="password" required class="input-material">
                                    <label for="register-passowrd" class="label-material">Password        </label>
                                </div>
                                <div class="form-group">
                                    <input id="register-passowrd" type="password" name="password_confirmation" required class="input-material">
                                    <label for="register-passowrd" class="label-material">Confirm Password        </label>
                                </div>
                                <div class="form-group terms-conditions">
                                    <input id="license" type="checkbox" class="checkbox-template">
                                    <label for="license">Agree the terms and policy</label>
                                </div>
                                <input id="register" type="submit" value="Register" class="btn btn-info">
                            </form><small>Already have an account? </small><a href="{{ route('m.login') }}" class="signup text-info">Login</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="copyrights text-center">
                <p>Dominion Specialist Medical And Diagnostics Center &copy; {{ Carbon::createFromFormat("Y-m-d H:i:s", now())->year }}</p>
        
    </div>
</div>
@endsection
