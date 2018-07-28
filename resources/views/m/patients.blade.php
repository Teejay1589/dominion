@extends('layouts.admin')

@section('title', $page->title)

@section('page_styles')
@endsection

@section('content')

    <section>
        <div class="row mb15">
            <div class="col-md-1 col-xs-12"></div>
        	<div class="col-md-10 col-xs-12">

                @include('components.toolbar', [
                    'model' => new App\Patient(),
                    'create_form' => 'forms.patients-create',
                    'data_name' => 'Patient',
                    'data' => $patients,
                    'removed_keys' => array('id', 'user_id', 'genotype', 'created_at', 'updated_at')
                ])

                {{-- <div class="clearfix"></div>
                <br> --}}

                <div id="accordion" role="tablist" aria-multiselectable="true">
                    @forelse ($patients as $element)
                        <div class="panel mb5">
                            <div class="panel-heading p10 pb5" role="tab" id="panel-heading{{ $element->id }}">
                                <span class="badge badge-default pull-right">{{ $element->phone_number }}</span>
                                <h5 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#accordio" href="#collapse{{ $element->id }}" aria-expanded="true" aria-controls="collapse{{ $element->id }}" class="mr10">{{ $element->first_name }} {{ $element->last_name }}</a>
                                </h5>
                                <div class="mb5"></div>
                                <span>
                                    <span>
                                        <strong>{{ $element->visits->count() }}</strong>
                                        <a href="{{ url('/m/patient/'.$element->id.'/visits') }}" class="mr10 text-primary">
                                            <span>visits</span>
                                        </a>
                                    </span>
                                    @if ( $element->visits->count() > 0 )
                                        <a href="#modal-view-{{ $element->visits->last()->id }}" data-toggle="modal" class="mr10">last visit</a>
                                    @endif
                                    <a data-toggle="collapse" data-parent="#accordio" href="#collapse{{ $element->id }}" aria-expanded="true" aria-controls="collapse{{ $element->id }}" class="mr10">view</a>
                                    <a href="#modal-update-{{ $element->id }}" data-toggle="modal" class="mr10">update</a>
                                    <a href="{{ url('/m/patients/delete/'.$element->id) }}" class="mr10 text-danger">
                                        <span>delete</span>
                                    </a>
                                </span>
                                <div>
                                    @include('forms.patients-update', ['active_object' => $element])
                                    @if ( $element->visits->count() > 0 )
                                        @include('partials.visit-view', ['active_object' => $element->visits->last()])
                                    @endif
                                </div>
                            </div>
                            <div id="collapse{{ $element->id }}" class="panel-body panel-collapse collapse" role="tabpanel">
                                @include('partials.patient-inline-view', ['element' => $element])
                            </div>
                        </div>
                    @empty
                        <div class="alert alert-danger">
                            {{-- <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> --}}
                            <strong>Sorry!</strong> No Records Found
                        </div>
                    @endforelse
                </div>

                <div class="text-left">
                    {{ $patients->links('shared.pagination', ['small' => true]) }}
                </div>

                {{-- @include('tables.patients') --}}
            </div>
            <div class="col-md-1 col-xs-12"></div>
        </div>
    </section>

@endsection

@section('page_scripts')
    <script type="text/javascript">
        var base_url = '{{ url('/m/patients') }}';
    </script>
    <script type="text/javascript" src="{{ asset('js/toolbar.js') }}"></script>
@endsection
