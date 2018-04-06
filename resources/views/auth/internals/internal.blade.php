@extends('layouts.app')

@section('content')
    <div class="page login-page">
        <div class="container d-flex align-items-center">
            <div class="form-holder has-shadow">

                <div class="row">
                    <!-- Form Panel    -->
                    <div class="col-lg-6 bg-white">
                        <div class="form d-flex align-items-center">
                            <div class="content">
                                <h1 class="text-center">Dominion Medical Center</h1>
                                <h3 class="internal-mg text-center">Internal Access</h3>

                                <div class="text-center">
                                    <a class="btn btn-primary btn-staff"
                                       href="{{ url('/loginStaff') }}">
                                        Staff Login
                                    </a>
                                    <a class="btn btn-primary btn-doctor" href="{{ url('/loginDoctor') }}">
                                        Doctor Login
                                    </a>
                                    <a class="btn btn-primary btn-admin" href="{{ url('/loginAdmin') }}">
                                        Administrative Login
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
