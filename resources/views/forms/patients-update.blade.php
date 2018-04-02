<form action="{{ url('/patients/update/'.$active_object->id) }}" method="post">
	<div class="modal fade" id="modal-update-{{ $active_object->id }}">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title">Create Patient Form</h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
						<span class="sr-only">Close</span>
					</button>
				</div>
				<div class="modal-body">
					{{ csrf_field() }}

					<div id="patient-dependent">
						<div class="form-group">
							<label class="form-control-label">Name <span class="text-danger">*</span></label>
							<input class="form-control" type="text" name="name" placeholder="Patient Name" value="{{ old('name', $active_object->name) }}" required>
						</div>

						<div class="form-group">
							<label class="form-control-label">Gender </label>
							<select class="form-control" name="gender">
								<option {{ (old('gender', $active_object->gender) == 'UNKNOWN') ? 'selected' : '' }}>UNKNOWN</option>
								<option {{ (old('gender', $active_object->gender) == 'MALE') ? 'selected' : '' }}>MALE</option>
								<option {{ (old('gender', $active_object->gender) == 'FEMALE') ? 'selected' : '' }}>FEMALE</option>
							</select>
						</div>

						<div class="form-group">
							<label class="form-control-label">Telephone </label>
							<input class="form-control" type="tel" name="telephone" placeholder="Patient Telephone" value="{{ old('telephone', $active_object->telephone) }}">
						</div>

						<div class="form-group">
							<label class="form-control-label">Next of Kin </label>
							<input class="form-control" type="text" name="next_of_kin" placeholder="Next of Kin" value="{{ old('next_of_kin', $active_object->next_of_kin) }}">
						</div>

						<div class="form-group">
							<label class="form-control-label">Next of Kin Telephone </label>
							<input class="form-control" type="text" name="next_of_kin_telephone" placeholder="Next of Kin Telephone" value="{{ old('next_of_kin_telephone', $active_object->next_of_kin_telephone) }}">
						</div>

						<div class="form-group">
							<label class="form-control-label">Blood Group </label>
							<input class="form-control" type="text" name="blood_group" placeholder="Blood Group" value="{{ old('blood_group', $active_object->blood_group) }}">
						</div>

						<div class="form-group">
							<label class="form-control-label">Genotype </label>
							<input class="form-control" type="text" name="genotype" placeholder="Genotype" value="{{ old('genotype', $active_object->genotype) }}">
						</div>
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