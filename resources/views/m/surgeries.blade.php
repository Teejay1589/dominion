@extends('layouts.admin')

@section('title', $page->title)

@section('page_styles')
    @if( count($surgeries) > 0 )
        <link rel="stylesheet" type="text/css" href="{{ asset('js/datatables/datatables.min.css') }}">
        <style type="text/css">
            .dataTables_wrapper .row {
                width: 100%;
            }
        </style>
    @endif
    <link rel="stylesheet" type="text/css" href="{{ asset('/vendor/selectize.js-master/dist/css/selectize.bootstrap2.css') }}">
@endsection

@section('content')

    {{-- <section>
        <div class="container-fluid">
        	<div>
        		<a href="#modal-create" class="btn btn-link btn-block" data-toggle="modal">Create Surgery</a>
	        	@include('forms.surgeries-create')
        	</div>

        	<div class="clearfix"></div>
        	<br>

            @include('tables.surgeries')
        </div>
    </section> --}}
    <section>
        <div class="row mb15">
            <div class="col-md-1 col-xs-12"></div>
            <div class="col-md-10 col-xs-12">
            	@include('components.toolbar', [
                    'model' => new App\Surgery(),
                    'create_form' => 'forms.surgeries-create',
                    'data_name' => 'surgery',
                    'data' => $surgeries,
                    'removed_keys' => array('id', 'user_id', 'created_at', 'updated_at')
                ])

                {{-- <div class="clearfix"></div>
                <br> --}}

                <div id="accordion" role="tablist" aria-multiselectable="true">
                    @forelse ($surgeries as $element)
                        <div class="panel mb5">
                            <div class="panel-heading p10 pb5" role="tab" id="panel-heading{{ $element->id }}">
                                <span class="badge badge-default pull-right">{{ $element->type }}</span>
                                <h5 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#accordio" href="#collapse{{ $element->id }}" aria-expanded="true" aria-controls="collapse{{ $element->id }}" class="mr10">{{ $element->name }}</a>
                                    {{-- <a href="#modal-view-{{ $element->id }}" data-toggle="modal" class="mr10">{{ $element->name }}</a> --}}
                                </h5>
                                <div class="mb5"></div>
                                <span>
                                    <a data-toggle="collapse" data-parent="#accordio" href="#collapse{{ $element->id }}" aria-expanded="true" aria-controls="collapse{{ $element->id }}" class="mr10">view</a>
                                    {{-- <a href="#modal-view-{{ $element->id }}" data-toggle="modal" class="mr10">view</a> --}}
                                    <a href="#modal-update-{{ $element->id }}" data-toggle="modal" class="mr10">update</a>
                                    <a href="{{ url('/m/surgeries/delete/'.$element->id) }}" class="mr10 text-danger">
                                        <span>delete</span>
                                    </a>
                                </span>
                                <div>
                                    @include('partials.surgery-view', ['active_object' => $element])
                                    @include('forms.surgeries-update', ['active_object' => $element])
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

                {{-- <div class="text-left">
                    {{ $surgeries->links('shared.pagination', ['small' => true]) }}
                </div> --}}

                {{-- @include('tables.visits') --}}
            </div>
            </div>
        </div>
    </section>

@endsection

@section('page_scripts')
    @if( count($surgeries) > 0 )
        <script type="text/javascript" src="{{ asset('js/datatables/datatables.min.js') }}"></script>
        <script type="text/javascript">
            $(".table").DataTable({
                "pageLength": 10
            });
        </script>
    @endif
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
