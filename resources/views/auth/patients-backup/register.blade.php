@extends('layouts.app')

@section('content')
    <div class="page login-page">
        <div class="container d-flex align-items-center">
            <div class="form-holder has-shadow">
                <form method="POST" action="{{ route('register') }}">
                    {{ csrf_field() }}

                    <div class="row">
                        <!-- Form Panel    -->
                        <div class="col-lg-6 bg-white">
                            <div class="form d-flex align-items-center">
                                <div class="content">
                                    <h1 class="mg-bottom">Administrative One-time Registration</h1>

                                    <div class="form-group{{ $errors->has('first_name') ? ' has-error' : '' }}">

                                        <input id="first_name" type="text" class="input-material internal"
                                               name="first_name"
                                               value="{{ old('first_name') }}" required>

                                        <label for="first_name" class="label-material internal">First Name</label>

                                        @if ($errors->has('first_name'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('first_name') }}</strong>
                                        </span>
                                        @endif
                                    </div>

                                    <div class="form-group{{ $errors->has('last_name') ? ' has-error' : '' }}">

                                        <input id="last_name" type="text" class="input-material internal"
                                               name="last_name"
                                               value="{{ old('last_name') }}" required>

                                        <label for="last_name" class="label-material internal">Last Name</label>

                                        @if ($errors->has('last_name'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('last_name') }}</strong>
                                        </span>
                                        @endif
                                    </div>


                                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">

                                        <input id="email" type="email" class="input-material internal" name="email"
                                               value="{{ old('email') }}" required>
                                        <label for="email" class="label-material internal">Email Address</label>

                                        @if ($errors->has('email'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                        @endif
                                    </div>

                                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">

                                        <input id="password" type="password" class="input-material internal"
                                               name="password"
                                               required>
                                        <label for="password" class="label-material internal">Password</label>

                                        @if ($errors->has('password'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                        @endif
                                    </div>

                                    <div class="form-group">

                                        <input id="password-confirm" type="password" class="input-material internal"
                                               name="password_confirmation" required>

                                        <label for="password-confirm" class="label-material internal">Confirm
                                            Password</label>
                                    </div>

                                    <div class="form-group{{ $errors->has('fav_quote') ? ' has-error' : '' }}">

                                        <input id="fav_quote" type="text" class="input-material internal"
                                               name="fav_quote"
                                               value="{{ old('fav_quote') }}" required>
                                        <label for="fav_quote" class="label-material internal">Favourite Quote
                                            Mnemonic</label>

                                        @if ($errors->has('fav_quote'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('fav_quote') }}</strong>
                                        </span>
                                        @endif
                                    </div>

                                    <button type="submit" class="btn btn-primary pull-right btn-internal">Register
                                    </button>
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
