<form action="{{ url('/m/surgery_names/create') }}" method="post">
	<div class="modal fade" id="modal-create">
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
						<span class="sr-only">Close</span>
					</button>
					<h4 class="modal-title">Create Surgery Name Form</h4>
				</div>
				<div class="modal-body">
					{{ csrf_field() }}

                    <div class="form-group">
                        <label class="form-control-label">Surgery Name <span class="text-danger">*</span></label>
                        <input class="form-control" type="text" name="surgery_name" placeholder="Surgery Name" value="{{ old('surgery_name') }}" required>
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