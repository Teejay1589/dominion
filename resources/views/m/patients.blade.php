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
                                <span class="pull-right" title="File Number">{!! $element->file_number(true) !!}</span>
                                <h5 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#accordio" href="#collapse{{ $element->id }}" aria-expanded="true" aria-controls="collapse{{ $element->id }}" class="mr10">{{ $element->full_name() }} <small><span title="Phone Number">{{ $element->phone_number }}</span></small></a>
                                </h5>
                                <div class="mb5"></div>
                                <span>
                                    <span>
                                        {{-- <a href="{{ url('/m/patient/'.$element->id.'/visits') }}" class="mr10 text-primary"> --}}
                                        <a href="{{ url('/m/visits/patient_file_number/'.$element->file_number) }}" class="mr10 text-primary">
                                            <strong style="color: #555;">{{ $element->visits->count() }}</strong>
                                            <span>visits</span>
                                        </a>
                                    </span>
                                    @if ( $element->visits->count() > 0 )
                                        {{-- <a href="#modal-view-{{ $element->visits->last()->id }}" data-toggle="modal" class="mr10">last visit</a> --}}
                                        <span>
                                            <a href="{{ url('/m/visits/id/'.$element->visits->last()->id.'?default') }}" class="mr10 text-primary">
                                                <span>last visit</span>
                                            </a>
                                        </span>
                                    @endif
                                    <span>
                                        <a href="{{ url('/m/surgeries/patient_file_number/'.$element->file_number) }}" class="mr10 text-primary">
                                            <strong style="color: #555;">{{ $element->surgeries()->count() }}</strong>
                                            <span>surgeries</span>
                                        </a>
                                    </span>
                                    <span>
                                        <a href="{{ url('/m/billings/patient_file_number/'.$element->file_number) }}" class="mr10 text-primary">
                                            <strong style="color: #555;">{{ $element->billings()->count() }}</strong>
                                            <span>billings</span>
                                        </a>
                                    </span>
                                    <span>
                                        <a href="{{ url('/m/sms/create?patient_id='.$element->id) }}" class="mr10 text-primary">
                                            <strong style="color: #555;">{{ $element->sms_patients->count() }}</strong>
                                            <span>send sms</span>
                                        </a>
                                    </span>
                                    <span>
                                        <a href="{{ url('/m/patient_files/patient_file_number/'.$element->file_number) }}" class="mr10 text-primary">
                                            <strong style="color: #555;">{{ $element->patient_files->count() }}</strong>
                                            <span>patient files</span>
                                        </a>
                                    </span>
                                    <a data-toggle="collapse" data-parent="#accordio" href="#collapse{{ $element->id }}" aria-expanded="true" aria-controls="collapse{{ $element->id }}" class="mr10">view</a>
                                    <a href="#modal-update-{{ $element->id }}" data-toggle="modal" class="mr10">update</a>
                                    <a href="{{ url('/m/patients/delete/'.$element->id) }}" class="mr10 text-danger">
                                        <span>delete</span>
                                    </a>
                                </span>
                                <div>
                                    @include('forms.patients-update', ['active_object' => $element])
                                    {{-- @if ( $element->visits->count() > 0 )
                                        @include('partials.visit-view', ['active_object' => $element->visits->last()])
                                    @endif --}}
                                </div>
                            </div>
                            <div id="collapse{{ $element->id }}" class="panel-body panel-collapse collapse {{ ((isset($patients->filter) && $patients->filter == 'file_number') && $patients->total() == 1) ? 'in' : '' }}" role="tabpanel">
                                <button role="button" class="btn btn-primary btn-xs mb10" onclick="javascript:printPatientDiv('patient{{ $element->id }}');">Print</button>
                                <a role="button" class="btn btn-danger btn-xs mb10" href="{{ url('/m/medical-history/'.$element->id) }}">Medical History</a>
                                <div id="patient{{ $element->id }}">
                                    @include('partials.patient-inline-view', ['element' => $element])
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
    <script type="text/javascript">
        // For Printing
        function printPatientDiv(divName) {
            w=window.open();
            w.document.write("<!DOCTYPE html><html><head><title>Patient Printout | DMC</title><link href='{{ asset('urban/vendor/bootstrap/dist/css/bootstrap.css') }}' rel='stylesheet'><link href='{{ asset('urban/styles/urban.css') }}' rel='stylesheet'><style type='text/css'>@media print {.hidden-print{display: none !important;}}a.text-primary{color:#0099cc!important;}a.text-primary:hover{color:#007399!important;}a.text-danger{color:#d96557!important;}a.text-danger:hover{color:#ce402f!important;}@media(min-width: 768px){.dl-horizontal dt{width:40%;}.dl-horizontal dd{margin-left:44%;width:55%;}}</style></head><body style='background: transparent;'>" +
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
    </script>
@endsection
