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
                    <div class="col-md-12">
					@forelse (Auth::user()->visits->sortByDesc('id') as $element)
						<div class="panel mb5">
							<div class="panel-heading p10 pb5" role="tab" id="panel-heading{{ $element->id }}">
								<span class="badge pull-right">{{ $element->type }}</span>
								<h5 class="panel-title">
									<a href="#modal-view-{{ $element->id }}" data-toggle="modal" class="mr10">{{ $element->title }}</a>
								</h5>
								<div class="mb5"></div>
								<span>
									<a href="#modal-view-{{ $element->id }}" data-toggle="modal" class="mr10">view</a>
								</span>
								<div>
									@include('partials.visit-view', ['active_object' => $element])
								</div>
							</div>
						</div>
					@empty
						<div class="col-md-12">
							<div class="alert alert-danger">
								{{-- <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> --}}
								<strong>Sorry!</strong> No Records Found
							</div>
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
