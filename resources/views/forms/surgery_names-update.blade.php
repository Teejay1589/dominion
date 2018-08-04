<form action="{{ url('/m/surgery_names/update/'.$active_object->id) }}" method="post">
	<div class="modal fade" id="modal-update-{{ $active_object->id }}">
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
						<span class="sr-only">Close</span>
					</button>
					<h4 class="modal-title">Update Surgery Name Form</h4>
				</div>
				<div class="modal-body">
					{{ csrf_field() }}

                    <div class="form-group">
                        <label class="form-control-label">Surgery Name <span class="text-danger">*</span></label>
                        <input class="form-control" type="text" name="surgery_name" placeholder="Surgery Name" value="{{ $active_object->surgery_name }}" required>
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