<form action="{{ url('/m/visits/update/'.$active_object->id) }}" method="post">
	<div class="modal fade" id="modal-update-{{ $active_object->id }}">
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
						<span class="sr-only">Close</span>
					</button>
					<h4 class="modal-title">Update Visit Form</h4>
				</div>
				<div class="modal-body">
					{{ csrf_field() }}

					<div class="row">
						<div class="col-lg-4 col-xs-12">
							<div class="form-group">
								<label class="form-control-label">Type <span class="text-danger">*</span></label>
								<select class="form-control" name="type" required>
									@php
										$visit_types = collect(['CONSULTATION', 'DELIVERY', 'EMERGENCY', 'OTHERS']);
									@endphp
									@foreach ($visit_types as $element)
										<option value="{{ $element }}" {{ ($active_object->type == $element) ? 'selected' : '' }}>{{ $element }}</option>
									@endforeach
								</select>
							</div>
						</div>

						<div class="col-lg-8 col-xs-12">
							<div class="form-group">
								<label class="form-control-label">Title <span class="text-danger">*</span></label>
								<input class="form-control" type="text" name="title" placeholder="Title" value="{{ $active_object->title }}" required>
							</div>
						</div>
					</div>

                    <div class="row">
                        <div class="col-lg-6 col-xs-12">
                            <div class="form-group">
                            	<label class="form-control-label">Select Patient <span class="text-danger">*</span></label>
								<select class="form-control" name="patient" required disabled>
									@foreach ($patients->where('id', $active_object->patient_id) as $element)
										<option value="{{ $element->id }}" {{ ($active_object->patient_id == $element->id) ? 'selected' : '' }}>{{ $element->first_name.' '.$element->last_name }} [{{ $element->phone_number }}] [{{ $element->file_number }}]</option>
									@endforeach
								</select>
                            </div>
                        </div>
                        <div class="col-lg-6 col-xs-12">
                            <div class="form-group">
                            	@php
                            		$visit_doctors = array();
                            		foreach ($active_object->visit_doctors as $value) {
                            			array_push($visit_doctors, $value->doctor_id);
                            		}
                            	@endphp
                                <label class="form-control-label">Doctors {{-- <span class="text-danger">*</span> --}}</label>
								<select class="select-doctors" name="doctors[]" multiple>
									@foreach ($users as $element)
										<option value="{{ $element->id }}" {{ in_array($element->id, old('doctors', $visit_doctors)) ? 'selected' : '' }}>{{ $element->full_name() }} [{{ $element->role->name }}]</option>
									@endforeach
								</select>
                            </div>
                        </div>
					</div>

					<div class="text-right">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>

                    <br>
                    <h6 class=""><strong>More Details</strong></h6>

					<div class="row">
                        <div class="col-lg-6 col-xs-12">
                            <div class="form-group">
								<label class="form-control-label">Subjects </label>
								<textarea name="subjects" class="form-control" rows="4" placeholder="Subjects">{{ $active_object->subjects }}</textarea>
							</div>
                        </div>
                        <div class="col-lg-6 col-xs-12">
                            <div class="form-group">
								<label class="form-control-label">Objects </label>
								<textarea name="objects" class="form-control" rows="4" placeholder="Objects">{{ $active_object->objects }}</textarea>
							</div>
                        </div>
					</div>

					<div class="row">
                        <div class="col-lg-6 col-xs-12">
                            <div class="form-group">
								<label class="form-control-label">Assessment </label>
								<textarea name="assessment" class="form-control" rows="4" placeholder="Assessment">{{ $active_object->assessment }}</textarea>
							</div>
                        </div>
                        <div class="col-lg-6 col-xs-12">
                            <div class="form-group">
								<label class="form-control-label">Plans </label>
								<textarea name="plans" class="form-control" rows="4" placeholder="plans">{{ $active_object->plans }}</textarea>
							</div>
                        </div>
                    </div>

					<div class="row">
                        <div class="col-lg-12 col-xs-12">
                            <div class="form-group">
								<label class="form-control-label">Summary </label>
								<textarea name="summary" class="form-control" rows="4" placeholder="Summary">{{ $active_object->summary }}</textarea>
							</div>
                        </div>
                    </div>

					<div class="form-group">
						<label class="form-control-label form-check form-check-inline">
							<input type="checkbox" name="successful_delivery" class="form-check-input" value="1" {{ ($active_object->successful_delivery == 1) ? 'checked' : '' }} {{ ($active_object->type == 'DELIVERY') ? '' : 'disabled' }}> Successful Delivery?
						</label>
					</div>

					<div class="form-group">
						<label class="form-control-label">Discharged On </label>
						<input class="form-control" type="date" name="discharged_on" placeholder="Date Discharged (Y-m-d)" value="{{ is_null($active_object->discharged_on) ? '' : Carbon::createFromFormat("Y-m-d H:i:s", $active_object->discharged_on)->format("Y-m-d") }}">
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