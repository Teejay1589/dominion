{{-- @section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Reset Password</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('password.request') }}">
                        {{ csrf_field() }}

                        <input type="hidden" name="token" value="{{ $token }}">

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ $email or old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                            <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>
                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>

                                @if ($errors->has('password_confirmation'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Reset Password
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection --}}

@extends('layouts.admin-auth')

@section('title', 'Reset Password')

@section('page_styles')
@endsection

@section('content')
  <form role="form" action="{{ route('password.request') }}" class="form-layout" method="POST">
    {{ csrf_field() }}

    <div class="text-center mb15">
      <h3>{{ env('APP_FULLNAME', 'DOMINION MEDICAL CENTER') }}</h3>
      {{-- <img src="{{ asset('urban/images/logo-dark.png') }}" /> --}}
    </div>
    <p class="text-center mb30">Lost your password? Please enter your email address. You will receive a link to create a new password.</p>

    <div class="form-inputs">
      <div class="form-group">
        <label>Email</label>
        <input type="email" class="form-control input-lg" placeholder="Email Address" name="email" value="{{ $email or old('email') }}" required autofocus>
      </div>
      <div class="form-group">
        <label>Password</label>
        <input type="password" class="form-control input-lg" placeholder="Password" name="password" required>
      </div>
      <div class="form-group">
        <label>Confirm Password</label>
        <input type="password" class="form-control input-lg" placeholder="Password" name="password_confirmation" required>
      </div>
    </div>

    <button class="btn btn-success btn-block btn-lg mb15" type="submit">Send Password Reset</button>

    <p>
      <a href="{{ route('m.login') }}">Login Here</a> &bull;
      <a href="{{ route('m.register') }}">Register Here</a>
    </p>
  </form>
@endsection

@section('page_scripts')
@endsection