@extends('layouts.patient')

@section('page_styles')
@endsection

@section('content')

    <section>
        <div class="container-fluid">
        	<div class="row">
        		<h5>You have <strong>{{ Auth::user()->cases->count() }}</strong> Cases</h5>
	        	@forelse (Auth::user()->cases as $element)
		        	<div class="col-md-6">
		        		<div class="card">
			                <div class="card-close">
			                    <div class="dropdown">
			                        <button type="button" id="closeCard1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-ellipsis-v"></i></button>
			                        <div aria-labelledby="closeCard1" class="dropdown-menu dropdown-menu-right has-shadow"><a href="#" class="dropdown-item remove"> <i class="fa fa-times"></i>Close</a><a href="#" class="dropdown-item edit"> <i class="fa fa-gear"></i>Edit</a></div>
			                    </div>
			                </div>
			                <div class="card-header">
			                    <div class="card-title">{{ $element->title }} <small><span title="{{ is_null($element->created_at) ? '' : Carbon::createFromFormat('Y-m-d H:i:s', $element->created_at)->toFormattedDateString() }}">{{ is_null($element->created_at) ? '' : Carbon::createFromFormat('Y-m-d H:i:s', $element->created_at)->format('Y-m-d') }}</span></small></div>
			                </div>
			                <div class="card-body">
			                	<small>
			                		<dl>
				                		<dt>Doctors</dt>
				                		<dd>{{ isset($element->case_doctors) ? $element->case_doctors->count() : 0 }}</dd>
				                		<dt>Surgeries</dt>
				                		<dd>{{ isset($element->surgeries) ? $element->surgeries->count() : 0 }}</dd>
				                		<dt>Discharged On</dt>
				                		<dd><span title="{{ is_null($element->discharged_on) ? 'NOT YET DISCHARGED' : Carbon::createFromFormat('Y-m-d H:i:s', $element->discharged_on)->toFormattedDateString() }}">{{ is_null($element->discharged_on) ? 'NOT YET DISCHARGED' : Carbon::createFromFormat('Y-m-d H:i:s', $element->discharged_on)->format('Y-m-d') }}</span></dd>
				                	</dl>
			                	</small>
			                </div>
			            </div>
		        	</div>
	        	@empty
		        	<div class="col-md-12">
		        		<div class="card">
			                <div class="card-close">
			                    <div class="dropdown">
			                        <button type="button" id="closeCard1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-ellipsis-v"></i></button>
			                        <div aria-labelledby="closeCard1" class="dropdown-menu dropdown-menu-right has-shadow"><a href="#" class="dropdown-item remove"> <i class="fa fa-times"></i>Close</a><a href="#" class="dropdown-item edit"> <i class="fa fa-gear"></i>Edit</a></div>
			                    </div>
			                </div>
			                <div class="card-body">
			                    <div class="text-danger text-center">You Have no Cases Yet!</div>
			                </div>
			            </div>
			        </div>
	        	@endforelse
        	</div>
        </div>
    </section>

@endsection

@section('page_scripts')
@endsection
