<form action="{{ url('/m/surgeries/create') }}" method="post">
	<div class="modal fade" id="modal-create">
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
						<span class="sr-only">Close</span>
					</button>
					<h4 class="modal-title">Create Surgery Form</h4>
				</div>
				<div class="modal-body">
					{{ csrf_field() }}

					<div class="form-group">
						<label class="form-control-label">Select Visit <span class="text-danger">*</span></label>
						<select class="select-visit" name="visit" required multiple>
							{{-- <option value="">NONE</option> --}}
							@foreach ($visits as $element)
								<option value="{{ $element->id }}" {{ (old('visit') == $element->id) ? 'selected' : '' }}>{{ $element->title }}</option>
							@endforeach
						</select>
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
                                <label class="form-control-label">Surgery Date </label>
                                <input class="form-control" type="date" name="surgery_date" placeholder="YYYY-MM-DD" value="{{ old('surgery_date') }}">
                            </div>
                        </div>
					</div>

					<div class="form-group">
                    	<label class="form-control-label">Complications </label>
						<textarea name="complications" class="form-control" rows="5" placeholder="Complications">{{ old('complications') }}</textarea>
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