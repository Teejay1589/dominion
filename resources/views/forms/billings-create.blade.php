<form action="{{ url('/m/billings/create') }}" method="post">
	<div class="modal fade" id="modal-create">
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
						<span class="sr-only">Close</span>
					</button>
					<h4 class="modal-title">Create Billing Form</h4>
				</div>
				<div class="modal-body">
					{{ csrf_field() }}

					<div class="form-group">
						<label class="form-control-label">Select Visit <span class="text-danger">*</span></label>
						<select class="select-visit" name="visit" required multiple>
							{{-- <option value="">NONE</option> --}}
							@foreach ($visits as $element)
								@if (isset($billings->filter) && $billings->filter == "visit_id")
									@if (isset($_GET['default']))
										<option value="{{ $element->id }}" {{ (old('visit') == $element->id || isset($billings->searchterm) && $billings->searchterm == $element->id) ? 'selected' : '' }}>{{ $element->title }}</option>
									@endif
								@else
									<option value="{{ $element->id }}" {{ (old('visit') == $element->id) ? 'selected' : '' }}>{{ $element->title }}</option>
								@endif
							@endforeach
						</select>
					</div>

          <div class="form-group">
          	<div class="row">
							<div class="col-lg-6 col-xs-12">
								<div class="form-group">
									<label class="form-control-label">Billing Name {{-- <span class="text-danger">*</span> --}}</label>
	                <input class="form-control" type="text" name="billing_name[]" placeholder="Billing Name" value="{{ old('billing_name.0') }}">
									<span class="form-text"><small>Please give this bill a name.</small></span>
								</div>
							</div>
	            <div class="col-lg-6 col-xs-12">
	                <div class="form-group">
	                    <label class="form-control-label">Amount {{-- <span class="text-danger">*</span> --}}</label>
	                    <div class="input-group">
	                        <div class="input-group-addon">N</div>
	                        <input class="form-control" type="number" name="amount[]" placeholder="Amount" value="{{ old('amount.0') }}">
	                    </div>
	                </div>
	            </div>
						</div>

						<div class="form-group">
							<label class="form-control-label">Status </label>
							<div>
								<label class="form-control-label form-radio">
									<input type="radio" name="is_paid_0" class="form-radio-input" value="0" {{ old('is_paid_0') == 0 ? 'checked' : '' }}> <strong class="text-danger">UNPAID</strong>
								</label>
							</div>
							<div>
								<label class="form-control-label form-radio">
									<input type="radio" name="is_paid_0" class="form-radio-input" value="1" {{ old('is_paid_0') == 1 ? 'checked' : '' }}> <strong class="text-success">PAID</strong>
								</label>
							</div>
						</div>
          </div>

          <div class="form-group">
          	<div class="row">
							<div class="col-lg-6 col-xs-12">
								<div class="form-group">
									<label class="form-control-label">Billing Name {{-- <span class="text-danger">*</span> --}}</label>
	                <input class="form-control" type="text" name="billing_name[]" placeholder="Billing Name" value="{{ old('billing_name.1') }}">
									<span class="form-text"><small>Please give this bill a name.</small></span>
								</div>
							</div>
	            <div class="col-lg-6 col-xs-12">
	                <div class="form-group">
	                    <label class="form-control-label">Amount {{-- <span class="text-danger">*</span> --}}</label>
	                    <div class="input-group">
	                        <div class="input-group-addon">N</div>
	                        <input class="form-control" type="number" name="amount[]" placeholder="Amount" value="{{ old('amount.1') }}">
	                    </div>
	                </div>
	            </div>
						</div>

						<div class="form-group">
							<label class="form-control-label">Status </label>
							<div>
								<label class="form-control-label form-radio">
									<input type="radio" name="is_paid_1" class="form-radio-input" value="0" {{ old('is_paid_1') == 0 ? 'checked' : '' }}> <strong class="text-danger">UNPAID</strong>
								</label>
							</div>
							<div>
								<label class="form-control-label form-radio">
									<input type="radio" name="is_paid_1" class="form-radio-input" value="1" {{ old('is_paid_1') == 1 ? 'checked' : '' }}> <strong class="text-success">PAID</strong>
								</label>
							</div>
						</div>
          </div>

          <div class="text-right">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Create</button>
          </div>

          <div class="form-group">
          	<div class="row">
							<div class="col-lg-6 col-xs-12">
								<div class="form-group">
									<label class="form-control-label">Billing Name {{-- <span class="text-danger">*</span> --}}</label>
	                <input class="form-control" type="text" name="billing_name[]" placeholder="Billing Name" value="{{ old('billing_name.2') }}">
									<span class="form-text"><small>Please give this bill a name.</small></span>
								</div>
							</div>
	            <div class="col-lg-6 col-xs-12">
	                <div class="form-group">
	                    <label class="form-control-label">Amount {{-- <span class="text-danger">*</span> --}}</label>
	                    <div class="input-group">
	                        <div class="input-group-addon">N</div>
	                        <input class="form-control" type="number" name="amount[]" placeholder="Amount" value="{{ old('amount.2') }}">
	                    </div>
	                </div>
	            </div>
						</div>

						<div class="form-group">
							<label class="form-control-label">Status </label>
							<div>
								<label class="form-control-label form-radio">
									<input type="radio" name="is_paid_2" class="form-radio-input" value="0" {{ old('is_paid_2') == 0 ? 'checked' : '' }}> <strong class="text-danger">UNPAID</strong>
								</label>
							</div>
							<div>
								<label class="form-control-label form-radio">
									<input type="radio" name="is_paid_2" class="form-radio-input" value="1" {{ old('is_paid_2') == 1 ? 'checked' : '' }}> <strong class="text-success">PAID</strong>
								</label>
							</div>
						</div>
          </div>

          <div class="form-group">
          	<div class="row">
							<div class="col-lg-6 col-xs-12">
								<div class="form-group">
									<label class="form-control-label">Billing Name {{-- <span class="text-danger">*</span> --}}</label>
	                <input class="form-control" type="text" name="billing_name[]" placeholder="Billing Name" value="{{ old('billing_name.3') }}">
									<span class="form-text"><small>Please give this bill a name.</small></span>
								</div>
							</div>
	            <div class="col-lg-6 col-xs-12">
	                <div class="form-group">
	                    <label class="form-control-label">Amount {{-- <span class="text-danger">*</span> --}}</label>
	                    <div class="input-group">
	                        <div class="input-group-addon">N</div>
	                        <input class="form-control" type="number" name="amount[]" placeholder="Amount" value="{{ old('amount.3') }}">
	                    </div>
	                </div>
	            </div>
						</div>

						<div class="form-group">
							<label class="form-control-label">Status </label>
							<div>
								<label class="form-control-label form-radio">
									<input type="radio" name="is_paid_3" class="form-radio-input" value="0" {{ old('is_paid_3') == 0 ? 'checked' : '' }}> <strong class="text-danger">UNPAID</strong>
								</label>
							</div>
							<div>
								<label class="form-control-label form-radio">
									<input type="radio" name="is_paid_3" class="form-radio-input" value="1" {{ old('is_paid_3') == 1 ? 'checked' : '' }}> <strong class="text-success">PAID</strong>
								</label>
							</div>
						</div>
          </div>

          <div class="form-group">
          	<div class="row">
							<div class="col-lg-6 col-xs-12">
								<div class="form-group">
									<label class="form-control-label">Billing Name {{-- <span class="text-danger">*</span> --}}</label>
	                <input class="form-control" type="text" name="billing_name[]" placeholder="Billing Name" value="{{ old('billing_name.4') }}">
									<span class="form-text"><small>Please give this bill a name.</small></span>
								</div>
							</div>
	            <div class="col-lg-6 col-xs-12">
	                <div class="form-group">
	                    <label class="form-control-label">Amount {{-- <span class="text-danger">*</span> --}}</label>
	                    <div class="input-group">
	                        <div class="input-group-addon">N</div>
	                        <input class="form-control" type="number" name="amount[]" placeholder="Amount" value="{{ old('amount.4') }}">
	                    </div>
	                </div>
	            </div>
						</div>

						<div class="form-group">
							<label class="form-control-label">Status </label>
							<div>
								<label class="form-control-label form-radio">
									<input type="radio" name="is_paid_4" class="form-radio-input" value="0" {{ old('is_paid_4') == 0 ? 'checked' : '' }}> <strong class="text-danger">UNPAID</strong>
								</label>
							</div>
							<div>
								<label class="form-control-label form-radio">
									<input type="radio" name="is_paid_4" class="form-radio-input" value="1" {{ old('is_paid_4') == 1 ? 'checked' : '' }}> <strong class="text-success">PAID</strong>
								</label>
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