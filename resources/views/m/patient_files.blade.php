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
                    'model' => new App\PatientFile(),
                    'create_form' => 'forms.patient_files-create',
                    'create_text' => 'Add Patient File',
                    'data_name' => 'Patient File',
                    'data' => $patient_files,
                    'removed_keys' => array('id', 'user_id', 'file', 'created_at', 'updated_at'),
                    'added_keys' => array(),
                    'addup_keys' => array('patient_file_number')
                ])

                {{-- <div class="clearfix"></div>
                <br> --}}

                <div id="accordion" role="tablist" aria-multiselectable="true">
                    @forelse ($patient_files as $element)
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
                                    <span>
                                        <a href="{{ url('/m/patients/file_number/'.optional($element->patient)->file_number.'?default') }}" class="mr10 text-primary">
                                            <span>patient</span>
                                        </a>
                                    </span>
                                    {{-- <span>
                                        <a href="{{ url('/m/users/id/'.optional($element->user)->id.'?default') }}" class="mr10 text-primary">
                                            <span>user</span>
                                        </a>
                                    </span> --}}
                                    <a href="{{ asset($element->file) }}" target="_blank" class="mr10 text-primary">view original file</a>
                                    <a data-toggle="collapse" data-parent="#accordio" href="#collapse{{ $element->id }}" aria-expanded="true" aria-controls="collapse{{ $element->id }}" class="mr10">view</a>
                                    <a href="#modal-update-{{ $element->id }}" data-toggle="modal" class="mr10">update</a>
                                    <a href="{{ url('/m/patient_files/delete/'.$element->id) }}" class="mr10 text-danger">
                                        <span>delete</span>
                                    </a>
                                </span>
                                <div>
                                    @include('forms.patient_files-update', ['active_object' => $element])
                                </div>
                            </div>
                            <div id="collapse{{ $element->id }}" class="panel-body panel-collapse collapse" role="tabpanel">
                                <button role="button" class="btn btn-primary btn-xs mb10" onclick="javascript:printPatientFileDiv('patient_files{{ $element->id }}');">Print</button>
                                <div id="patient_files{{ $element->id }}">
                                    @include('partials.patient_file-inline-view', ['active_object' => $element])
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
                    {{ $patient_files->links('shared.pagination', ['small' => true]) }}
                </div>
            </div>
            <div class="col-md-1 col-xs-12"></div>
        </div>
    </section>

@endsection

@section('page_scripts')
    <script type="text/javascript">
        var base_url = '{{ url('/m/patient_files') }}';
    </script>
    <script type="text/javascript" src="{{ asset('js/toolbar.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/vendor/selectize.js-master/dist/js/standalone/selectize.min.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('select.select-patient').selectize({
                create: false,
                plugins: ['restore_on_backspace', 'remove_button'],
                delimiter: ','
            });
        });
    </script>
    <script type="text/javascript">
        // For Printing
        function printPatientFileDiv(divName) {
            w=window.open();
            w.document.write("<!DOCTYPE html><html><head><title>Patient File Printout | DMC</title><link href='{{ asset('urban/vendor/bootstrap/dist/css/bootstrap.css') }}' rel='stylesheet'><link href='{{ asset('urban/styles/urban.css') }}' rel='stylesheet'><style type='text/css'>@media print {.hidden-print{display: none !important;}}a.text-primary{color:#0099cc!important;}a.text-primary:hover{color:#007399!important;}a.text-danger{color:#d96557!important;}a.text-danger:hover{color:#ce402f!important;}@media(min-width: 768px){.dl-horizontal dt{width:40%;}.dl-horizontal dd{margin-left:44%;width:55%;}}</style></head><body style='background: transparent;'>" +
            "@include('shared.print-header')" +
            document.getElementById(divName).innerHTML + "</body></html>");
            w.print();
            // w.close();
        }
    </script>
@endsection