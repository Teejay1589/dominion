<form action="{{ url('/m/surgeries/update/'.$active_object->id) }}" method="post">
	<div class="modal fade" id="modal-update-{{ $active_object->id }}">
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title">Update Surgery Form</h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
						<span class="sr-only">Close</span>
					</button>
				</div>
				<div class="modal-body">
					{{ csrf_field() }}

                    <div class="row">
                        <div class="col-lg-6 col-xs-12">
                            <div class="form-group">
                            	<label class="form-control-label">Select Case <span class="text-danger">*</span></label>
								<select class="form-control" name="case_old" required disabled>
									{{-- <option value="">NONE</option> --}}
									@foreach ($cases as $element)
										<option value="{{ $element->id }}" {{ (old('case', $active_object->case_id) == $element->id) ? 'selected' : '' }}>{{ $element->title }}</option>
									@endforeach
								</select>
								<input type="hidden" name="case" value="{{ $active_object->case_id }}">
                            </div>
                        </div>
                        <div class="col-lg-6 col-xs-12">
                            <div class="form-group">
                                <label class="form-control-label">Name <span class="text-danger">*</span></label>
                                {{-- <input class="form-control" type="text" name="name" placeholder="Surgery Name" value="{{ old('name', $active_object->name) }}" required> --}}
                                <select class="select-surgery_name" name="name" required multiple>
                                	@php
                                		$found = 1;
                                	@endphp
									@foreach ($surgery_names as $element)
										<option value="{{ $element->surgery_name }}" {{ (old('name', $active_object->name) == $element->surgery_name) ? 'selected' : '' }}>{{ $element->surgery_name }}</option>
										@php
											if ( old('name', $active_object->name) == $element->surgery_name ) {
		                                		$found = 0;
											}
	                                	@endphp
									@endforeach
									@if ( $found )
										<option value="{{ $active_object->name }}" selected>{{ $active_object->name }}</option>
									@endif
								</select>
                                <span class="form-text"><small>Please give this surgery a name.</small></span>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-6 col-xs-12">
                            <div class="form-group">
                                <label class="form-control-label">Surgery Date <span class="text-danger">*</span></label>
                                <input class="form-control" type="date" name="surgery_date" placeholder="YYYY-MM-DD" value="{{ old('surgery_date', $active_object->surgery_date) }}" required>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                    	<label class="form-control-label">Complications </label>
						<textarea name="complications" class="form-control" rows="3" placeholder="Complications">{{ old('complications', $active_object->complications) }}</textarea>
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