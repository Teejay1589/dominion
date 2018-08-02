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
                    'data_name' => 'visit',
                    'data' => $visits,
                    'removed_keys' => array('id', 'user_id', 'created_at', 'updated_at')
                ])

                {{-- <div class="clearfix"></div>
                <br> --}}

                <div id="accordion" role="tablist" aria-multiselectable="true">
                    @forelse ($visits as $element)
                        <div class="panel mb5">
                            <div class="panel-heading p10 pb5" role="tab" id="panel-heading{{ $element->id }}">
                                <span class="badge badge-default pull-right">{{ $element->type }}</span>
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
                                <button role="button" class="btn btn-primary btn-xs mb10" onclick="javascript:printPatientDiv('patient{{ $element->id }}');">Print</button>
                                <div id="patient{{ $element->id }}">
                                    @include('partials.patient-inline-view', ['element' => $element->patient])
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
        var base_url = '{{ url('/m/visits') }}';
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
    <script type="text/javascript">
        // For Printing
        function printPatientDiv(divName) {
            w=window.open();
            w.document.write("<!DOCTYPE html><html><head><title>Patient Printout | DMC</title><link href='{{ asset('urban/vendor/bootstrap/dist/css/bootstrap.css') }}' rel='stylesheet'><link href='{{ asset('urban/styles/urban.css') }}' rel='stylesheet'><style type='text/css'>a.text-primary{color:#0099cc!important;}a.text-primary:hover{color:#007399!important;}a.text-danger{color:#d96557!important;}a.text-danger:hover{color:#ce402f!important;}@media(min-width: 768px){.dl-horizontal dt{width:40%;}.dl-horizontal dd{margin-left:44%;width:55%;}}</style></head><body>" +
            // "<h2 style='text-align:center;font-weight:bold;'>DOMINION MEDICAL CENTER</h2>" +
            // "<h5 style='text-align:center;font-weight:light;'>Specialist Medical And Diagonistics Center</h5>" +
            // "<h5 style='text-align:center;font-weight:light;'>" +
            // "<span class='mr10'> 4 Nova Road Ado-Ekiti, Ekiti State. </span>" +
            // "<strong class='mr10'> +234(0)8177433899 </strong>" +
            // "</h5>" +
            // "<div class='clearfix'></div>" +
            // "<br>" +
            "@include('shared.print-header')" +
            document.getElementById(divName).innerHTML + "</body></html>");
            w.print();
            // w.close();
        }
        function printVisitDiv(divName) {
            w=window.open();
            w.document.write("<!DOCTYPE html><html><head><title>Visit Printout | DMC</title><link href='{{ asset('urban/vendor/bootstrap/dist/css/bootstrap.css') }}' rel='stylesheet'><link href='{{ asset('urban/styles/urban.css') }}' rel='stylesheet'><style type='text/css'>a.text-primary{color:#0099cc!important;}a.text-primary:hover{color:#007399!important;}a.text-danger{color:#d96557!important;}a.text-danger:hover{color:#ce402f!important;}@media(min-width: 768px){.dl-horizontal dt{width:40%;}.dl-horizontal dd{margin-left:44%;width:55%;}}</style></head><body>" +
            "@include('shared.print-header')" +
            document.getElementById(divName).innerHTML + "</body></html>");
            w.print();
            // w.close();
        }
    </script>
@endsection
