<form action="{{ url('/cases/update/'.$active_object->id) }}" method="post">
	<div class="modal fade" id="modal-update-{{ $active_object->id }}">
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title">Update Case Form</h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
						<span class="sr-only">Close</span>
					</button>
				</div>
				<div class="modal-body">
					{{ csrf_field() }}

					<div class="form-group">
						<label class="form-control-label">Title <span class="text-danger">*</span></label>
						<input class="form-control" type="text" name="title" placeholder="Title" value="{{ old('title', $active_object->title) }}" required>
					</div>

                    <div class="row">
                        <div class="col-lg-6 col-xs-12">
                            <div class="form-group">
                            	<label class="form-control-label">Select Patient <span class="text-danger">*</span></label>
								<select class="form-control" name="patient" required disabled>
									@foreach ($patients as $element)
										<option value="{{ $element->id }}" {{ (old('patient', $active_object->patient_id) == $element->id) ? 'selected' : '' }}>{{ $element->name }} [{{ $element->telephone }}]</option>
									@endforeach
								</select>
                            </div>
                        </div>
                        <div class="col-lg-6 col-xs-12">
                            <div class="form-group">
                            	@php
                            		$case_doctors = array();
                            		foreach ($active_object->case_doctors as $value) {
                            			array_push($case_doctors, $value->doctor_id);
                            		}
                            	@endphp
                                <label class="form-control-label">Doctors <span class="text-danger">*</span></label>
								<select class="select-doctors" name="doctors[]" required multiple>
									@foreach ($users as $element)
										<option value="{{ $element->id }}" {{ in_array($element->id, old('doctors', $case_doctors)) ? 'selected' : '' }}>{{ $element->full_name() }} [{{ $element->role->name }}]</option>
									@endforeach
								</select>
                            </div>
                        </div>
                    </div>

					<div class="form-group">
						<label class="form-control-label">Symptoms </label>
						<textarea name="symptoms" class="form-control" rows="2" placeholder="Symptoms">{{ old('symptoms', $active_object->symptoms) }}</textarea>
					</div>

                    <div class="row">
                        <div class="col-lg-6 col-xs-12">
                            <div class="form-group">
                            	<label class="form-control-label">Treatment </label>
								<textarea name="treatment" class="form-control" rows="3" placeholder="Treatment">{{ old('treatment', $active_object->treatment) }}</textarea>
                            </div>
                        </div>
                        <div class="col-lg-6 col-xs-12">
                            <div class="form-group">
                                <label class="form-control-label">Medicine </label>
								<textarea name="medicine" class="form-control" rows="3" placeholder="Medicine">{{ old('medicine', $active_object->medicine) }}</textarea>
                            </div>
                        </div>
                    </div>

					<div class="form-group">
						<label class="form-control-label form-check form-check-inline">
							<input type="checkbox" name="is_consultation" class="form-check-input" value="1" {{ old('is_consultation', $active_object->is_consultation) == 1 ? 'checked' : '' }}> Is Consultation
						</label>
						<label class="form-control-label form-check form-check-inline">
							<input type="checkbox" name="is_emergency" class="form-check-input" value="1" {{ old('is_emergency', $active_object->is_emergency) == 1 ? 'checked' : '' }}> is Emergency
						</label>
						<label class="form-control-label form-check form-check-inline">
							<input type="checkbox" name="is_delivery" class="form-check-input" value="1" {{ old('is_delivery', $active_object->is_delivery) == 1 ? 'checked' : '' }}> is Delivery
						</label>
						<label class="form-control-label form-check form-check-inline">
							<input type="checkbox" name="is_success" class="form-check-input" value="1" {{ old('is_success', $active_object->is_success) == 1 ? 'checked' : '' }} {{ ($active_object->is_delivery) ? '' : 'disabled' }}> is Delivery a Success
						</label>
					</div>

					<div class="form-group">
						<label class="form-control-label">Discharged On <span class="text-danger">*</span></label>
						<input class="form-control" type="date" name="discharged_on" placeholder="Date Discharged (Y-m-d)" value="{{ old('discharged_on', $active_object->discharged_on) }}">
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-primary">Update</button>
				</div>
			</div><!-- /.modal-content -->
		</div><!-- /.modal-dialog -->
	</div><!-- /.modal -->
</form>