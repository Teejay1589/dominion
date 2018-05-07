<div class="modal fade" id="modal-view-{{ $active_object->id }}">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Viewing Case: <small>{{ $active_object->title }}</small></h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					<span class="sr-only">Close</span>
				</button>
			</div>
			<div class="modal-body">

				<div class="h5">Case Details</div>
				<hr>
				<dl>
					<dt>Title</dt>
					<dd>{{ $active_object->title }}</dd>
					<dt>Patient</dt>
					<dd>{{ $active_object->patient->first_name." ".$active_object->patient->last_name }} [{{ $active_object->patient->phone }}]</dd>
					<dt>Discharged On</dt>
					<dd>
						{{ is_null($active_object->discharged_on) ? "" : Carbon::createFromFormat("Y-m-d H:i:s", $active_object->discharged_on)->toFormattedDateString() }}
					</dd>
				</dl>

				<div class="clearfix"></div>
				<br>

				<div class="h5">Symptoms</div>
				<hr>
				<div>
					{{ $active_object->symptoms }}
				</div>

				<div class="clearfix"></div>
				<br>

				<div class="h5">Treatment</div>
				<hr>
				<div>
					{{ $active_object->treatment }}
				</div>

				<div class="clearfix"></div>
				<br>

				<div class="h5">Medicine</div>
				<hr>
				<div>
					{{ $active_object->medicine }}
				</div>

				<div class="clearfix"></div>
				<br>

				<div class="h5">Doctors <span class="badge badge-primary">{{ $active_object->case_doctors->count() }}</span></div>
				<hr>
				<div>
					@if ( $active_object->case_doctors->count() != 0 )
						<ol>
							@foreach ($active_object->case_doctors as $element)
								<li>{{ $element->doctor->first_name." ".$element->doctor->first_name }} [{{ $element->doctor->role->name }}]</li>
							@endforeach
						</ol>
					@else
						<div class="text-danger">No Doctors assigned YET!</div>
					@endif
				</div>

				<div class="clearfix"></div>
				<br>

				<div class="h5">Surgeries <span class="badge badge-primary">{{ $active_object->surgeries->count() }}</span></div>
				<hr>
				<div>
					@if ( $active_object->surgeries->count() != 0 )
						<ol>
							@foreach ($active_object->surgeries as $element)
								<li>{{ $element->name }} [{{ is_null($element->started_at) ? '' : Carbon::createFromFormat('Y-m-d H:i:s', $element->started_at)->toFormattedDateString() }} &minus; {{ is_null($element->ended_at) ? '' : Carbon::createFromFormat('Y-m-d H:i:s', $element->ended_at)->toFormattedDateString() }}] {!! ($element->is_success) ? '<span class="badge badge-success">SUCCESSFUL</span>' : '<span class="badge badge-danger">NOT SUCCESSFUL</span>' !!}</li>
							@endforeach
						</ol>
					@else
						<div class="text-danger">No Doctors assigned YET!</div>
					@endif
				</div>

			</div><!-- /.modal-content -->
		</div><!-- /.modal-dialog -->
	</div><!-- /.modal -->
</div>