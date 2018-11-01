<form action="{{ url('/m/visits/create') }}" method="post">
	<div class="modal fade" id="modal-create">
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
						<span class="sr-only">Close</span>
					</button>
					<h4 class="modal-title">Create Visit Form</h4>
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
										<option value="{{ $element }}" {{ old('type') == $element ? 'selected' : '' }}>{{ $element }}</option>
									@endforeach
								</select>
							</div>
						</div>

						<div class="col-lg-8 col-xs-12">
							<div class="form-group">
								<label class="form-control-label">Title <span class="text-danger">*</span></label>
								<input class="form-control" type="text" name="title" placeholder="Title" value="{{ old('title') }}" required>
							</div>
						</div>
					</div>

      	<div class="row">
          <div class="col-lg-6 col-xs-12">
              <div class="form-group">
              	<label class="form-control-label">Select Patient <span class="text-danger">*</span></label>
									<select class="select-patient" name="patient" required multiple>
										@foreach ($patients->sortByDesc('id') as $element)
											@if (isset($visits->filter) && $visits->filter == "patient_file_number")
												<option value="{{ $element->id }}" {{ (old('patient', isset($active_object) ? $active_object->id : null) == $element->id || isset($visits->searchterm) && $visits->searchterm == $element->file_number) ? 'selected' : '' }}>{{ $element->first_name.' '.$element->last_name }} [{{ $element->phone_number }}] [{{ $element->file_number }}]</option>
											@else
												<option value="{{ $element->id }}" {{ (old('patient', isset($active_object) ? $active_object->id : null) == $element->id) ? 'selected' : '' }}>{{ $element->first_name.' '.$element->last_name }} [{{ $element->phone_number }}] [{{ $element->file_number }}]</option>
											@endif
										@endforeach
									</select>
                </div>
            </div>
            <div class="col-lg-6 col-xs-12">
                <div class="form-group">
                    <label class="form-control-label">Doctors {{-- <span class="text-danger">*</span> --}}</label>
											<select class="select-doctors" name="doctors[]" multiple>
												@foreach ($users as $element)
													<option value="{{ $element->id }}" {{ in_array($element->id, old('doctors', array())) ? 'selected' : '' }}>{{ $element->full_name() }} [{{ $element->role->name }}]</option>
												@endforeach
											</select>
                    </div>
                </div>
            </div>

						<div class="form-group">
							<label class="form-control-label">Admission Date </label>
							<input class="form-control" type="date" name="admission_date" placeholder="Admission Date (Y-m-d)" value="{{ old('admission_date') }}">
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