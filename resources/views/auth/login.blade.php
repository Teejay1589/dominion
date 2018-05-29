@extends('layouts.app')

@section('content')
<div class="page login-page">
    <div class="container d-flex align-items-center">
        <div class="form-holder has-shadow">
            <div class="row">
                <!-- Logo & Information Panel-->
                <div class="col-lg-6">
                            <div class="info d-flex align-items-center">
                                <div class="content">
                                    <div class="logo">
                                        <h1>Dominion<span>Medical Center</span></h1>
                                    </div>
                                    <div class="clearfix"></div>
                                    <h4>Health is the only wealth we know.</h4>
                                    <p>Dr. Awoleke J.O</p>
                                </div>
                            </div>
                        </div>
                <!-- Form Panel    -->
                <div class="col-lg-6 bg-white">
                    <div class="form d-flex align-items-center">
                        <div class="content">
                            <form id="login-form" method="POST" action="{{ route('login') }}">
                                {{ csrf_field() }}

                                <div class="form-group">
                                    <input id="login-username" type="text" name="email" required="" class="input-material">
                                    <label for="login-username" class="label-material">Email</label>
                                </div>
                                <div class="form-group">
                                    <input id="login-password" type="password" name="password" required="" class="input-material">
                                    <label for="login-password" class="label-material">Password</label>
                                </div><button type="submit" class="btn btn-primary">Login</button>
                            </form>{{-- <a href="#" class="forgot-pass">Forgot Password?</a> --}}<br><small>Do not have an account? </small><a href="register.html" class="{{ route('register') }}">Signup</a>
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
