<form action="{{ url('/m/surgeries/update/'.$active_object->id) }}" method="post">
	<div class="modal fade" id="modal-update-{{ $active_object->id }}">
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
						<span class="sr-only">Close</span>
					</button>
					<h4 class="modal-title">Update Surgery Form</h4>
				</div>
				<div class="modal-body">
					{{ csrf_field() }}

                    <div class="form-group">
						<label class="form-control-label">Select Visit <span class="text-danger">*</span></label>
						<select class="form-control" name="visit_old" required disabled>
							{{-- <option value="">NONE</option> --}}
							@foreach ($visits->where('id', $active_object->visit_id) as $element)
								<option value="{{ $element->id }}" {{ ($active_object->visit_id == $element->id) ? 'selected' : '' }}>{{ $element->title }}</option>
							@endforeach
						</select>
						<input type="hidden" name="visit" value="{{ $active_object->visit_id }}">
					</div>

                    <div class="row">
                        <div class="col-lg-6 col-xs-12">
                            <div class="form-group">
                                <label class="form-control-label">Surgery Name <span class="text-danger">*</span></label>
                                <select class="select-surgery_name" name="surgery_name" required multiple>
                                	@php
                                		$found = 1;
                                	@endphp
									@foreach (App\SurgeryName::all() as $element)
										<option value="{{ $element->surgery_name }}" {{ ($active_object->surgery_name == $element->surgery_name) ? 'selected' : '' }}>{{ $element->surgery_name }}</option>
										@php
											if ( $active_object->surgery_name == $element->surgery_name ) {
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
                        <div class="col-lg-6 col-xs-12">
                            <div class="form-group">
                                <label class="form-control-label">Surgery Date </label>
                                <input class="form-control" type="date" name="surgery_date" placeholder="YYYY-MM-DD" value="{{ $active_object->surgery_date }}">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                    	<label class="form-control-label">Complications </label>
						<textarea name="complications" class="form-control" rows="5" placeholder="Complications">{{ $active_object->complications }}</textarea>
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