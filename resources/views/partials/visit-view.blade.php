<div class="modal fade" id="modal-view-{{ $active_object->id }}">
	<div class="modal-dialog modal-l" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					<span class="sr-only">Close</span>
				</button>
				<h4 class="modal-title">Viewing Visit</h4>
			</div>
			<div class="modal-body">

				<div class="h4"><strong>Case Details</strong></div>
				<dl class="dl-horizontal">
					<dt>Type</dt>
					<dd class="mb5"><span class="badge badge-primary">{{ $active_object->type }}</span></dd>
					<dt>Title</dt>
					<dd class="mb5">{{ $active_object->title }}</dd>
					<dt>Patient</dt>
					<dd class="mb5">{{ $active_object->patient->first_name." ".$active_object->patient->last_name }} <span class="badge badge-default">{{ $active_object->patient->phone_number }}</span></dd>
					<dt>Discharged On</dt>
					<dd class="mb5">
						{{ is_null($active_object->discharged_on) ? "" : Carbon::createFromFormat("Y-m-d H:i:s", $active_object->discharged_on)->toFormattedDateString() }}
					</dd>
					<dt>Created at</dt>
					<dd class="mb5">{{ $element->created_at }}</dd>
				</dl>

				<div class="clearfix"></div>
				<br>

				<div class="h4"><strong>Subjects</strong></div>
				<div>
					{{ $active_object->subjects }}
				</div>

				<div class="clearfix"></div>
				<br>

				<div class="h4"><strong>Objects</strong></div>
				<div>
					{{ $active_object->objects }}
				</div>

				<div class="clearfix"></div>
				<br>

				<div class="h4"><strong>Assessment</strong></div>
				<div>
					{{ $active_object->assessment }}
				</div>

				<div class="clearfix"></div>
				<br>

				<div class="h4"><strong>Plans</strong></div>
				<div>
					{{ $active_object->plans }}
				</div>

				<div class="clearfix"></div>
				<br>

				<div class="h4"><strong>Doctors</strong> <small><strong>{{ $active_object->visit_doctors->count() }}</strong></small></div>
				<div>
					@if ( $active_object->visit_doctors->count() != 0 )
						<ol>
							@foreach ($active_object->visit_doctors as $element)
								<li>{{ $element->doctor->first_name." ".$element->doctor->first_name }} [{{ $element->doctor->role->name }}]</li>
							@endforeach
						</ol>
					@else
						<div class="text-danger">No Doctors assigned YET!</div>
					@endif
				</div>

				<div class="clearfix"></div>
				<br>

				<div class="h4"><strong>Surgeries</strong> <small><strong>{{ $active_object->surgeries->count() }}</strong></small></div>
				<div>
					@if ( $active_object->surgeries->count() != 0 )
						<ol>
							@foreach ($active_object->surgeries as $element)
								<li>{{ $element->name }} on <span title="{{ is_null($element->surgery_date) ? '' : Carbon::createFromFormat('Y-m-d', $element->surgery_date)->toFormattedDateString() }}">{{ $element->surgery_date }}</span> [<strong>{!! (blank($element->complications)) ? '' : '<span title="'.$element->complications.'">SOME COMPLICATIONS</span>' !!}</strong>]</li>
							@endforeach
						</ol>
					@else
						<div class="text-danger">No Surgeries performed YET!</div>
					@endif
				</div>

			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				{{-- <a href="#" data-toggle="modal" type="button" class="btn btn-primary">Edit</a> --}}
			</div>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->