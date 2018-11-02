<dl class="dl-horizontal">
    <dt></dt>
    <dd class="mb5 lead"><strong>Visit Details</strong></dd>

    <dt>Type</dt>
    <dd class="mb5"><span class="badge badge-primary">{{ $active_object->type }}</span></dd>
    <dt>Title</dt>
    <dd class="mb5">{{ $active_object->title }}</dd>
    @if (get_class(Auth::user()) == "App\User")
        <dt>Patient</dt>
        <dd class="mb5">{{ $active_object->patient->full_name() }} <span title="Phone Number">{{ $active_object->patient->phone_number }}</span> {!! $active_object->patient->file_number(true) !!}</dd>
    @endif
    <dt>Admission Date</dt>
    <dd class="mb5">
        {{ is_null($active_object->admission_date) ? "" : Carbon::createFromFormat("Y-m-d H:i:s", $active_object->admission_date)->toFormattedDateString() }}
    </dd>
    <dt>Discharged On</dt>
    <dd class="mb5">
        {{ is_null($active_object->discharged_on) ? "" : Carbon::createFromFormat("Y-m-d H:i:s", $active_object->discharged_on)->toFormattedDateString() }}
    </dd>
    @if (get_class(Auth::user()) == "App\User")
        <dt>Created at</dt>
        <dd class="mb5">{{ $active_object->created_at }}</dd>
    @endif

    <dt><br></dt>
    <dd class="mb5 lead"></dd>

    <dt style="width: 5%; max-width: 5%;"></dt>
    <dd class="mb5 lead" style="margin-left: 10%; width: 90%;"><strong>Subjects</strong></dd>

    <dt style="width: 5%; max-width: 5%;"><span class="lead hidden-xs">&gt;&gt;</span></dt>
    <dd class="mb5" style="margin-left: 10%; width: 90%;">{!! nl2br($active_object->subjects) !!}</dd>

    <dt><br></dt>
    <dd class="mb5 lead"></dd>

    <dt style="width: 5%; max-width: 5%;"></dt>
    <dd class="mb5 lead" style="margin-left: 10%; width: 90%;"><strong>Objects</strong></dd>

    <dt style="width: 5%; max-width: 5%;"><span class="lead hidden-xs">&gt;&gt;</span></dt>
    <dd class="mb5" style="margin-left: 10%; width: 90%;">{!! nl2br($active_object->objects) !!}</dd>

    <dt><br></dt>
    <dd class="mb5 lead"></dd>

    <dt style="width: 5%; max-width: 5%;"></dt>
    <dd class="mb5 lead" style="margin-left: 10%; width: 90%;"><strong>Assessment</strong></dd>

    <dt style="width: 5%; max-width: 5%;"><span class="lead hidden-xs">&gt;&gt;</span></dt>
    <dd class="mb5" style="margin-left: 10%; width: 90%;">{!! nl2br($active_object->assessment) !!}</dd>

    <dt><br></dt>
    <dd class="mb5 lead"></dd>

    <div id="visitPlan{{ $active_object->id }}">
        <dt style="width: 5%; max-width: 5%;"></dt>
        <dd class="mb5 lead" style="margin-left: 10%; width: 90%;"><strong>Plans</strong></dd>

        <dt style="width: 5%; max-width: 5%;"><span class="lead hidden-xs">&gt;&gt;</span></dt>
        <dd class="mb5" style="margin-left: 10%; width: 90%;">{!! nl2br($active_object->plans) !!}</dd>
    </div>

    <dt><br></dt>
    <dd class="mb5 lead"></dd>

    <dt style="width: 5%; max-width: 5%;"></dt>
    <dd class="mb5 lead" style="margin-left: 10%; width: 90%;"><strong>Summary</strong></dd>

    <dt style="width: 5%; max-width: 5%;"><span class="lead hidden-xs">&gt;&gt;</span></dt>
    <dd class="mb5" style="margin-left: 10%; width: 90%;">{!! nl2br($active_object->summary) !!}</dd>
</dl>

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
                <li>{{ $element->surgery_name }} <span title="{{ is_null($element->surgery_date) ? 'NA' : Carbon::createFromFormat('Y-m-d', $element->surgery_date)->toFormattedDateString() }}">{{ ($element->surgery_date) ? 'on '.$element->surgery_date : '' }}</span>  {!! (blank($element->complications)) ? '' : '[<strong><span title="'.$element->complications.'">SOME COMPLICATIONS</span></strong>]' !!}</li>
            @endforeach
            <span class="hidden-print"><a href="{{ url('/m/surgeries/visit_id/'.$active_object->id.'?default') }}" class="text-primary">surgeries in details</a></span>
        </ol>
    @else
        <div class="text-danger">No Surgeries performed YET!</div>
    @endif
</div>

<div class="clearfix"></div>
<br>

<div id="visitBills{{ $active_object->id }}">
    <div class="h4"><strong>Billings</strong> <small><strong>{{ $active_object->billings->count() }}</strong></small></div>
    <div>
        @if ( $active_object->billings->count() != 0 )
            <ol>
                @foreach ($active_object->billings as $element)
                <li>{{ $element->billing_name }} <span>[<strong>N</strong>{{ $element->amount }}]</span> {!! ($element->is_paid) ? '' : '<span class="text-danger">UNPAID</span> <a href="'.url('/m/billings/toggle_status/'.$element->id).'" class="text-primary hidden-print">toggle</a>' !!}</li>
                @endforeach
                <span class="hidden-print"><a href="{{ url('/m/billings/visit_id/'.$active_object->id.'?default') }}" class="text-primary">billings in details</a></span>
            </ol>
            <div class="ml20 h5">
                <div>
                    <strong>TOTAL BILLS &rarr; </strong>
                    <span>
                        <strong>N</strong>
                        <strong>{{ $active_object->billings->sum('amount') }}</strong>
                    </span>
                </div>
                @if ($active_object->billings->where('is_paid', 0)->sum('amount') > 0)
                    <br>
                    <div class="text-danger">
                        <strong>TOTAL UNPAID BILLS &rarr; </strong>
                        <span>
                            <strong>N</strong>
                            <strong>{{ $active_object->billings->where('is_paid', 0)->sum('amount') }}</strong>
                        </span>
                    </div>
                @endif
            </div>
        @else
            <div class="text-danger">No Billings added YET!</div>
        @endif
    </div>
</div>