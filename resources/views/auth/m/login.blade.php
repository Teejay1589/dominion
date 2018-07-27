@extends('layouts.admin-auth')

@section('title', 'Login')

@section('page_styles')
@endsection

@section('content')
  <form role="form" action="{{ route('m.login') }}" class="form-layout" method="POST">
    {{ csrf_field() }}

    <div class="text-center mb15">
      <h3>{{ env('APP_FULLNAME', 'DOMINION MEDICAL CENTER') }}</h3>
      {{-- <img src="{{ asset('urban/images/logo-dark.png') }}" /> --}}
    </div>
    <p class="text-center mb30">Welcome to {{ env('APP_FULLNAME', 'DOMINION MEDICAL CENTER') }}. Please Login to your account</p>

    <div class="form-inputs">
      <div class="form-group">
        <label>Email</label>
        <input type="email" class="form-control input-lg" placeholder="Email Address" name="email" required>
      </div>
      <div class="form-group">
        <label>Password</label>
        <input type="password" class="form-control input-lg" placeholder="Password" name="password" required>
      </div>
    </div>

    <button class="btn btn-success btn-block btn-lg mb15" type="submit">Login</button>

    <p>
      <a href="{{ route('m.register') }}">Register Here</a> &bull;
      <a href="javascript:;">Forgot your password?</a>
    </p>
  </form>
@endsection

@section('page_scripts')
@endsection