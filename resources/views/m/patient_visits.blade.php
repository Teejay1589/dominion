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
                    'model' => new App\Visit(),
                    'create_form' => 'forms.visits-create',
                    'data_name' => 'patient_visits',
                    'data' => $visits,
                    'removed_keys' => array('id', 'user_id', 'patient_id', 'created_at', 'updated_at')
                ])

                {{-- <div class="clearfix"></div>
                <br> --}}

                <div id="accordion" role="tablist" aria-multiselectable="true">
                    @forelse ($visits as $element)
                        <div class="panel mb5">
                            <div class="panel-heading p10 pb5" role="tab" id="panel-heading{{ $element->id }}">
                                <span class="badge pull-right">{{ $element->type }}</span>
                                <h5 class="panel-title">
                                    <a href="#modal-view-{{ $element->id }}" data-toggle="modal" class="mr10">{{ $element->title }}</a>
                                </h5>
                                <div class="mb5"></div>
                                <span>
                                    <a data-toggle="collapse" data-parent="#accordio" href="#collapse{{ $element->id }}" aria-expanded="true" aria-controls="collapse{{ $element->id }}" class="mr10 text-primary">
                                        <span>patient</span>
                                    </a>
                                    <a href="#modal-view-{{ $element->id }}" data-toggle="modal" class="mr10">view</a>
                                    <a href="#modal-update-{{ $element->id }}" data-toggle="modal" class="mr10">update</a>
                                    <a href="{{ url('/m/visits/delete/'.$element->id) }}" class="mr10 text-danger">
                                        <span>delete</span>
                                    </a>
                                </span>
                                <div>
                                    @include('partials.visit-view', ['active_object' => $element])
                                    @include('forms.visits-update', ['active_object' => $element])
                                </div>
                            </div>
                            <div id="collapse{{ $element->id }}" class="panel-body panel-collapse collapse" role="tabpanel">
                                @include('partials.patient-inline-view', ['element' => $element->patient])
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
                    {{ $visits->links('shared.pagination', ['small' => true]) }}
                </div>

                {{-- @include('tables.visits') --}}
            </div>
            </div>
        </div>
    </section>

@endsection

@section('page_scripts')
    <script type="text/javascript">
        var base_url = '{{ url('/m/patient/'.$active_object->id.'/visits') }}';
    </script>
    <script type="text/javascript" src="{{ asset('js/toolbar.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/vendor/selectize.js-master/dist/js/standalone/selectize.min.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('select.select-patient').selectize({
                maxItems: 1,
                create: false,
                plugins: ['restore_on_backspace', 'remove_button'],
                delimiter: ','
            });
            $('select.select-doctors').selectize({
                maxItems: 5,
                plugins: ['restore_on_backspace', 'remove_button'],
                delimiter: ','
            });
        });
    </script>
    <script>
        // TOGGLE successful_delivery checkbox if visit type is DELIVERY
        $('select[name="type"]').change(function() {
            if ( $(this).val() == "DELIVERY" ) {
                $('select[name="type"]').parent().parent().parent().parent().find('input[name="successful_delivery"]').attr('disabled', false);
            } else {
                $('select[name="type"]').parent().parent().parent().parent().find('input[name="successful_delivery"]').attr('disabled', true);
            }
        });
    </script>
@endsection
