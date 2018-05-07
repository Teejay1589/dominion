<div class="modal fade" id="modal-view-{{ $active_object->id }}">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Viewing Patient: <small>{{ $active_object->first_name." ".$active_object->last_name }}</small></h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					<span class="sr-only">Close</span>
				</button>
			</div>
			<div class="modal-body">

				<div class="h5">Patient Details</div>
				<hr>
				<dl>
					<dt>First Name</dt>
					<dd>{{ $active_object->first_name }}</dd>
					<dt>Last Name</dt>
					<dd>{{ $active_object->last_name }}</dd>
					<dt>Gender</dt>
					<dd>{{ $active_object->gender }}</dd>
					<dt>Blood Group</dt>
					<dd>{{ $active_object->blood_group }}</dd>
					<dt>Weight</dt>
					<dd>{{ $active_object->weight }}</dd>
					<dt>Height</dt>
					<dd>{{ $active_object->height }}</dd>
				</dl>

				<div class="clearfix"></div>
				<br>

				<div class="h5">Contact Details</div>
				<hr>
				<dl>
					<dt>Email</dt>
					<dd>{{ $active_object->email }}</dd>
					<dt>Phone Number</dt>
					<dd>{{ $active_object->phone }}</dd>
				</dl>

				<div class="clearfix"></div>
				<br>

				<div class="h5">Next of Kin Details</div>
				<hr>
				<dl>
					<dt>Next of Kin</dt>
					<dd>{{ $active_object->next_of_kin }}</dd>
					<dt>Next of Kin Telephone</dt>
					<dd>{{ $active_object->next_of_kin_telephone }}</dd>
				</dl>

				<div class="clearfix"></div>
				<br>

				<div class="h5">Actions</div>
				<hr>
				<dl>
					<dt>Password</dt>
					<dd><a href="{{ url('/m/patients/password/reset/'.$active_object->id) }}">reset patient password</a></dd>
				</dl>

			</div><!-- /.modal-content -->
		</div><!-- /.modal-dialog -->
	</div><!-- /.modal -->
</div>