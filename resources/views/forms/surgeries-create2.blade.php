<form action="{{ url('/m/surgeries/create/'.$active_object->id) }}" method="post">
	<div class="modal fade" id="modal-create-{{ $active_object->id }}">
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
						<span class="sr-only">Close</span>
					</button>
					<h4 class="modal-title">Create Re-Surgery Form</h4>
				</div>
				<div class="modal-body">
					{{ csrf_field() }}

					<div class="form-group">
						<label class="form-control-label">Select Visit <span class="text-danger">*</span></label>
						<select class="form-control" name="visit" required disabled>
							<option value="">NONE</option>
							@foreach (App\Visit::where('id', $active_object->visit_id)->get() as $element)
								<option value="{{ $element->id }}" {{ (old('visit', $active_object->visit_id) == $element->id) ? 'selected' : '' }}>{{ $element->title }}</option>
							@endforeach
						</select>
						<input type="hidden" name="visit" value="{{ $active_object->visit_id }}">
					</div>

                    <div class="row">
						<div class="col-lg-6 col-xs-12">
							<div class="form-group">
								<label class="form-control-label">Surgery Name <span class="text-danger">*</span></label>
								<select class="select-surgery_name" name="surgery_name" required multiple>
									@foreach ($surgery_names as $element)
										<option value="{{ $element->surgery_name }}" {{ (old('surgery_name') == $element->surgery_name) ? 'selected' : '' }}>{{ $element->surgery_name }}</option>
									@endforeach
								</select>
								<span class="form-text"><small>Please give this surgery a name.</small></span>
							</div>
						</div>
                        <div class="col-lg-6 col-xs-12">
                            <div class="form-group">
                                <label class="form-control-label">Surgery Date <span class="text-danger">*</span></label>
                                <input class="form-control" type="date" name="surgery_date" placeholder="YYYY-MM-DD" value="{{ old('surgery_date') }}" required>
                            </div>
                        </div>
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