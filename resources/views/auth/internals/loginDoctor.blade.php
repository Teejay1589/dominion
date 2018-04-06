@extends('layouts.app')

@section('content')
    <div class="page login-page">
        <div class="container d-flex align-items-center">
            <div class="form-holder has-shadow">
                <form method="POST" action="{{ route('loginDoctor') }}">
                    {{ csrf_field() }}

                    <div class="row">
                        <!-- Form Panel    -->
                        <div class="col-lg-6 bg-white">
                            <div class="form d-flex align-items-center">
                                <div class="content">
                                    <h1 class="mg-bottom internal-doctor">Doctor Login</h1>

                                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">

                                            <input id="email" type="email" class="input-material internal-doctor" name="email"
                                                   value="{{ old('email') }}" required>
                                            <label for="email" class="label-material internal-doctor">Email Address</label>

                                            @if ($errors->has('email'))
                                                <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                            @endif
                                        </div>

                                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">

                                            <input id="password" type="password" class="input-material internal-doctor"
                                                   name="password"
                                                   required>
                                            <label for="password" class="label-material internal-doctor">Doctor Pass ID</label>

                                            @if ($errors->has('password'))
                                                <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                            @endif
                                        </div>

                                        <button type="submit" class="btn btn-primary pull-right btn-doctor">Login
                                        </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
