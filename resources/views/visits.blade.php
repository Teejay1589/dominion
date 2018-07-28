@extends('layouts.patient')

@section('title', $page->title)

@section('page_styles')
@endsection

@section('content')

	<section>
		<div class="row mb15">
			<div class="col-md-1 col-xs-12"></div>
			<div class="col-md-10 col-xs-12">
				<div class="row mb20">
					<div class="col-md-12">
						<h4>You have <strong>{{ Auth::user()->visits->count() }}</strong> visits</h4>
					</div>
					@forelse (Auth::user()->visits as $element)
						<div class="col-md-4">
						<div class="panel panel-primary">
						<div class="panel-heading">
							<div class="pull-left">{{ $element->title }} <small><span title="{{ is_null($element->created_at) ? '' : Carbon::createFromFormat('Y-m-d H:i:s', $element->created_at)->toFormattedDateString() }}">{{ is_null($element->created_at) ? '' : Carbon::createFromFormat('Y-m-d H:i:s', $element->created_at)->format('Y-m-d') }}</span></small></div>
						</div>
						<div class="panel-body" style="">
							<dl>
								<dt>Doctors</dt>
								<dd>{{ isset($element->visit_doctors) ? $element->visit_doctors->count() : 0 }}</dd>
								<dt>Surgeries</dt>
								<dd>{{ isset($element->surgeries) ? $element->surgeries->count() : 0 }}</dd>
								<dt>Discharged On</dt>
								<dd><span title="{{ is_null($element->discharged_on) ? 'NOT YET DISCHARGED' : Carbon::createFromFormat('Y-m-d H:i:s', $element->discharged_on)->toFormattedDateString() }}">{{ is_null($element->discharged_on) ? 'NOT YET DISCHARGED' : Carbon::createFromFormat('Y-m-d H:i:s', $element->discharged_on)->format('Y-m-d') }}</span></dd>
							</dl>
						</div>
						</div>
					</div>
					@empty
						<div class="col-md-12">
							<div class="card">
								<div class="card-body">
									<div class="text-danger text-center">You Have no visits Yet!</div>
								</div>
							</div>
						</div>
					@endforelse
				</div>
			</div>
			<div class="col-md-1 col-xs-12"></div>
		</div>
    </section>

@endsection

@section('page_scripts')
@endsection
