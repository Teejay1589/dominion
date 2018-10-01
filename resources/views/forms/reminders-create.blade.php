<form action="{{ url('/m/reminders/create') }}" method="post">
	<div class="modal fade" id="modal-create">
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
						<span class="sr-only">Close</span>
					</button>
					<h4 class="modal-title">Add Reminder</h4>
				</div>
				<div class="modal-body">
					{{ csrf_field() }}

					{{-- <div class="form-group select-users">
						<label class="form-control-label">Select User <span class="text-danger">*</span></label>
						<select class="select-user" name="user" required>
							<option value="">Select a User</option>
							@foreach ($users->sortByDesc('id') as $element)
								<option value="{{ $element->id }}" {{ (old('user', isset($active_object) ? $active_object->id : null) == $element->id) ? 'selected' : '' }}>{{ $element->full_name() }} [{{ optional($element->role)->name }}]</option>
							@endforeach
						</select>
					</div> --}}

					<div class="form-group">
						<label class="form-control-label">Label <span class="text-danger">*</span></label>
						<input class="form-control" type="text" name="label" placeholder="Label" value="" required>
						<span class="form-text"><small><span class="text-danger">max: 180</span></small></span>
					</div>

					<div class="form-group">
						<label class="form-control-label form-check form-check-inline">
							<input type="checkbox" name="done" class="form-check-input" value="0" > Done?
						</label>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-primary">Add</button>
				</div>
			</div><!-- /.modal-content -->
		</div><!-- /.modal-dialog -->
	</div><!-- /.modal -->
</form>