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
                    'model' => new App\Sms(),
                    'create_form' => 'forms.sms-create',
                    'create_text' => 'Send SMS',
                    'data_name' => 'SMS',
                    'data' => $sms,
                    'removed_keys' => array('id', 'user_id', 'created_at', 'updated_at'),
                    'added_keys' => array(),
                    'addup_keys' => array('patient_id', 'patient_file_number')
                ])

                {{-- <div class="clearfix"></div>
                <br> --}}

                <div id="accordion" role="tablist" aria-multiselectable="true">
                    @forelse ($sms as $element)
                        <div class="panel mb5">
                            <div class="panel-heading p10 pb5" role="tab" id="panel-heading{{ $element->id }}">
                                <span class="pull-right">
                                    <span class="badge" title="No of Patients">{{ $element->sms_patients->count() }} {{ str_plural('PATIENT', $element->sms_patients->count()) }}</span>
                                    <br>
                                    <div class="text-center">
                                        <strong title="COST PER Patient">{{ ceil(strlen($element->message) / 160) }} {{ str_plural('UNIT', ceil(strlen($element->message) / 160)) }}</strong>
                                    </div>
                                </span>
                                <h5 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#accordio" href="#collapse{{ $element->id }}" aria-expanded="true" aria-controls="collapse{{ $element->id }}" class="mr10">{{ $element->from }} <small><span title="{!! str_ireplace('<br />', ' ', nl2br($element->message)) !!}">{{ str_limit($element->message, 50) }}</span></small></a>
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
                                    <a href="{{ url('/m/sms/delete/'.$element->id) }}" class="mr10 text-danger">
                                        <span>delete</span>
                                    </a>
                                </span>
                                <div>
                                    {{-- @include('forms.sms-update', ['active_object' => $element]) --}}
                                </div>
                            </div>
                            <div id="collapse{{ $element->id }}" class="panel-body panel-collapse collapse" role="tabpanel">
                                <button role="button" class="btn btn-primary btn-xs mb10" onclick="javascript:printSmsDiv('sms{{ $element->id }}');">Print</button>
                                <div id="sms{{ $element->id }}">
                                    {{-- @include('partials.sms-inline-view', ['element' => $element]) --}}
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
                    {{ $sms->links('shared.pagination', ['small' => true]) }}
                </div>
            </div>
            <div class="col-md-1 col-xs-12"></div>
        </div>
    </section>

@endsection

@section('page_scripts')
    <script type="text/javascript">
        var base_url = '{{ url('/m/sms') }}';
    </script>
    <script type="text/javascript" src="{{ asset('js/toolbar.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/vendor/selectize.js-master/dist/js/standalone/selectize.min.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('select.select-patients').selectize({
                maxItems: 200,
                create: false,
                plugins: ['restore_on_backspace', 'remove_button'],
                delimiter: ','
            });
        });
    </script>
    <script type="text/javascript">
        // For Printing
        function printSmsDiv(divName) {
            w=window.open();
            w.document.write("<!DOCTYPE html><html><head><title>Sms Printout | DMC</title><link href='{{ asset('urban/vendor/bootstrap/dist/css/bootstrap.css') }}' rel='stylesheet'><link href='{{ asset('urban/styles/urban.css') }}' rel='stylesheet'><style type='text/css'>a.text-primary{color:#0099cc!important;}a.text-primary:hover{color:#007399!important;}a.text-danger{color:#d96557!important;}a.text-danger:hover{color:#ce402f!important;}@media(min-width: 768px){.dl-horizontal dt{width:40%;}.dl-horizontal dd{margin-left:44%;width:55%;}}</style></head><body>" +
            "@include('shared.print-header')" +
            document.getElementById(divName).innerHTML + "</body></html>");
            w.print();
            // w.close();
        }
    </script>
@endsection
