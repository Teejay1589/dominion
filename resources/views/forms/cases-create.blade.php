<form action="{{ url('/cases/create') }}" method="post">
	<div class="modal fade" id="modal-create">
		<div class="modal-dialog" role="document">
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

					<div class="form-group">
						<label class="form-control-label">Title <span class="text-danger">*</span></label>
						<input class="form-control" type="text" name="title" placeholder="Title" value="{{ old('title') }}" required>
					</div>

					<div class="form-group">
						<label class="form-control-label">Select Patient <span class="text-danger">*</span></label>
						<select class="form-control" name="patient" required>
							@foreach ($patients as $element)
								<option value="{{ $element->id }}" {{ (old('patient') == $element->id) ? 'selected' : '' }}>{{ $element->name }} [{{ $element->telephone }}]</option>
							@endforeach
						</select>
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