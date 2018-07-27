@extends('layouts.admin-auth')

@section('title', 'Register')

@section('page_styles')
@endsection

@section('content')
  <form role="form" action="{{ route('m.register') }}" class="form-layout" method="POST">
    {{ csrf_field() }}

    <div class="text-center mb15">
      <h3>{{ env('APP_FULLNAME', 'DOMINION MEDICAL CENTER') }}</h3>
      {{-- <img src="{{ asset('urban/images/logo-dark.png') }}" /> --}}
    </div>

    <p class="text-center mb30">Fill Form and Register to Create your account.</p>

    <div class="form-inputs">
      <div class="form-group">
        <label>First Name</label>
        <input type="text" class="form-control input-lg" placeholder="First name" name="first_name" required>
      </div>
      <div class="form-group">
        <label>Last Name</label>
        <input type="text" class="form-control input-lg" placeholder="Last name" name="last_name" required>
      </div>
      <div class="form-group">
        <label>Email</label>
        <input type="text" class="form-control input-lg" placeholder="Email address" name="email" required>
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

    <button class="btn btn-success btn-block btn-lg mb15" type="submit">Register</button>

    <p>
      <a href="{{ route('m.login') }}">Login Here</a> &bull;
      <span>If you already have an account</span>
    </p>
  </form>
@endsection

@section('page_scripts')
@endsection