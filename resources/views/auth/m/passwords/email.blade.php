{{-- @extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Reset Password</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form class="form-horizontal" method="POST" action="{{ route('password.email') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Send Password Reset Link
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

@section('title', 'Send Password Reset')

@section('page_styles')
@endsection

@section('content')
  <form role="form" action="{{ route('password.email') }}" class="form-layout" method="POST">
    {{ csrf_field() }}

    <div class="text-center mb15">
      <h3>{{ env('APP_FULLNAME', 'DOMINION MEDICAL CENTER') }}</h3>
      {{-- <img src="{{ asset('urban/images/logo-dark.png') }}" /> --}}
    </div>
    <p class="text-center mb30">Lost your password? Please enter your email address. You will receive a link to create a new password.</p>

    <div class="form-inputs">
      <div class="form-group">
        <label>Email</label>
        <input type="email" class="form-control input-lg" placeholder="Email Address" name="email" required autofocus>
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
