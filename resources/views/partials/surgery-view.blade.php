<div class="modal fade" id="modal-view-{{ $active_object->id }}">
	<div class="modal-dialog modal-l" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Viewing Surgery</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					<span class="sr-only">Close</span>
				</button>
			</div>
			<div class="modal-body">

				<div class="h4"><strong>Surgery Details</strong></div>
				<dl class="dl-horizontal">
					<dt>Patient</dt>
					<dd class="mb5">{{ $element->patient()->first_name." ".$element->patient()->last_name }} <span class="badge badge-default">{{ $element->patient()->phone_number }}</span></dd>
					<dt>Visit Title</dt>
					<dd class="mb5">{{ $active_object->visit->title }}</dd>
					<dt>Surgery Name</dt>
					<dd class="mb5">{{ $active_object->surgery_name }}</dd>
					<dt>Surgery Date</dt>
					<dd class="mb5">
						{{ is_null($element->surgery_date) ? '' : Carbon::createFromFormat('Y-m-d', $element->surgery_date)->toFormattedDateString() }}
					</dd>
					<dt>Complications</dt>
					<dd class="mb5">{{ $element->complications }}</dd>
					<dt>Created at</dt>
					<dd class="mb5">{{ $element->created_at }}</dd>

					<dt><br></dt>
					<dd class="mb5 lead"></dd>

					@isset($element->surgery)
						<dt></dt>
						<dd class="mb5 lead"><strong>Resurgery Details</strong></dd>

						<dt>Visit Title</dt>
						<dd class="mb5">{{ $element->surgery->visit->title }}</dd>
						<dt>Surgery Name</dt>
						<dd class="mb5">{{ $element->surgery->surgery_name }}</dd>
						<dt>Surgery Date</dt>
						<dd class="mb5">
							{{ is_null($element->surgery->surgery_date) ? '' : Carbon::createFromFormat('Y-m-d', $element->surgery->surgery_date)->toFormattedDateString() }}
						</dd>
						<dt>Complications</dt>
						<dd class="mb5">{{ $element->surgery->complications }}</dd>
						<dt>Created at</dt>
						<dd class="mb5">{{ $element->created_at }}</dd>
					@endisset
				</dl>

				<div class="clearfix"></div>
				<br>

			</div><!-- /.modal-content -->
		</div><!-- /.modal-dialog -->
	</div><!-- /.modal -->
</div>