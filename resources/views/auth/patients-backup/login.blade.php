@extends('layouts.app')

@section('content')
    <div class="page login-page">
        <div class="container d-flex align-items-center">
            <div class="form-holder has-shadow">
                <form method="POST" action="{{ route('login') }}">
                    {{ csrf_field() }}

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
                                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">

                                            <input id="email" type="email" class="input-material" name="email"
                                                   value="{{ old('email') }}" required>
                                            <label for="email" class="label-material">Email Address</label>

                                            @if ($errors->has('email'))
                                                <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                            @endif
                                        </div>

                                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">

                                            <input id="password" type="password" class="input-material" name="password"
                                                   required>
                                            <label for="password" class="label-material">Patient ID</label>

                                            @if ($errors->has('password'))
                                                <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                            @endif
                                        </div>

                                        <button type="submit" class="btn btn-primary pull-right">Login</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="copyrights text-center">
            {{--<p>Design by <a href="https://bootstrapious.com/admin-templates" class="external">Bootstrapious</a>--}}
            {{--<!-- Please do not remove the backlink to us unless you support further theme's development at https://bootstrapious.com/donate. It is part of the license conditions. Thank you for understanding :)-->--}}
            {{--</p>--}}
        </div>
    </div>
@endsection
