<form action="{{ url('/m/patients/create') }}" method="post">
	<div class="modal fade" id="modal-create">
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
						<span class="sr-only">Close</span>
					</button>
                    <h4 class="modal-title">Create Patient Form</h4>
				</div>
				<div class="modal-body">
					{{ csrf_field() }}

                    <h6 class=""><strong>Personal Details</strong></h6>

                    <div class="row">
                        <div class="col-lg-6 col-xs-12">
                            <div class="form-group">
                                <label class="form-control-label">First Name <span class="text-danger">*</span></label>
                                <input class="form-control" type="text" name="first_name" placeholder="Patient First Name" value="{{ old('first_name') }}" required>
                            </div>
                        </div>
                        <div class="col-lg-6 col-xs-12">
                            <div class="form-group">
                                <label class="form-control-label">Last Name </label>
                                <input class="form-control" type="text" name="last_name" placeholder="Patient Last Name" value="{{ old('last_name') }}" >
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-6 col-xs-12">
                            <div class="form-group">
                                <label class="form-control-label">Phone Number <span class="text-danger">*</span></label>
                                <input class="form-control" type="tel" name="phone_number" placeholder="Patient Phone Number" value="{{ old('phone_number') }}" required>
                            </div>
                        </div>
                        <div class="col-lg-6 col-xs-12">
                            <div class="form-group">
                                <label class="form-control-label">Email </label>
                                <input class="form-control" type="email" name="email" placeholder="Patient Email" value="{{ old('email') }}" >
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-6 col-xs-12">
                            <div class="form-group">
                                <label class="form-control-label">Sex </label>
                                <select class="form-control" name="sex">
                                    <option value="UNKNOWN" {{ (old('sex') == 'UNKNOWN') ? 'selected' : '' }}>UNKNOWN</option>
                                    <option value="MALE" {{ (old('sex') == 'MALE') ? 'selected' : '' }}>MALE</option>
                                    <option value="FEMALE" {{ (old('sex') == 'FEMALE') ? 'selected' : '' }}>FEMALE</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-6 col-xs-12">
                            <div class="form-group">
                                <label class="form-control-label">Marital Status </label>
                                <select class="form-control" name="marital_status">
                                    <option value="UNKNOWN" {{ (old('marital_status') == 'UNKNOWN') ? 'selected' : '' }}>UNKNOWN</option>
                                    <option value="SINGLE" {{ (old('marital_status') == 'SINGLE') ? 'selected' : '' }}>SINGLE</option>
                                    <option value="MARRIED" {{ (old('marital_status') == 'MARRIED') ? 'selected' : '' }}>MARRIED</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-6 col-xs-12">
                            <div class="form-group">
                                <label class="form-control-label">Date of Birth </label>
                                <input class="form-control" type="date" name="date_of_birth" placeholder="Patient Date of Birth" value="{{ old('date_of_birth') }}" >
                                <span class="help-block text-primary"><small>Format: </small><code>YYYY-MM-DD</code></span>
                            </div>
                        </div>
                        <div class="col-lg-6 col-xs-12">
                            <div class="form-group">
                                <label class="form-control-label">Religion </label>
                                <select class="form-control" name="religion">
                                    <option value="UNKNOWN" {{ (old('religion') == 'UNKNOWN') ? 'selected' : '' }}>UNKNOWN</option>
                                    <option value="CHRISTIANITY" {{ (old('religion') == 'CHRISTIANITY') ? 'selected' : '' }}>CHRISTIANITY</option>
                                    <option value="ISLAM" {{ (old('religion') == 'ISLAM') ? 'selected' : '' }}>ISLAM</option>
                                    <option value="TRADITIONAL" {{ (old('religion') == 'TRADITIONAL') ? 'selected' : '' }}>TRADITIONAL</option>
                                    <option value="OTHERS" {{ (old('religion') == 'OTHERS') ? 'selected' : '' }}>OTHERS</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-12 col-xs-12">
                            <div class="form-group">
                                <label class="form-control-label">Address </label>
                                <input class="form-control" type="text" name="address" placeholder="Patient Address" value="{{ old('address') }}" >
                                <span class="help-block text-primary"><small>Home OR Contact Address</small></span>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-4 col-xs-12">
                            <div class="form-group">
                                <label class="form-control-label"><abbr title="LOCAL GOVERNMRNT AREA">LGA</abbr> </label>
                                <input class="form-control" type="text" name="LGA" placeholder="Patient LGA" value="{{ old('LGA') }}" >
                            </div>
                        </div>
                        <div class="col-lg-4 col-xs-12">
                            <div class="form-group">
                                <label class="form-control-label">State of Origin </label>
                                <input class="form-control" type="text" name="state_of_origin" placeholder="Patient State of Origin" value="{{ old('state_of_origin') }}" >
                            </div>
                        </div>
                        <div class="col-lg-4 col-xs-12">
                            <div class="form-group">
                                <label class="form-control-label">Nationality </label>
                                <input class="form-control" type="text" name="nationality" placeholder="Patient Nationality" value="{{ old('nationality') }}" >
                            </div>
                        </div>
                    </div>

                    <div class="text-right">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Create</button>
                    </div>

                    <br>
                    <h6 class=""><strong>Occupation Details</strong></h6>

                    <div class="row">
                        <div class="col-lg-6 col-xs-12">
                            <div class="form-group">
                                <label class="form-control-label">Occupation </label>
                                <input class="form-control" type="text" name="occupation" placeholder="Patient Occupation" value="{{ old('occupation') }}" >
                            </div>
                        </div>
                        <div class="col-lg-6 col-xs-12">
                            <div class="form-group">
                                <label class="form-control-label">Office Address </label>
                                <input class="form-control" type="text" name="office_address" placeholder="Patient Office Address" value="{{ old('office_address') }}" >
                            </div>
                        </div>
                    </div>

                    <br>
                    <h6 class=""><strong>Next of Kin Details</strong></h6>

                    <div class="row">
                        <div class="col-lg-6 col-xs-12">
                            <div class="form-group">
                                <label class="form-control-label"><abbr title="Next of Kin">NOK</abbr> Name </label>
                                <input class="form-control" type="text" name="next_of_kin_name" placeholder="Next of Kin Name" value="{{ old('next_of_kin_name') }}">
                            </div>
                        </div>
                        <div class="col-lg-6 col-xs-12">
                            <div class="form-group">
                                <label class="form-control-label"><abbr title="Next of Kin">NOK</abbr> Relationship </label>
								<input class="form-control" type="text" name="next_of_kin_relationship" placeholder="Next of Kin Relationship" value="{{ old('next_of_kin_relationship') }}">
                            </div>
                        </div>
                        <div class="col-lg-6 col-xs-12">
                            <div class="form-group">
                                <label class="form-control-label"><abbr title="Next of Kin">NOK</abbr> Address </label>
								<input class="form-control" type="text" name="next_of_kin_address" placeholder="Next of Kin Address" value="{{ old('next_of_kin_address') }}">
                            </div>
                        </div>
                        <div class="col-lg-6 col-xs-12">
                            <div class="form-group">
                                <label class="form-control-label"><abbr title="Next of Kin">NOK</abbr> Phone Number </label>
                                <input class="form-control" type="text" name="next_of_kin_phone_number" placeholder="NOK Phone Number" value="{{ old('next_of_kin_phone_number') }}">
                            </div>
                        </div>
                    </div>

                    <br>
                    <h6 class=""><strong>Other Details</strong></h6>

                    <div class="row">
                        <div class="col-lg-4 col-xs-12">
                            <div class="form-group">
                                <label class="form-control-label">Blood Group </label>
                                <input class="form-control" type="text" name="blood_group" placeholder="Blood Group" value="{{ old('blood_group') }}">
                            </div>
                        </div>
                        <div class="col-lg-4 col-xs-12">
                            <div class="form-group">
                                <label class="form-control-label">Weight </label>
                                <div class="input-group">
                                    <input class="form-control" type="text" name="weight" placeholder="Weight" value="{{ old('weight') }}">
                                    <div class="input-group-addon">KG</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-xs-12">
                            <div class="form-group">
                                <label class="form-control-label">Height </label>
                                <div class="input-group">
    								<input class="form-control" type="text" name="height" placeholder="Height" value="{{ old('height') }}">
                                    <div class="input-group-addon">CM</div>
                                </div>
                            </div>
                        </div>
                    </div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-primary">Create</button>
				</div>
			</div><!-- /.modal-content -->
		</div><!-- /.modal-dialog -->
	</div><!-- /.modal -->
</form>