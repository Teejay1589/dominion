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

				<button role="button" class="btn btn-primary btn-xs mb10" onclick="javascript:printVisitDiv('visit{{ $element->id }}');">Print</button>

				<div id="visit{{ $element->id }}">
					{{-- <div class="h4"><strong>Visit Details</strong></div> --}}
					<dl class="dl-horizontal">
						<dt></dt>
						<dd class="mb5 lead"><strong>Visit Details</strong></dd>

						<dt>Type</dt>
						<dd class="mb5"><span class="badge badge-primary">{{ $active_object->type }}</span></dd>
						<dt>Title</dt>
						<dd class="mb5">{{ $active_object->title }}</dd>
						<dt>Patient</dt>
						<dd class="mb5">{{ $active_object->patient->full_name() }} <span title="Phone Number">{{ $active_object->patient->phone_number }}</span> {!! $active_object->patient->file_number(true) !!}</dd>
						<dt>Discharged On</dt>
						<dd class="mb5">
							{{ is_null($active_object->discharged_on) ? "" : Carbon::createFromFormat("Y-m-d H:i:s", $active_object->discharged_on)->toFormattedDateString() }}
						</dd>
						<dt>Created at</dt>
						<dd class="mb5">{{ $element->created_at }}</dd>

						<dt><br></dt>
						<dd class="mb5 lead"></dd>

						<dt style="width: 5%; max-width: 5%;"></dt>
						<dd class="mb5 lead" style="margin-left: 10%; width: 90%;"><strong>Subjects</strong></dd>

						<dt style="width: 5%; max-width: 5%;"><span class="lead hidden-xs">&gt;&gt;</span></dt>
						<dd class="mb5" style="margin-left: 10%; width: 90%;">{{ $active_object->subjects }}</dd>

						<dt><br></dt>
						<dd class="mb5 lead"></dd>

						<dt style="width: 5%; max-width: 5%;"></dt>
						<dd class="mb5 lead" style="margin-left: 10%; width: 90%;"><strong>Objects</strong></dd>

						<dt style="width: 5%; max-width: 5%;"><span class="lead hidden-xs">&gt;&gt;</span></dt>
						<dd class="mb5" style="margin-left: 10%; width: 90%;">{{ $active_object->objects }}</dd>

						<dt><br></dt>
						<dd class="mb5 lead"></dd>

						<dt style="width: 5%; max-width: 5%;"></dt>
						<dd class="mb5 lead" style="margin-left: 10%; width: 90%;"><strong>Assessment</strong></dd>

						<dt style="width: 5%; max-width: 5%;"><span class="lead hidden-xs">&gt;&gt;</span></dt>
						<dd class="mb5" style="margin-left: 10%; width: 90%;">{{ $active_object->assessment }}</dd>

						<dt><br></dt>
						<dd class="mb5 lead"></dd>

						<dt style="width: 5%; max-width: 5%;"></dt>
						<dd class="mb5 lead" style="margin-left: 10%; width: 90%;"><strong>Plans</strong></dd>

						<dt style="width: 5%; max-width: 5%;"><span class="lead hidden-xs">&gt;&gt;</span></dt>
						<dd class="mb5" style="margin-left: 10%; width: 90%;">{{ $active_object->plans }}</dd>

						<dt><br></dt>
						<dd class="mb5 lead"></dd>

						<dt style="width: 5%; max-width: 5%;"></dt>
						<dd class="mb5 lead" style="margin-left: 10%; width: 90%;"><strong>Summary</strong></dd>

						<dt style="width: 5%; max-width: 5%;"><span class="lead hidden-xs">&gt;&gt;</span></dt>
						<dd class="mb5" style="margin-left: 10%; width: 90%;">{{ $active_object->summary }}</dd>
					</dl>

					{{-- <div class="clearfix"></div>
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
					</div> --}}

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
									<li>{{ $element->surgery_name }} on <span title="{{ is_null($element->surgery_date) ? '' : Carbon::createFromFormat('Y-m-d', $element->surgery_date)->toFormattedDateString() }}">{{ $element->surgery_date }}</span> [<strong>{!! (blank($element->complications)) ? '' : '<span title="'.$element->complications.'">SOME COMPLICATIONS</span>' !!}</strong>]</li>
								@endforeach
							</ol>
						@else
							<div class="text-danger">No Surgeries performed YET!</div>
						@endif
					</div>

					<div class="clearfix"></div>
					<br>

					<div class="h4"><strong>Billings</strong> <small><strong>{{ $active_object->billings->count() }}</strong></small></div>
					<div>
						@if ( $active_object->billings->count() != 0 )
							<ol>
								@foreach ($active_object->billings as $element)
								<li>{{ $element->billing_name }} <span>[<strong>N</strong>{{ $element->amount }}]</span></li>
								@endforeach
							</ol>
							<div class="ml20 h5">
								<strong>TOTAL BILLS &rarr; </strong>
								<span>
									<strong>N</strong>
									<strong>{{ $active_object->billings->sum('amount') }}</strong>
								</span>
							</div>
						@else
							<div class="text-danger">No Billings added YET!</div>
						@endif
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				{{-- <a href="#" data-toggle="modal" type="button" class="btn btn-primary">Edit</a> --}}
			</div>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->