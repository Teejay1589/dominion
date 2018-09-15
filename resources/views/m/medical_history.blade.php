@extends('layouts.admin')

@section('title', $page->title)

@section('page_styles')
@endsection

@section('content')
    <section>
		<div class="row mb15">
            <div class="col-md-1 col-sm-12"></div>
            <div class="col-md-10 col-sm-12">
				<div class="panel">
                    <div class="panel-heading border">
                        <div class="panel-title h5 mb5"><strong>{{ $active_object->full_name() }}</strong></div>
                        <div class="panel-subtitle">{!! $active_object->file_number(true) !!}</div>
                    </div>
                    <div class="panel-body">

                        <nav>
                            <ul class="nav">
                                <li class="nav-item">
                                    <div class="row mb5">
                                        <div class="col-md-6">
                                            <div class="widget bg-danger mb10">
                                                <div class="widget-bg-icon">
                                                    <i class="fa fa-money"></i>
                                                </div>
                                                <div class="widget-details">
                                                    <span class="widget-title" style="color: #fff">N{{ $active_object->unpaid_bills()->sum('amount') }}</span>
                                                    <span class="widget-subtitle" style="color: #fff">Total Unpaid Bills</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="widget bg-success mb10">
                                                <div class="widget-bg-icon">
                                                    <i class="fa fa-money"></i>
                                                </div>
                                                <div class="widget-details">
                                                    <span class="widget-title" style="color: #fff">N{{ $active_object->billings()->sum('amount') }}</span>
                                                    <span class="widget-subtitle" style="color: #fff">Total Bills</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="nav-item">
                                    <span class="h4">Medical History Summary</span>
                                </li>
                                <li class="nav-item">
                                    <span>Last Visit was on</span>
                                    @if($active_object->last_visit())
                                        <abbr title="{{ Carbon::createFromFormat('Y-m-d H:i:s', $active_object->last_visit()->created_at)->format('l, g M Y @ h:i A') }}">{{ $active_object->last_visit()->created_at }}</abbr>
                                    @else
                                    <span class="text-danger">NO Visits Yet!</span>
                                    @endif
                                </li>
                                <li class="nav-item">
                                    <strong>{{ $active_object->visits->count() }}</strong>
                                    <span>Visits</span>
                                </li>
                                <li class="nav-item">
                                    <strong>{{ $active_object->surgeries()->count() }}</strong>
                                    <span>Surgeries</span>
                                </li>
                                <li class="nav-item">
                                    <strong>{{ $active_object->billings()->count() }}</strong>
                                    <span>Billings</span>
                                </li>
                                <li class="nav-item">
                                    <strong>{{ $active_object->unpaid_bills()->count() }}</strong>
                                    <span>Unpaid BIlls</span>
                                </li>
                                <li><br></li>
                                <li>
                                    <strong>created at </strong>
                                    <abbr title="{{ Carbon::createFromFormat('Y-m-d H:i:s', $active_object->created_at)->format('l, g M Y @ h:i A') }}">{{ $active_object->created_at }}</abbr>
                                </li>
                            </ul>
                        </nav>

                    </div>
                    {{-- <div class="panel-footer"></div> --}}
                </div>
			</div>
            <div class="col-md-1 col-sm-12"></div>
		</div>

		<div class="row mb15">
            <div class="col-md-1 col-sm-12"></div>
            <div class="col-md-10 col-sm-12">
                <div class="box-tab">
                <ul class="nav nav-tabs">
                    <li class="active">
                        <a href="#info" data-toggle="tab" aria-expanded="true">Patient Info</a>
                    </li>
                    <li class="">
                        <a href="#lastVisit" data-toggle="tab" aria-expanded="false">Last Visit</a>
                    </li>
                    <li class="">
                        <a href="#visits" data-toggle="tab" aria-expanded="false">Visits</a>
                    </li>
                    <li class="">
                        <a href="#surgeries" data-toggle="tab" aria-expanded="false">Surgeries</a>
                    </li>
                    <li>
                        <a href="#billings" data-toggle="tab">Billings</a>
                    </li>
                    <li>
                        <a href="#unpaidBIlls" data-toggle="tab">Unpaid Bills</a>
                    </li>
                    <li>
                        <a href="#sms" data-toggle="tab">SMS</a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active" id="info">
                        @include('partials.patient-inline-view', ['element' => $active_object])
                    </div>
                    <div class="tab-pane" id="lastVisit">
                        @includeWhen($active_object->last_visit(), 'partials.visit-inline-view', ['active_object' => optional($active_object->visits->last())])
                    </div>
                    <div class="tab-pane" id="visits">
                        <p class="h4">List of Visits <strong>{{ $active_object->visits->count() }}</strong></p>
                        <ul class="nav">
                            @forelse ($active_object->visits as $element)
                                <li class="nav-item">
                                    <a href="{{ url('/m/visits/id/'.$element->id.'?default') }}">
                                        {{ $element->title }}
                                        <span class="badge badge-primary">{{ $element->type }}</span>
                                        <small>{{ $active_object->created_at }}</small>
                                    </a>
                                </li>
                            @empty
                                <li class="nav-item">
                                    <span class="text-danger">NO Visits Yet!</span>
                                </li>
                            @endforelse
                        </ul>
                    </div>
                    <div class="tab-pane" id="surgeries">
                        <p class="h4">List of Surgeries <strong>{{ $active_object->surgeries()->count() }}</strong></p>
                        <ul class="nav">
                            @forelse ($active_object->surgeries() as $element)
                                <li class="nav-item">
                                    <a href="{{ url('/m/surgeries/visit_id/'.$element->visit_id.'?default') }}">
                                        @if( isset($element->surgery) )
                                            <span title="A RESURGERY OF ANOTHER SURGERY"><code>{{ isset( $element->surgery ) ? 'A RESURGERY' : '' }}</code></span>
                                        @endif
                                        {{ $element->surgery_name }}
                                        <span class="badge badge-primary" title="NUMBER OF RESURGERIES PERFORMED">{{ ($element->surgeries->count() > 0) ? $element->surgeries->count() : '' }}</span>
                                        <small>{{ $active_object->created_at }}</small>
                                    </a>
                                </li>
                            @empty
                                <li class="nav-item">
                                    <span class="text-danger">NO Surgeries Yet!</span>
                                </li>
                            @endforelse
                        </ul>
                    </div>
                    <div class="tab-pane" id="billings">
                        <p class="h4">List of Billings <strong>{{ $active_object->billings()->count() }}</strong></p>
                        <ul class="nav">
                            @forelse ($active_object->billings() as $element)
                                <li class="nav-item">
                                    <a href="{{ url('/m/billings/visit_id/'.$element->visit_id.'?default') }}">
                                        <span class="badge badge-primary">N{{ $element->amount }}</span>
                                        {{ $element->billing_name }}
                                        <small>{{ $active_object->created_at }}</small>
                                    </a>
                                </li>
                            @empty
                                <li class="nav-item">
                                    <span class="text-danger">NO Bills Yet!</span>
                                </li>
                            @endforelse
                        </ul>
                    </div>
                    <div class="tab-pane" id="unpaidBIlls">
                        <p class="h4">List of Unpaid Bills <strong>{{ $active_object->unpaid_bills()->count() }}</strong></p>
                        <ul class="nav">
                            @forelse ($active_object->unpaid_bills() as $element)
                                <li class="nav-item">
                                    <a href="{{ url('/m/billings/visit_id/'.$element->visit_id.'?default') }}">
                                        <span class="badge badge-primary">N{{ $element->amount }}</span>
                                        {{ $element->billing_name }}
                                        <small>{{ $active_object->created_at }}</small>
                                    </a>
                                </li>
                            @empty
                                <li class="nav-item">
                                    <span class="text-success">NO Unpaid Bills!</span>
                                </li>
                            @endforelse
                        </ul>
                    </div>
                    <div class="tab-pane" id="sms">
                        <p class="h4">List of Sent Sms <strong>{{ $active_object->sms_patients->count() }}</strong></p>
                        <ul class="nav">
                            @forelse ($active_object->sms_patients as $element)
                                <li class="nav-item">
                                    <a href="{{ url('/m/sms/id/'.$element->sms->id.'?default') }}">
                                        <strong>{{ $element->sms->from }}</strong>
                                        <br>
                                        <span>{!! nl2br($element->sms->message) !!}</span>
                                    </a>
                                </li>
                            @empty
                                <li class="nav-item">
                                    <span class="text-danger">NO SMS!</span>
                                </li>
                            @endforelse
                        </ul>
                    </div>
                </div>
                </div>
            </div>
            <div class="col-md-1 col-sm-12"></div>
        </div>
	</section>
@endsection

@section('page_scripts')
@endsection