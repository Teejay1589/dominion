<form action="{{ url('/m/cases/create') }}" method="post">
	<div class="modal fade" id="modal-create">
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title">Create Case Form</h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
						<span class="sr-only">Close</span>
					</button>
				</div>
				<div class="modal-body">
					{{ csrf_field() }}

					{{-- 'user_id', 'patient_id', 'doctor1_id', 'doctor2_id', 'doctor3_id', 'title', 'symptoms', 'treatment', 'medicine', 'is_consultation', 'is_emergency', 'is_surgery', 'is_delivery', 'is_success', 'discharged_on', --}}

					<div class="form-group">
						<label class="form-control-label">Title <span class="text-danger">*</span></label>
						<input class="form-control" type="text" name="title" placeholder="Title" value="{{ old('title') }}" required>
					</div>

                    <div class="row">
                        <div class="col-lg-6 col-xs-12">
                            <div class="form-group">
                            	<label class="form-control-label">Select Patient <span class="text-danger">*</span></label>
								<select class="form-control" name="patient" required>
									@foreach ($patients as $element)
										<option value="{{ $element->id }}" {{ (old('patient') == $element->id) ? 'selected' : '' }}>{{ $element->first_name.' '.$element->last_name }} [{{ $element->phone }}]</option>
									@endforeach
								</select>
                            </div>
                        </div>
                        <div class="col-lg-6 col-xs-12">
                            <div class="form-group">
                                <label class="form-control-label">Doctors <span class="text-danger">*</span></label>
								<select class="select-doctors" name="doctors[]" required multiple>
									@foreach ($users as $element)
										<option value="{{ $element->id }}" {{ in_array($element->id, old('doctors', array())) ? 'selected' : '' }}>{{ $element->full_name() }} [{{ $element->role->name }}]</option>
									@endforeach
								</select>
                            </div>
                        </div>
                    </div>

					<div class="form-group">
						<label class="form-control-label">Symptoms </label>
						<textarea name="symptoms" class="form-control" rows="2" placeholder="Symptoms">{{ old('symptoms') }}</textarea>
					</div>

                    <div class="row">
                        <div class="col-lg-6 col-xs-12">
                            <div class="form-group">
                            	<label class="form-control-label">Treatment </label>
								<textarea name="treatment" class="form-control" rows="3" placeholder="Treatment">{{ old('treatment') }}</textarea>
                            </div>
                        </div>
                        <div class="col-lg-6 col-xs-12">
                            <div class="form-group">
                                <label class="form-control-label">Medicine </label>
								<textarea name="medicine" class="form-control" rows="3" placeholder="Medicine">{{ old('medicine') }}</textarea>
                            </div>
                        </div>
                    </div>

					<div class="form-group">
						<label class="form-control-label form-check form-check-inline">
							<input type="checkbox" name="is_consultation" class="form-check-input" value="1" {{ old('is_consultation') == 1 ? 'checked' : '' }}> Is Consultation
						</label>
						<label class="form-control-label form-check form-check-inline">
							<input type="checkbox" name="is_emergency" class="form-check-input" value="1" {{ old('is_emergency') == 1 ? 'checked' : '' }}> is Emergency
						</label>
						<label class="form-control-label form-check form-check-inline">
							<input type="checkbox" name="is_delivery" class="form-check-input" value="1" {{ old('is_delivery') == 1 ? 'checked' : '' }}> is Delivery
						</label>
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