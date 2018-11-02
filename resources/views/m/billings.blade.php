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
                                        <a href="{{ url('/m/patients/file_number/'.optional($element->patient())->file_number.'?default') }}" class="mr10 text-primary">
                                            <span>patient</span>
                                        </a>
                                    </span>
                                    {{-- <a href="#modal-view-{{ $element->visit->id }}" data-toggle="modal" class="mr10 text-primary">visit</a> --}}
                                    <span>
                                        <a href="{{ url('/m/visits/id/'.$element->visit->id.'?default') }}" class="mr10 text-primary">
                                            <span>visit</span>
                                        </a>
                                    </span>
                                    <a data-toggle="collapse" data-parent="#accordio" href="#collapse{{ $element->id }}" aria-expanded="true" aria-controls="collapse{{ $element->id }}" class="mr10">view</a>
                                    <a href="#modal-update-{{ $element->id }}" data-toggle="modal" class="mr10">update</a>
                                    <a href="{{ url('/m/billings/toggle_status/'.$element->id) }}" class="mr10">toggle status</a>
                                    <a href="{{ url('/m/billings/delete/'.$element->id) }}" class="mr10 text-danger">
                                        <span>delete</span>
                                    </a>
                                </span>
                                <div>
                                    {{-- @include('partials.visit-view', ['active_object' => $element->visit]) --}}
                                    @include('forms.billings-update', ['active_object' => $element])
                                </div>
                            </div>
                            <div id="collapse{{ $element->id }}" class="panel-body panel-collapse collapse" role="tabpanel">
                                <button role="button" class="btn btn-primary btn-xs mb10" onclick="javascript:printBillingDiv('billing{{ $element->id }}');">Print</button>
                                <div id="billing{{ $element->id }}">
                                    @include('partials.billing-inline-view', ['element' => $element])
                                </div>
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
            // $('select.select-billing_name').selectize({
            //     maxItems: 1,
            //     create: true,
            //     plugins: ['restore_on_backspace', 'remove_button'],
            //     delimiter: ','
            // });
        });
    </script>
    <script type="text/javascript">
        // For Printing
        function printBillingDiv(divName) {
            w=window.open();
            w.document.write("<!DOCTYPE html><html><head><title>Billing Printout | DMC</title><link href='{{ asset('urban/vendor/bootstrap/dist/css/bootstrap.css') }}' rel='stylesheet'><link href='{{ asset('urban/styles/urban.css') }}' rel='stylesheet'><style type='text/css'>@media print {.hidden-print{display: none !important;}}a.text-primary{color:#0099cc!important;}a.text-primary:hover{color:#007399!important;}a.text-danger{color:#d96557!important;}a.text-danger:hover{color:#ce402f!important;}@media(min-width: 768px){.dl-horizontal dt{width:40%;}.dl-horizontal dd{margin-left:44%;width:55%;}}</style></head><body style='background: transparent;'>" +
            "@include('shared.print-header')" +
            document.getElementById(divName).innerHTML + "</body></html>");
            w.print();
            // w.close();
        }
    </script>
@endsection
