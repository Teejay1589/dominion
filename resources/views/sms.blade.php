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
                        <h4>You have received <strong>{{ Auth::user()->sms_patients->count() }}</strong> sms messages</h4>
                    </div>
                    <div class="col-md-12">
					@forelse (Auth::user()->sms_patients->sortByDesc('id') as $element)
                        <div class="panel mb5">
                            <div class="panel-heading p10 pb5" role="tab" id="panel-heading{{ $element->sms->id }}">
                                <h5 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#accordio" href="#collapse{{ $element->sms->id }}" aria-expanded="true" aria-controls="collapse{{ $element->sms->id }}" class="mr10">{{ $element->sms->from }} <small><span title="{!! str_ireplace('<br />', '', nl2br($element->sms->message)) !!}">{{ str_limit($element->sms->message, 50) }}</span></small></a>
                                </h5>
                                <div class="mb5"></div>
                                <span>
                                    <a data-toggle="collapse" data-parent="#accordio" href="#collapse{{ $element->sms->id }}" aria-expanded="true" aria-controls="collapse{{ $element->sms->id }}" class="mr10">view</a>
                                </span>
                            </div>
                            <div id="collapse{{ $element->sms->id }}" class="panel-body panel-collapse collapse" role="tabpanel">
                                @include('partials.sms-inline-view', ['active_object' => $element->sms])
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
