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
								<select class="form-control" name="case" required readonly>
									<option value="">NONE</option>
									@foreach ($cases as $element)
										<option value="{{ $element->id }}" {{ (old('case', $active_object->case_id) == $element->id) ? 'selected' : '' }}>{{ $element->title }}</option>
									@endforeach
								</select>
                            </div>
                        </div>
                        <div class="col-lg-6 col-xs-12">
                            <div class="form-group">
                                <label class="form-control-label">Name <span class="text-danger">*</span></label>
                                <input class="form-control" type="text" name="name" placeholder="Surgery Name" value="{{ old('name', $active_object->name) }}" required>
                                <span class="form-text"><small>Please give this surgery a name.</small></span>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-6 col-xs-12">
                            <div class="form-group">
                                <label class="form-control-label">Started At <span class="text-danger">*</span></label>
                                <input class="form-control" type="date" name="started_at" placeholder="YYYY-MM-DD" value="{{ is_null(old('started_at', $active_object->started_at)) ? "" : Carbon::createFromFormat("Y-m-d H:i:s", old('started_at', $active_object->started_at))->format("Y-m-d") }}" required>
                            </div>
                        </div>
                        <div class="col-lg-6 col-xs-12">
                            <div class="form-group">
                                <label class="form-control-label">Ended At</label>
                                <input class="form-control" type="date" name="ended_at" placeholder="YYYY-MM-DD" value="{{ is_null(old('started_at', $active_object->ended_at)) ? "" : Carbon::createFromFormat("Y-m-d H:i:s", old('started_at', $active_object->ended_at))->format("Y-m-d") }}">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
						<label class="form-control-label form-check form-check-inline">
							<input type="checkbox" name="is_success" class="form-check-input" value="1" {{ old('is_success', $active_object->is_success) == 1 ? 'checked' : '' }}> Is Successful
						</label>
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