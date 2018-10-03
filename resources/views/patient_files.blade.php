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
                        <h4>You have <strong>{{ Auth::user()->patient_files->count() }}</strong> files</h4>
                    </div>
                    <div class="col-md-12">
					@forelse (Auth::user()->patient_files->sortByDesc('id') as $element)
                        <div class="panel mb5">
                            <div class="panel-heading p10 pb5" role="tab" id="panel-heading{{ $element->id }}">
                                <span class="pull-right">
                                    @php
                                        $file_parts = explode('.', $element->file);
                                        $file_type = $file_parts[count($file_parts) - 1];
                                    @endphp
                                    <span class="badge" title="File Type">{{ $file_type }}</span>
                                </span>
                                <h5 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#accordio" href="#collapse{{ $element->id }}" aria-expanded="true" aria-controls="collapse{{ $element->id }}" class="mr10">{{ $element->file_name }} <small><span title="Patient">{{ $element->patient->full_name() }}</span></small></a>
                                </h5>
                                <div class="mb5"></div>
                                <span>
                                    <a href="{{ asset($element->file) }}" target="_blank" class="mr10 text-primary">view original file</a>
                                    <a data-toggle="collapse" data-parent="#accordio" href="#collapse{{ $element->id }}" aria-expanded="true" aria-controls="collapse{{ $element->id }}" class="mr10">view</a>
                                </span>
                            </div>
                            <div id="collapse{{ $element->id }}" class="panel-body panel-collapse collapse" role="tabpanel">
                                @include('partials.patient_file-inline-view', ['active_object' => $element])
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
