<form action="{{ url('/m/blog/post/edit/'.$active_object->id) }}" method="post">
	<div class="modal fade" id="modal-update-{{ $active_object->id }}">
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
						<span class="sr-only">Close</span>
					</button>
					<h4 class="modal-title">Update Post Form</h4>
				</div>
				<div class="modal-body">
					{{ csrf_field() }}

                    <div class="form-group">
                        <label class="form-control-label">Title:</label>
                        <input class="form-control" type="text" name="title" value="{{ $active_object->title }}">
                    </div>

                    <div class="form-group">
                        <label class="form-spacing-top">Body:</label>
                        <textarea class="form-control" name="body" rows="5">{{ $active_object->body }}</textarea>
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