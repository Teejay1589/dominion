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
                        <h4>You have <strong>{{ Auth::user()->billings()->count() }}</strong> bills <strong class="text-danger">{{ Auth::user()->unpaid_bills()->count() }}</strong> <span class="text-danger">unpaid</span></h4>
                    </div>
                    <div class="col-md-12">
					@forelse (Auth::user()->billings()->sortByDesc('id') as $element)
                        @if (isset($_GET['filter']) && $_GET['filter'] = 'unpaid')
                            @continue($element->is_paid == 1)
                        @endif
                        <div class="panel mb5">
                            <div class="panel-heading p10 pb5" role="tab" id="panel-heading{{ $element->id }}">
                                <span class="pull-right">
                                    <span class="badge"><strong>N</strong>{{ $element->amount }}</span>
                                    <br>
                                    <div class="text-center">
                                        <strong class="text-{{ ( $element->is_paid ) ? 'success' : 'danger' }}" title="STATUS">{{ ( $element->is_paid ) ? 'PAID' : 'UNPAID' }}</strong>
                                    </div>
                                </span>
                                <h5 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#accordio" href="#collapse{{ $element->id }}" aria-expanded="true" aria-controls="collapse{{ $element->id }}" class="mr10">{{ $element->billing_name }} <small><span title="Visit Title">{{ optional($element->visit)->title }}</span></small></a>
                                </h5>
                                <div class="mb5"></div>
                                <span>
                                    <a href="#modal-view-{{ $element->visit->id }}" data-toggle="modal" class="mr10 text-primary">visit</a>
                                    <a data-toggle="collapse" data-parent="#accordio" href="#collapse{{ $element->id }}" aria-expanded="true" aria-controls="collapse{{ $element->id }}" class="mr10">view</a>
                                </span>
                                <div>
                                    @include('partials.visit-view', ['active_object' => $element->visit])
                                </div>
                            </div>
                            <div id="collapse{{ $element->id }}" class="panel-body panel-collapse collapse" role="tabpanel">
                                @include('partials.billing-inline-view', ['element' => $element])
                            </div>
                        </div>
                    @empty
                        <div class="alert alert-danger">
                            {{-- <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> --}}
                            <strong>Sorry!</strong> No Records Found
                        </div>
                    @endforelse
                    </div>
				</div>
			</div>
			<div class="col-md-1 col-xs-12"></div>
		</div>
    </section>

@endsection

@section('page_scripts')
@endsection
