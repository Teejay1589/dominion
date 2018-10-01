<form action="{{ url('/m/patient_files/update/'.$active_object->id) }}" method="post" enctype="multipart/form-data">
	<div class="modal fade" id="modal-update-{{ $active_object->id }}">
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
						<span class="sr-only">Close</span>
					</button>
					<h4 class="modal-title">Update Patient File</h4>
				</div>
				<div class="modal-body">
					{{ csrf_field() }}

					<div class="form-group select-patients">
						<label class="form-control-label">Select Patient <span class="text-danger">*</span></label>
						<select class="select-patient" name="patient" required>
							@foreach ($patients->sortByDesc('id') as $element)
								<option value="{{ $element->id }}" {{ ($element->id == old('patient', $active_object->patient_id)) ? 'selected' : '' }}>{{ $element->first_name.' '.$element->last_name }} [{{ $element->phone_number }}] [{{ $element->file_number }}]</option>
							@endforeach
						</select>
					</div>

					<div class="form-group">
						<label class="form-control-label">File name </label>
						<input class="form-control" type="text" name="file_name" placeholder="File name" value="{{ $active_object->file_name }}" >
					</div>

					<div class="form-group">
						<label class="form-control-label">Replace File <span class="text-danger">*</span></label>
						<input class="form-control" type="file" name="file" placeholder="File" accept="image/*" >
						<span class="help-block">accepted formats: <code>.jpg, .jpeg, .png</code></span>
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