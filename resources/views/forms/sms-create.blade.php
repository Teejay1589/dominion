<form action="{{ url('/m/sms/create') }}" method="post">
	<div class="modal fade" id="modal-create">
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
						<span class="sr-only">Close</span>
					</button>
					<h4 class="modal-title">Send Sms</h4>
				</div>
				<div class="modal-body">
					{{ csrf_field() }}

					<div class="form-group select-patients">
						<label class="form-control-label">Select Patients <span class="text-danger">*</span></label>
						<select class="select-patients" name="patients[]" multiple>
							@foreach ($patients->sortByDesc('id') as $element)
								<option value="{{ $element->id }}" {{ (old('patient', isset($active_object) ? $active_object->id : null) == $element->id) ? 'selected' : '' }}>{{ $element->first_name.' '.$element->last_name }} [{{ $element->phone_number }}] [{{ $element->file_number }}]</option>
							@endforeach
						</select>
						<span class="form-text"><small><span class="text-danger">min: 1, max: 200</span></small></span>
					</div>

					<div class="form-group">
						<label class="form-control-label">
							<input type="checkbox" id="checkAllPatients" name="all_patients">
							<span>all patients</span>
						</label>
					</div>

					<div class="form-group">
						<label class="form-control-label">SMS From </label>
						<input class="form-control" type="text" name="from" placeholder="Sms From" value="{{ old('from', App\Setting::find(1)->sms_from) }}" >
						{{-- <span class="form-text"><small><strong>DMC</strong> by default.</small></span> --}}
					</div>

					<div class="form-group">
						<label class="form-control-label">SMS Message <span class="text-danger">*</span></label>
						<textarea name="message" class="form-control" rows="5" placeholder="Message" required>{{ old('message') }}</textarea>
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