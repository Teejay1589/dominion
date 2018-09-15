<form action="{{ url('/m/sms/update/'.$active_object->id) }}" method="post">
	<div class="modal fade" id="modal-update-{{ $active_object->id }}">
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
						<span class="sr-only">Close</span>
					</button>
					<h4 class="modal-title">Update and Send Sms</h4>
				</div>
				<div class="modal-body">
					{{ csrf_field() }}

					<div class="form-group">
						@php
							$sms_patients = array();
							foreach ($active_object->sms_patients as $value) {
								array_push($sms_patients, $value->patient_id);
							}
						@endphp
						<label class="form-control-label">Select Patients <span class="text-danger">*</span></label>
						<select class="select-patients" name="patients[]" required multiple>
							@foreach ($patients->sortByDesc('id') as $element)
								<option value="{{ $element->id }}" {{ in_array($element->id, old('patients', $sms_patients)) ? 'selected' : '' }}>{{ $element->first_name.' '.$element->last_name }} [{{ $element->phone_number }}] [{{ $element->file_number }}]</option>
							@endforeach
						</select>
					</div>

					<div class="form-group">
						<label class="form-control-label">SMS From </label>
						<input class="form-control" type="text" name="from" placeholder="Sms From" value="{{ $active_object->from }}" >
						{{-- <span class="form-text"><small><strong>DMC</strong> by default.</small></span> --}}
					</div>

					<div class="form-group">
						<label class="form-control-label">SMS Message <span class="text-danger">*</span></label>
						<textarea name="message" class="form-control" rows="5" placeholder="Message">{{ $active_object->message }}</textarea>
						<span class="form-text"><small class="msg-characters">160 characters = 1 message unit</small></span>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-primary">Send</button>
				</div>
			</div><!-- /.modal-content -->
		</div><!-- /.modal-dialog -->
	</div><!-- /.modal -->
</form>