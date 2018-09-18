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
                    'data_name' => 'SMS',
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
                                    <span class="badge" title="No of Patients">{{ $element->patient_files_patients->count() }} {{ str_plural('PATIENT', $element->patient_files_patients->count()) }}</span>
                                    <br>
                                    <div class="text-center">
                                        <strong title="COST PER Patient">{{ ceil(strlen($element->message) / 160) }} {{ str_plural('UNIT', ceil(strlen($element->message) / 160)) }}</strong>
                                    </div>
                                </span>
                                <h5 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#accordio" href="#collapse{{ $element->id }}" aria-expanded="true" aria-controls="collapse{{ $element->id }}" class="mr10">{{ $element->from }} <small><span title="{!! str_ireplace('<br />', '', nl2br($element->message)) !!}">{{ str_limit($element->message, 50) }}</span></small></a>
                                </h5>
                                <div class="mb5"></div>
                                <span>
                                    {{-- <span>
                                        <a href="{{ url('/m/users/id/'.optional($element->user)->id.'?default') }}" class="mr10 text-primary">
                                            <span>user</span>
                                        </a>
                                    </span> --}}
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
                                <button role="button" class="btn btn-primary btn-xs mb10" onclick="javascript:printPatioentFileDiv('patient_files{{ $element->id }}');">Print</button>
                                <div id="patient_files{{ $element->id }}">
                                    {{-- @include('partials.patient_files-inline-view', ['active_object' => $element]) --}}
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
        $('textarea[name="message"]').keyup(function() {
            $(this).parent().find('.msg-characters').text($(this).val().length + ' characters = ' + Math.ceil($(this).val().length/160) + ' message unit');
        });

        $('#checkAllPatients').click(function() {
            if ($(this).is(':checked')) {
                $('.form-group.select-patients').addClass('hidden');
            } else {
                $('.form-group.select-patients').addClass('hidden');
            }
        });
    </script>
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
        function printPatioentFileDiv(divName) {
            w=window.open();
            w.document.write("<!DOCTYPE html><html><head><title>PatioentFile Printout | DMC</title><link href='{{ asset('urban/vendor/bootstrap/dist/css/bootstrap.css') }}' rel='stylesheet'><link href='{{ asset('urban/styles/urban.css') }}' rel='stylesheet'><style type='text/css'>a.text-primary{color:#0099cc!important;}a.text-primary:hover{color:#007399!important;}a.text-danger{color:#d96557!important;}a.text-danger:hover{color:#ce402f!important;}@media(min-width: 768px){.dl-horizontal dt{width:40%;}.dl-horizontal dd{margin-left:44%;width:55%;}}</style></head><body>" +
            "@include('shared.print-header')" +
            document.getElementById(divName).innerHTML + "</body></html>");
            w.print();
            // w.close();
        }
    </script>
@endsection
