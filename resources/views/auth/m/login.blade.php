@extends('layouts.app')

@section('content')
<div class="page login-page">
    <div class="container d-flex align-items-center">
        <div class="form-holder has-shadow">
            <div class="row">
                
                <!-- Form Panel    -->
                <div class="col-lg-6 bg-white">
                    <div class="form d-flex align-items-center">
                        <div class="content">
                            <form id="login-form" method="POST" action="{{ route('m.login') }}">
                                {{ csrf_field() }}

                                <div class="form-group">
                                    <input id="login-username" type="text" name="email" required="" class="input-material">
                                    <label for="login-username" class="label-material">Email</label>
                                </div>
                                <div class="form-group">
                                    <input id="login-password" type="password" name="password" required="" class="input-material">
                                    <label for="login-password" class="label-material">Password</label>
                                </div><button type="submit" class="btn btn-info">Login</button>
                            </form>{{-- <a href="#" class="forgot-pass">Forgot Password?</a> --}}<br><small>Do not have an account? </small><a href="{{ route('m.register') }}" class="text-info">Signup</a>
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
