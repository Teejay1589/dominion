<form action="{{ url('/cases/update/'.$active_object->id) }}" method="post">
	<div class="modal fade" id="modal-update-{{ $active_object->id }}">
		<div class="modal-dialog" role="document">
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

					<div class="form-group">
						<label class="form-control-label">Select Patient <span class="text-danger">*</span></label>
						<select class="form-control" name="patient" required>
							@foreach ($patients as $element)
								<option value="{{ $element->id }}" {{ (old('patient', $active_object->patient_id) == $element->id) ? 'selected' : '' }}>{{ $element->name }} [{{ $element->telephone }}]</option>
							@endforeach
						</select>
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