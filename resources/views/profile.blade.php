@extends('layouts.patient')

@section('title', $page->title)

@section('page_styles')
@endsection

@section('content')

    <section>
        <div class="row mb15">
            <div class="col-md-1 col-sm-12"></div>
            <div class="col-md-10 col-sm-12">
                <div id="update-profile" class="panel">
                    <div class="panel-heading border">
                        <div class="panel-title">Update Profile Form</div>
                    </div>
                    <div class="panel-body">
                        <div class="text-center">
                            <p class="text-danger"><strong>PROFILE IS LOCKED and can only be updated by Admin.</strong></p>
                            <div class="text-dark">
                                <span>Do you have an important information you would like to update yourself?</span>
                            </div>
                            <div class="mb20">
                                <span>If you do, </span>
                                <a href="javascript:;" class="text-primary">request profile unlock</a>
                            </div>
                        </div>
                        <form class="" action="{{ url('/profile/update') }}" method="POST" enctype="multipart/form-data">
                            {{ csrf_field() }}

                            <h6 class=""><strong>Personal Details</strong></h6>

                            <div class="row">
                                <div class="col-lg-6 col-xs-12">
                                    <div class="form-group">
                                        <label class="form-control-label">First Name <span class="text-danger">*</span></label>
                                        <input disabled class="form-control" type="text" name="first_name" placeholder="Patient First Name" value="{{ old('first_name', Auth::user()->first_name) }}" required>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-xs-12">
                                    <div class="form-group">
                                        <label class="form-control-label">Last Name </label>
                                        <input disabled class="form-control" type="text" name="last_name" placeholder="Patient Last Name" value="{{ old('last_name', Auth::user()->last_name) }}" >
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-6 col-xs-12">
                                    <div class="form-group">
                                        <label class="form-control-label">Phone Number <span class="text-danger">*</span></label>
                                        <input disabled class="form-control" type="tel" name="phone_number" placeholder="Patient Phone Number" value="{{ old('phone_number', Auth::user()->phone_number) }}" required>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-xs-12">
                                    <div class="form-group">
                                        <label class="form-control-label">Email </label>
                                        <input disabled class="form-control" type="email" name="email" placeholder="Patient Email" value="{{ old('email', Auth::user()->email) }}" >
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-6 col-xs-12">
                                    <div class="form-group">
                                        <label class="form-control-label">Sex </label>
                                        <select disabled class="form-control" name="sex">
                                            <option value="UNKNOWN" {{ (old('sex', Auth::user()->sex) == 'UNKNOWN') ? 'selected' : '' }}>UNKNOWN</option>
                                            <option value="MALE" {{ (old('sex', Auth::user()->sex) == 'MALE') ? 'selected' : '' }}>MALE</option>
                                            <option value="FEMALE" {{ (old('sex', Auth::user()->sex) == 'FEMALE') ? 'selected' : '' }}>FEMALE</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-xs-12">
                                    <div class="form-group">
                                        <label class="form-control-label">Marital Status </label>
                                        <select disabled class="form-control" name="marital_status">
                                            <option value="UNKNOWN" {{ (old('marital_status', Auth::user()->marital_status) == 'UNKNOWN') ? 'selected' : '' }}>UNKNOWN</option>
                                            <option value="SINGLE" {{ (old('marital_status', Auth::user()->marital_status) == 'SINGLE') ? 'selected' : '' }}>SINGLE</option>
                                            <option value="MARRIED" {{ (old('marital_status', Auth::user()->marital_status) == 'MARRIED') ? 'selected' : '' }}>MARRIED</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-xs-12">
                                    <div class="form-group">
                                        <label class="form-control-label">Date of Birth </label>
                                        <input disabled class="form-control" type="date" name="date_of_birth" placeholder="Patient Date of Birth" value="{{ old('date_of_birth', Auth::user()->date_of_birth) }}" >
                                        <span class="help-block text-primary"><small>Format: </small><code>YYYY-MM-DD</code></span>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-xs-12">
                                    <div class="form-group">
                                        <label class="form-control-label">Religion </label>
                                        <select disabled class="form-control" name="religion">
                                            <option value="UNKNOWN" {{ (old('religion', Auth::user()->religion) == 'UNKNOWN') ? 'selected' : '' }}>UNKNOWN</option>
                                            <option value="CHRISTIANITY" {{ (old('religion', Auth::user()->religion) == 'CHRISTIANITY') ? 'selected' : '' }}>CHRISTIANITY</option>
                                            <option value="ISLAM" {{ (old('religion', Auth::user()->religion) == 'ISLAM') ? 'selected' : '' }}>ISLAM</option>
                                            <option value="TRADITIONAL" {{ (old('religion', Auth::user()->religion) == 'TRADITIONAL') ? 'selected' : '' }}>TRADITIONAL</option>
                                            <option value="OTHERS" {{ (old('religion', Auth::user()->religion) == 'OTHERS') ? 'selected' : '' }}>OTHERS</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-12 col-xs-12">
                                    <div class="form-group">
                                        <label class="form-control-label">Address </label>
                                        <input disabled class="form-control" type="text" name="address" placeholder="Patient Address" value="{{ old('address', Auth::user()->address) }}" >
                                        <span class="help-block text-primary"><small>Home OR Contact Address</small></span>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-4 col-xs-12">
                                    <div class="form-group">
                                        <label class="form-control-label"><abbr title="LOCAL GOVERNMRNT AREA">LGA</abbr> </label>
                                        <input disabled class="form-control" type="text" name="LGA" placeholder="Patient LGA" value="{{ old('LGA', Auth::user()->LGA) }}" >
                                    </div>
                                </div>
                                <div class="col-lg-4 col-xs-12">
                                    <div class="form-group">
                                        <label class="form-control-label">State of Origin </label>
                                        <input disabled class="form-control" type="text" name="state_of_origin" placeholder="Patient State of Origin" value="{{ old('state_of_origin', Auth::user()->state_of_origin) }}" >
                                    </div>
                                </div>
                                <div class="col-lg-4 col-xs-12">
                                    <div class="form-group">
                                        <label class="form-control-label">Nationality </label>
                                        <input disabled class="form-control" type="text" name="nationality" placeholder="Patient Nationality" value="{{ old('nationality', Auth::user()->nationality) }}" >
                                    </div>
                                </div>
                            </div>

                            <div class="text-right">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>

                            <br>
                            <h6 class=""><strong>Occupation Details</strong></h6>

                            <div class="row">
                                <div class="col-lg-6 col-xs-12">
                                    <div class="form-group">
                                        <label class="form-control-label">Occupation </label>
                                        <input disabled class="form-control" type="text" name="occupation" placeholder="Patient Occupation" value="{{ old('occupation', Auth::user()->occupation) }}" >
                                    </div>
                                </div>
                                <div class="col-lg-6 col-xs-12">
                                    <div class="form-group">
                                        <label class="form-control-label">Office Address </label>
                                        <input disabled class="form-control" type="text" name="office_address" placeholder="Patient Office Address" value="{{ old('office_address', Auth::user()->office_address) }}" >
                                    </div>
                                </div>
                            </div>

                            <br>
                            <h6 class=""><strong>Next of Kin Details</strong></h6>

                            <div class="row">
                                <div class="col-lg-6 col-xs-12">
                                    <div class="form-group">
                                        <label class="form-control-label"><abbr title="Next of Kin">NOK</abbr> Name </label>
                                        <input disabled class="form-control" type="text" name="next_of_kin_name" placeholder="Next of Kin Name" value="{{ old('next_of_kin_name', Auth::user()->next_of_kin_name) }}">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-xs-12">
                                    <div class="form-group">
                                        <label class="form-control-label"><abbr title="Next of Kin">NOK</abbr> Relationship </label>
                                        <input disabled class="form-control" type="text" name="next_of_kin_relationship" placeholder="Next of Kin Relationship" value="{{ old('next_of_kin_relationship', Auth::user()->next_of_kin_relationship) }}">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-xs-12">
                                    <div class="form-group">
                                        <label class="form-control-label"><abbr title="Next of Kin">NOK</abbr> Address </label>
                                        <input disabled class="form-control" type="text" name="next_of_kin_address" placeholder="Next of Kin Address" value="{{ old('next_of_kin_address', Auth::user()->next_of_kin_address) }}">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-xs-12">
                                    <div class="form-group">
                                        <label class="form-control-label"><abbr title="Next of Kin">NOK</abbr> Phone Number </label>
                                        <input disabled class="form-control" type="text" name="next_of_kin_phone_number" placeholder="NOK Phone Number" value="{{ old('next_of_kin_phone_number', Auth::user()->next_of_kin_phone_number) }}">
                                    </div>
                                </div>
                            </div>

                            <br>
                            <h6 class=""><strong>Other Details</strong></h6>

                            <div class="row">
                                <div class="col-lg-4 col-xs-12">
                                    <div class="form-group">
                                        <label class="form-control-label">Blood Group </label>
                                        <input disabled class="form-control" type="text" name="blood_group" placeholder="Blood Group" value="{{ old('blood_group', Auth::user()->blood_group) }}">
                                    </div>
                                </div>
                                <div class="col-lg-4 col-xs-12">
                                    <div class="form-group">
                                        <label class="form-control-label">Weight </label>
                                        <div class="input-group">
                                            <input disabled class="form-control" type="text" name="weight" placeholder="Weight" value="{{ old('weight', Auth::user()->weight) }}">
                                            <div class="input-group-addon">KG</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-xs-12">
                                    <div class="form-group">
                                        <label class="form-control-label">Height </label>
                                        <div class="input-group">
                                            <input disabled class="form-control" type="text" name="height" placeholder="Height" value="{{ old('height', Auth::user()->height) }}">
                                            <div class="input-group-addon">CM</div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="text-right">
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="clearfix"></div>
                <br>

                <div id="change-password" class="panel">
                    <div class="panel-heading border">
                        <div class="panel-title">Change Password Form</div>
                    </div>
                    <div class="panel-body">
                        <form class="" action="{{ url('/password/change') }}" method="POST">
                            <div class="form-group">
                                {{ csrf_field() }}
                            </div>

                            <div class="form-group">
                                <label for="current_password" class="form-control-label">Current Password: <span class="text-danger">*</span></label>
                                <input class="form-control" placeholder="Your Current Password" type="password" name="current_password" required>
                                <span class="help-block small">Try your Phone Number</span>
                            </div>

                            <div class="form-group" class="form-control-label">
                                <label for="new_password" class="form-control-label">New Password: <span class="text-danger">*</span></label>
                                <input class="form-control" placeholder="Your New Password" type="password" name="new_password" required>
                            </div>

                            <div class="form-group" class="form-control-label">
                                <label for="new_password_confirmation" class="form-control-label">Confirm New Password: <span class="text-danger">*</span></label>
                                <input class="form-control" placeholder="Confirm New Password" type="password" name="new_password_confirmation" required>
                            </div>

                            <div class="text-right">
                                <button type="submit" class="btn btn-primary">Change</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-1 col-sm-12"></div>
        </div>
    </section>

@endsection

@section('page_scripts')
@endsection
