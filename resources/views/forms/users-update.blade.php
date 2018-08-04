<form action="{{ url('/m/users/update/'.$active_object->id) }}" method="post">
	<div class="modal fade" id="modal-update-{{ $active_object->id }}">
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
						<span class="sr-only">Close</span>
					</button>
					<h4 class="modal-title">Update User Form</h4>
				</div>
				<div class="modal-body">
					{{ csrf_field() }}

					<div class="form-group">
						<label class="form-control-label">Role: <span class="text-danger">*</span></label>
						<select name="role" class="form-control">
							<option value="">NONE</option>
							@foreach (App\Role::all()->sortByDesc('id') as $item)
								<option value="{{ $item->id }}" {{ ($active_object->role_id == $item->id) ? 'selected' : '' }}>{{ $item->name }}</option>
							@endforeach
						</select>
						<span class="help-block text-primary">Please Note: Only the Admin can change Users Role</span>
					</div>

					<div class="row">
						<div class="col-lg-6 col-xs-12">
							<div class="form-group">
								<label class="form-control-label">First Name: <span class="text-danger">*</span></label>
								<input class="form-control" placeholder="Your First Name" type="text" name="first_name" value="{{ $active_object->first_name }}" required>
							</div>
						</div>
						<div class="col-lg-6 col-xs-12">
							<div class="form-group">
								<label class="form-control-label">Last Name: <span class="text-danger">*</span></label>
								<input class="form-control" placeholder="Your Last Name" type="text" name="last_name" value="{{ $active_object->last_name }}" required>
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-lg-6 col-xs-12">
							<div class="form-group">
								<label class="form-control-label">Email: <span class="text-danger">*</span></label>
								<input class="form-control" placeholder="Your Email" type="email" name="email" value="{{ $active_object->email }}" required>
							</div>
						</div>
						<div class="col-lg-6 col-xs-12">
							<div class="form-group">
								<label class="form-control-label">Phone: <span class="text-danger">*</span></label>
								<input class="form-control" placeholder="Your Phone Number" type="tel" name="phone" value="{{ $active_object->phone }}" required>
							</div>
						</div>
					</div>

					<div class="form-group">
						<label class="form-control-label">Gender: <span class="text-danger">*</span></label>
						<select name="gender" class="form-control" required>
							<option value="MALE" {{ ($active_object->gender == 'MALE') ? 'selected' : '' }}>MALE</option>
							<option value="FEMALE" {{ ($active_object->gender == 'FEMALE') ? 'selected' : '' }}>FEMALE</option>
						</select>
					</div>

					<div class="form-group text-right">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
						<button type="submit" class="btn btn-primary">Update</button>
					</div>

					<div class="form-group">
						<label class="form-control-label">Date of Birth: </label>
						<input class="form-control" type="date" name="date_of_birth" value="{{ $active_object->date_of_birth }}" placeholder="Y-m-d">
					</div>

					<div class="form-group">
						<label class="form-control-label">Address: </label>
						<textarea class="form-control" name="address" placeholder="Address" rows="2">{{ $active_object->address }}</textarea>
					</div>

					<div class="row">
						<div class="col-lg-6 col-xs-12">
							<div class="form-group">
								<label class="form-control-label">Country: </label>
								<input class="form-control" type="text" name="country" placeholder="Country" value="{{ $active_object->country }}">
							</div>
						</div>
						<div class="col-lg-6 col-xs-12">
							<div class="form-group">
								<label class="form-control-label">State: </label>
								<input class="form-control" type="text" name="state" placeholder="State" value="{{ $active_object->state }}">
							</div>
						</div>
					</div>

					<div class="form-group">
						<label class="form-control-label">Job: </label>
						<input class="form-control" type="text" name="job" placeholder="Job" value="{{ $active_object->job }}">
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