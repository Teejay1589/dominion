@extends('layouts.app')

@section('title', 'Login')

@section('page_styles')
@endsection

@section('content')
  <div class="clearfix"></div>
  <br>

  <div class="full-height" style="margin: auto -20px; margin-top: 20px;">
    <div class="center-wrapper">
      <div class="center-content">
        <div class="row no-margin">
          <div class="col-xs-12 col-sm-6 col-sm-offset-3 col-md-4 col-md-offset-4">

            <form role="form" action="{{ route('login') }}" class="form-layout" method="POST">
              {{ csrf_field() }}

              <div class="text-center mb15">
                <h3>{{ env('APP_FULLNAME', 'DOMINION MEDICAL CENTER') }}</h3>
                {{-- <img src="{{ asset('urban/images/logo-dark.png') }}" /> --}}
              </div>
              <p class="text-center mb30">Welcome to {{ env('APP_FULLNAME', 'DOMINION MEDICAL CENTER') }}. Please Login to your account</p>

              <div class="form-inputs">
                <div class="form-group">
                  <label>Hospital File Number</label>
                  <input type="tel" class="form-control input-lg" placeholder="File Number" name="file_number" required>
                  <span class="help-block">looks like <code>DMC00000X</code></span>
                </div>
                <div class="form-group">
                  <label>Password</label>
                  <input type="password" class="form-control input-lg" placeholder="Password" name="password" required>
                </div>
              </div>

              <button class="btn btn-primary btn-block btn-lg mb15" type="submit">Login</button>

              <p>
                <a href="{{ route('password.request') }}">Forgot your password?</a>
              </p>
            </form>

          </div>
        </div>
      </div>
    </div>
  </div>


  <div class="clearfix"></div>
  <br>
@endsection

@section('page_scripts')
@endsection
