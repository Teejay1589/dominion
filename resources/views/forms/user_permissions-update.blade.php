<form action="{{ url('/m/user-permissions/update/'.$active_object->id) }}" method="post">
	<div class="modal fade" id="modal-update-{{ $active_object->id }}">
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
						<span class="sr-only">Close</span>
					</button>
					<h4 class="modal-title">Update User Permission Form</h4>
				</div>
				<div class="modal-body">
					{{ csrf_field() }}

					<div class="row">
                        <div class="col-lg-6 col-xs-12">
							<div class="form-group">
								<label class="form-control-label">Select Table: <span class="text-danger">*</span></label>
								<select class="form-control" name="table" required>
									<option value="">NONE</option>
									@php
										$tables = array('billings', 'patients', 'permissions', 'posts', 'surgeries', 'surgery_names', 'users', 'user_permissions', 'visits');
									@endphp
									@foreach ($tables as $obj)
										<option value="{{ $obj }}" {{ ($obj == $active_object->table) ? 'selected' : '' }}>{{ str_ireplace('_', ' ', $obj) }}</option>
									@endforeach
								</select>
							</div>
						</div>
                        <div class="col-lg-6 col-xs-12">
							<div class="form-group">
								<label class="form-control-label">Select Action: <span class="text-danger">*</span></label>
								<select class="form-control" name="action" required>
									<option value="">NONE</option>
									@php
										$actions = array('view', 'create', 'update', 'delete');
									@endphp
									@foreach ($actions as $obj)
										<option value="{{ $obj }}" {{ ($obj == $active_object->action) ? 'selected' : '' }}>{{ $obj }}</option>
									@endforeach
								</select>
							</div>
						</div>
					</div>

                    <div class="form-group">
						<label class="form-control-label">Select User <span class="text-danger">*</span></label>
						<select class="select-user" name="user" required multiple>
							{{-- <option value="">NONE</option> --}}
							@foreach ($users as $element)
								<option value="{{ $element->id }}" {{ ($active_object->user_id == $element->id) ? 'selected' : '' }}>{{ $element->full_name() }} <strong>{{ optional($element->role)->role }}</strong></option>
							@endforeach
						</select>
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