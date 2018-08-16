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
                        <div class="panel-subtitle"><code>{{ $active_object->file_number }}</code></div>
                    </div>
                    <div class="panel-body">

                        <nav>
                            <ul class="nav">
                                <li class="nav-item">
                                    <span class="text-primary">brief information about patient</span>
                                </li>
                                <li class="nav-item">
                                    <em>
                                        patient info, visits, surgeries (except billings) shows up as
                                    </em>
                                    <strong> patient medical history</strong>
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
                        <a href="#lastvisit" data-toggle="tab" aria-expanded="false">Last Visit</a>
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
                        <a href="#outstanding" data-toggle="tab">Outstanding</a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active" id="info">
                        @include('partials.patient-inline-view', ['element' => $active_object])
                    </div>
                    <div class="tab-pane" id="lastvisit">
                        @includeWhen($active_object->visits->last(), 'partials.visit-inline-view', ['active_object' => $active_object->visits->last()])
                    </div>
                    <div class="tab-pane" id="visits">
                        <p>List of Visits</p>
                    </div>
                    <div class="tab-pane" id="surgeries">
                        <p>List of Surgeries</p>
                    </div>
                    <div class="tab-pane" id="billings">
                        <p>List of Billings</p>
                    </div>
                    <div class="tab-pane" id="outstanding">
                        <p>List of Outstanding Billings</p>
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