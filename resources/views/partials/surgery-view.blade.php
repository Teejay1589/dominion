<div class="modal fade" id="modal-view-{{ $active_object->id }}">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Viewing Surgery: <small>{{ $active_object->case->title.": ".$active_object->name }}</small></h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					<span class="sr-only">Close</span>
				</button>
			</div>
			<div class="modal-body">

				<div class="h5">Surgery Details</div>
				<hr>
				<dl>
					<dt>Case Title</dt>
					<dd>{{ $active_object->case->title }}</dd>
					<dt>Surgery Name</dt>
					<dd>{{ $active_object->name }}</dd>
					<dt>Started At</dt>
					<dd>
						{{ is_null($element->started_at) ? '' : Carbon::createFromFormat('Y-m-d H:i:s', $element->started_at)->toFormattedDateString() }}
					</dd>
					<dt>Ended At</dt>
					<dd>
						{{ is_null($element->ended_at) ? '' : Carbon::createFromFormat('Y-m-d H:i:s', $element->ended_at)->toFormattedDateString() }}
					</dd>
					<dt>Is Successful</dt>
					<dd>{{ ($element->is_success) ? 'YES' : 'NO' }}</dd>
				</dl>

				<div class="clearfix"></div>
				<br>

			</div><!-- /.modal-content -->
		</div><!-- /.modal-dialog -->
	</div><!-- /.modal -->
</div>