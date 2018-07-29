@extends('layouts.admin')

@section('title', $page->title)

@section('page_styles')
    <link rel="stylesheet" type="text/css" href="{{ asset('/vendor/selectize.js-master/dist/css/selectize.bootstrap2.css') }}">
@endsection

@section('content')
    <section>
        <div class="row mb15">
            <div class="col-md-1 col-xs-12"></div>
            <div class="col-md-10 col-xs-12">
            	@include('components.toolbar', [
                    'model' => new App\Surgery(),
                    'create_form' => 'forms.surgeries-create',
                    'data_name' => 'surgery',
                    'data' => $surgeries,
                    'removed_keys' => array('id', 'user_id', 'created_at', 'updated_at'),
                    'added_keys' => array('patient_id')
                ])

                {{-- <div class="clearfix"></div>
                <br> --}}

                <div id="accordion" role="tablist" aria-multiselectable="true">
                    @forelse ($surgeries as $element)
                        <div class="panel mb5">
                            <div class="panel-heading p10 pb5" role="tab" id="panel-heading{{ $element->id }}">
                                <span class="badge badge-default pull-right">{{ isset( $element->surgery ) ? 'RESURGERY' : '' }}</span>
                                <h5 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#accordio" href="#collapse{{ $element->id }}" aria-expanded="true" aria-controls="collapse{{ $element->id }}" class="mr10">{{ $element->surgery_name }} <small><span title="Visit Title">{{ optional($element->visit)->title }}</span></small></a>
                                    {{-- <a href="#modal-view-{{ $element->id }}" data-toggle="modal" class="mr10">{{ $element->name }}</a> --}}
                                </h5>
                                <div class="mb5"></div>
                                <span>
                                    <a href="#modal-view-{{ $element->visit->id }}" data-toggle="modal" class="mr10 text-primary">visit</a>
                                    <a data-toggle="collapse" data-parent="#accordio" href="#collapse{{ $element->id }}" aria-expanded="true" aria-controls="collapse{{ $element->id }}" class="mr10">view</a>
                                    <a href="#modal-create-{{ $element->id }}" data-toggle="modal" class="mr10">resurgery</a>
                                    {{-- <a href="#modal-view-{{ $element->id }}" data-toggle="modal" class="mr10">view</a> --}}
                                    <a href="#modal-update-{{ $element->id }}" data-toggle="modal" class="mr10">update</a>
                                    <a href="{{ url('/m/surgeries/delete/'.$element->id) }}" class="mr10 text-danger">
                                        <span>delete</span>
                                    </a>
                                </span>
                                <div>
                                    @include('partials.visit-view', ['active_object' => $element->visit])
                                    @include('forms.surgeries-update', ['active_object' => $element])
                                    @include('forms.surgeries-create2', ['active_object' => $element])
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

                <div class="text-left">
                    {{ $surgeries->links('shared.pagination', ['small' => true]) }}
                </div>
            </div>
            <div class="col-md-1 col-xs-12"></div>
        </div>
    </section>

@endsection

@section('page_scripts')
    <script type="text/javascript">
        var base_url = '{{ url('/m/surgeries') }}';
    </script>
    <script type="text/javascript" src="{{ asset('js/toolbar.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/vendor/selectize.js-master/dist/js/standalone/selectize.min.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('select.select-visit').selectize({
                maxItems: 1,
                create: false,
                plugins: ['restore_on_backspace', 'remove_button'],
                delimiter: ','
            });
            $('select.select-surgery_name').selectize({
                maxItems: 1,
                create: true,
                plugins: ['restore_on_backspace', 'remove_button'],
                delimiter: ','
            });
        });
    </script>
@endsection
