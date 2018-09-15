<form action="{{ url('/m/billings/update/'.$active_object->id) }}" method="post">
	<div class="modal fade" id="modal-update-{{ $active_object->id }}">
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
						<span class="sr-only">Close</span>
					</button>
					<h4 class="modal-title">Update Billing Form</h4>
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
								<label class="form-control-label">Billing Name <span class="text-danger">*</span></label>
                                <input class="form-control" type="text" name="billing_name" placeholder="Billing Name" value="{{ $active_object->billing_name }}" required>
								<span class="form-text"><small>Please give this bill a name.</small></span>
							</div>
						</div>
                        <div class="col-lg-6 col-xs-12">
                            <div class="form-group">
                                <label class="form-control-label">Amount <span class="text-danger">*</span></label>
                                <div class="input-group">
                                    <div class="input-group-addon">N</div>
                                    <input class="form-control" type="number" name="amount" placeholder="Amount" value="{{ $active_object->amount }}" required>
                                </div>
                            </div>
                        </div>
					</div>

					<div class="form-group">
						<label class="form-control-label">Status </label>
						<div>
							<label class="form-control-label form-radio">
								<input type="radio" name="is_paid" class="form-radio-input" value="0" {{ ($active_object->is_paid == 0) ? 'checked' : '' }}> <strong class="text-danger">UNPAID</strong>
							</label>
                        </div>
                        <div>
							<label class="form-control-label form-radio">
								<input type="radio" name="is_paid" class="form-radio-input" value="1" {{ ($active_object->is_paid == 1) ? 'checked' : '' }}> <strong class="text-success">PAID</strong>
                            </label>
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