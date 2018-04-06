<form action="{{ url('/patients/create') }}" method="post">
	<div class="modal fade" id="modal-create">
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title">Create Patient Form</h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
						<span class="sr-only">Close</span>
					</button>
				</div>
				<div class="modal-body">
					{{ csrf_field() }}

					<div class="form-group">
						<label class="form-control-label">Name <span class="text-danger">*</span></label>
						<input class="form-control" type="text" name="name" placeholder="Patient Name" value="{{ old('name') }}" required>
					</div>

                    <div class="row">
                        <div class="col-lg-6 col-xs-12">
                            <div class="form-group">
                                <label class="form-control-label">Gender </label>
								<select class="form-control" name="gender">
									<option value="UNKNOWN" {{ (old('gender') == 'UNKNOWN') ? 'selected' : '' }}>UNKNOWN</option>
									<option value="MALE" {{ (old('gender') == 'MALE') ? 'selected' : '' }}>MALE</option>
									<option value="FEMALE" {{ (old('gender') == 'FEMALE') ? 'selected' : '' }}>FEMALE</option>
								</select>
                            </div>
                        </div>
                        <div class="col-lg-6 col-xs-12">
                            <div class="form-group">
                                <label class="form-control-label">Telephone </label>
								<input class="form-control" type="tel" name="telephone" placeholder="Patient Telephone" value="{{ old('telephone') }}">
                            </div>
                        </div>
                    </div>

                    <br>
                    <h6>Next of Kin Details</h6>

                    <div class="row">
                        <div class="col-lg-6 col-xs-12">
                            <div class="form-group">
                                <label class="form-control-label">Next of Kin </label>
								<input class="form-control" type="text" name="next_of_kin" placeholder="Next of Kin" value="{{ old('next_of_kin') }}">
                            </div>
                        </div>
                        <div class="col-lg-6 col-xs-12">
                            <div class="form-group">
                                <label class="form-control-label">Next of Kin Telephone </label>
								<input class="form-control" type="text" name="next_of_kin_telephone" placeholder="Next of Kin Telephone" value="{{ old('next_of_kin_telephone') }}">
                            </div>
                        </div>
                    </div>

                    <br>
                    <h6>Other Details</h6>

					<div class="form-group">
						<label class="form-control-label">Blood Group </label>
						<input class="form-control" type="text" name="blood_group" placeholder="Blood Group" value="{{ old('blood_group') }}">
					</div>

                    <div class="row">
                        <div class="col-lg-6 col-xs-12">
                            <div class="form-group">
                                <label class="form-control-label">Weight </label>
								<input class="form-control" type="text" name="weight" placeholder="Weight" value="{{ old('weight') }}">
                            </div>
                        </div>
                        <div class="col-lg-6 col-xs-12">
                            <div class="form-group">
                                <label class="form-control-label">Height </label>
								<input class="form-control" type="text" name="height" placeholder="Height" value="{{ old('height') }}">
                            </div>
                        </div>
                    </div>

					{{-- <div class="form-group">
						<label class="form-control-label">Symptoms </label>
						<textarea name="symptoms" class="form-control" rows="3" placeholder="Symptoms">{{ old('symptoms') }}</textarea>
					</div> --}}
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-primary">Create</button>
				</div>
			</div><!-- /.modal-content -->
		</div><!-- /.modal-dialog -->
	</div><!-- /.modal -->
</form>