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
                        @if (isset($_GET['filter']) && $_GET['filter'] = 'complications')
                            <h4>You have <strong>{{ Auth::user()->surgeries()->count() - Auth::user()->surgeries()->where('complications', '')->count() }}</strong> performed surgeries with <span class="text-danger">complications</span></h4>
                        @else
                            <h4>You have <strong>{{ Auth::user()->surgeries()->count() }}</strong> performed surgeries</h4>
                        @endif
                    </div>
                    <div class="col-md-12">
					@forelse (Auth::user()->surgeries()->sortByDesc('id') as $element)
                        @if (isset($_GET['filter']) && $_GET['filter'] = 'complications')
                            @continue($element->complications == '')
                        @endif
                        <div class="panel mb5">
                            <div class="panel-heading p10 pb5" role="tab" id="panel-heading{{ $element->id }}">
                                <span class="badge pull-right">{{ isset( $element->surgery ) ? 'RESURGERY' : '' }}</span>
                                <h5 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#accordio" href="#collapse{{ $element->id }}" aria-expanded="true" aria-controls="collapse{{ $element->id }}" class="mr10">{{ $element->surgery_name }} <small><span title="Visit Title">{{ optional($element->visit)->title }}</span></small></a>
                                    {{-- <a href="#modal-view-{{ $element->id }}" data-toggle="modal" class="mr10">{{ $element->name }}</a> --}}
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
                                @include('partials.surgery-inline-view', ['element' => $element])
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
