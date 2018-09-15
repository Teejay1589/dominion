@extends('layouts.app')

@section('content')
  <div class="clearfix"></div>
  <br>

  <div class="full-height" style="margin: auto -20px; margin-top: 20px;">
    <div class="center-wrapper">
      <div class="center-content">
        <div class="row no-margin">
          <div class="col-xs-12 col-sm-6 col-sm-offset-3 col-md-4 col-md-offset-4">

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
    </div>
  </div>

  <div class="clearfix"></div>
  <br>
@endsection
