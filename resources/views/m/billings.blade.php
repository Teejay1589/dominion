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
                    'model' => new App\Billing(),
                    'create_form' => 'forms.billings-create',
                    'data_name' => 'billing',
                    'data' => $billings,
                    'removed_keys' => array('id', 'user_id', 'discount', 'total', 'is_paid', 'created_at', 'updated_at'),
                    'added_keys' => array('status'),
                    'addup_keys' => array('patient_id', 'patient_file_number')
                ])

                {{-- <div class="clearfix"></div>
                <br> --}}

                <div id="accordion" role="tablist" aria-multiselectable="true">
                    @forelse ($billings as $element)
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
                                    <span>
                                        <a href="{{ url('/m/patients/file_number/'.optional($element->patient())->file_number) }}" class="mr10 text-primary">
                                            <span>patient</span>
                                        </a>
                                    </span>
                                    <a href="#modal-view-{{ $element->visit->id }}" data-toggle="modal" class="mr10 text-primary">visit</a>
                                    <a data-toggle="collapse" data-parent="#accordio" href="#collapse{{ $element->id }}" aria-expanded="true" aria-controls="collapse{{ $element->id }}" class="mr10">view</a>
                                    {{-- <a href="#modal-update-{{ $element->id }}" data-toggle="modal" class="mr10">update</a> --}}
                                    <a href="{{ url('/m/billings/delete/'.$element->id) }}" class="mr10 text-danger">
                                        <span>delete</span>
                                    </a>
                                    <a href="{{ url('/m/billings/toggle_status/'.$element->id) }}" class="mr10">change status</a>
                                </span>
                                <div>
                                    @include('partials.visit-view', ['active_object' => $element->visit])
                                    @include('forms.billings-update', ['active_object' => $element])
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

                <div class="text-left">
                    {{ $billings->links('shared.pagination', ['small' => true]) }}
                </div>
            </div>
            <div class="col-md-1 col-xs-12"></div>
        </div>
    </section>

@endsection

@section('page_scripts')
    <script type="text/javascript">
        var base_url = '{{ url('/m/billings') }}';
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
