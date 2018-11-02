@extends('layouts.admin')

@section('title', $page->title)

@section('page_styles')
    <link rel="stylesheet" type="text/css" href="{{ asset('/vendor/selectize.js-master/dist/css/selectize.bootstrap2.css') }}">
@endsection

@section('content')
    <section>
        @if (isset($page->action) && strtolower($page->action) == "create")
        <div class="row mb15">
            <div class="col-md-1 col-xs-12"></div>
            <div class="col-md-10 col-xs-12">
                <form action="{{ url('/m/sms/create') }}" method="post">
                    <div class="panel">
                        <div class="panel-heading">
                            <div class="panel-title">Send Sms to <strong>{{ $patients->where('id', $_GET['patient_id'])->first()->full_name() }} <span class="badge">{{ $patients->where('id', $_GET['patient_id'])->first()->phone_number }}</span> {!! $patients->where('id', $_GET['patient_id'])->first()->file_number(true) !!}</strong></div>
                        </div>
                        <div class="panel-body">
                            {{ csrf_field() }}

                            <div class="form-group hidden">
                                <label class="form-control-label">Select Patients <span class="text-danger">*</span></label>
                                <select class="select-patients" name="patients[]" required multiple>
                                    @foreach ($patients->where('id', $_GET['patient_id']) as $element)
                                        <option value="{{ $element->id }}" selected>{{ $element->first_name.' '.$element->last_name }} [{{ $element->phone_number }}] [{{ $element->file_number }}]</option>
                                    @endforeach
                                </select>
                                <span class="form-text"><small><span class="text-danger">min: 1, max: 200</span></small></span>
                            </div>

                            <div class="form-group">
                                <label class="form-control-label">SMS From </label>
                                <input class="form-control" type="text" name="from" placeholder="Sms From" value="{{ old('from', App\Setting::find(1)->sms_from) }}" >
                                {{-- <span class="form-text"><small><strong>DMC</strong> by default.</small></span> --}}
                            </div>

                            <div class="form-group">
                                <label class="form-control-label">SMS Message <span class="text-danger">*</span></label>
                                <textarea name="message" class="form-control" rows="5" placeholder="Message" required>{{ old('message') }}</textarea>
                                <span class="form-text"><small class="msg-characters">160 characters = 1 message unit</small></span>
                            </div>
                        </div>
                        <div class="panel-footer">
                            <a class="btn btn-secondary" onclick="javascript: window.history.back();">Back</a>
                            <button type="submit" class="btn btn-primary">Send</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-md-1 col-xs-12"></div>
        </div>
        @elseif (isset($page->action) && strtolower($page->action) == "unpaid")
        <div class="row mb15">
            <div class="col-md-1 col-xs-12"></div>
            <div class="col-md-10 col-xs-12">
                <form action="{{ url('/m/sms/create') }}" method="post">
                    <div class="panel">
                        <div class="panel-heading">
                            <div class="panel-title">Send Sms to <strong>Patients with unpaid bills</strong></div>
                        </div>
                        <div class="panel-body">
                            {{ csrf_field() }}

                            <div class="form-group">
                                <label class="form-control-label">Select Patients <span class="text-danger">*</span></label>
                                <select class="select-patients" name="patients[]" required multiple>
                                    @foreach ($patients as $element)
                                        <option value="{{ $element->id }}" {{ ($element->unpaid_bills()->count() > 0) ? 'selected' : '' }}>{{ $element->first_name.' '.$element->last_name }} [{{ $element->phone_number }}] [{{ $element->file_number }}]</option>
                                    @endforeach
                                </select>
                                <span class="form-text"><small><span class="text-danger">min: 1, max: 200</span></small></span>
                            </div>

                            <div class="form-group">
                                <label class="form-control-label">SMS From </label>
                                <input class="form-control" type="text" name="from" placeholder="Sms From" value="{{ old('from', App\Setting::find(1)->sms_from) }}" >
                                {{-- <span class="form-text"><small><strong>DMC</strong> by default.</small></span> --}}
                            </div>

                            <div class="form-group">
                                <label class="form-control-label">SMS Message <span class="text-danger">*</span></label>
                                <textarea name="message" class="form-control" rows="5" placeholder="Message" required>{{ old('message', 'This is a reminder from DOMINION SPECIALIST HOSPITAL that you owe us a sum of [total_unpaid_bills] and we are expecting you to balance up.') }}</textarea>
                                <span class="form-text"><small class="msg-characters">160 characters = 1 message unit</small></span>
                            </div>
                        </div>
                        <div class="panel-footer">
                            <a class="btn btn-secondary" onclick="javascript: window.history.back();">Back</a>
                            <button type="submit" class="btn btn-primary">Send</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-md-1 col-xs-12"></div>
        </div>
        @else
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
                                        <a href="#modal-update-{{ $element->id }}" data-toggle="modal" class="mr10">reuse</a>
                                        <a href="{{ url('/m/sms/delete/'.$element->id) }}" class="mr10 text-danger">
                                            <span>delete</span>
                                        </a>
                                    </span>
                                    <div>
                                        @include('forms.sms-update', ['active_object' => $element])
                                    </div>
                                </div>
                                <div id="collapse{{ $element->id }}" class="panel-body panel-collapse collapse" role="tabpanel">
                                    <button role="button" class="btn btn-primary btn-xs mb10" onclick="javascript:printSmsDiv('sms{{ $element->id }}');">Print</button>
                                    <div id="sms{{ $element->id }}">
                                        @include('partials.sms-inline-view', ['active_object' => $element])
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
        @endif

        <div class="clearfix"></div>
        <br>

        <div class="row mb15">
            <div class="col-md-1 col-xs-12"></div>
            <div class="col-md-10 col-xs-12">
                <a href="{{ url('/m/sms/balance') }}" class="btn btn-default">Check Balance</a>
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
            w.document.write("<!DOCTYPE html><html><head><title>Sms Printout | DMC</title><link href='{{ asset('urban/vendor/bootstrap/dist/css/bootstrap.css') }}' rel='stylesheet'><link href='{{ asset('urban/styles/urban.css') }}' rel='stylesheet'><style type='text/css'>@media print {.hidden-print{display: none !important;}}a.text-primary{color:#0099cc!important;}a.text-primary:hover{color:#007399!important;}a.text-danger{color:#d96557!important;}a.text-danger:hover{color:#ce402f!important;}@media(min-width: 768px){.dl-horizontal dt{width:40%;}.dl-horizontal dd{margin-left:44%;width:55%;}}</style></head><body style='background: transparent;'>" +
            "@include('shared.print-header')" +
            document.getElementById(divName).innerHTML + "</body></html>");
            w.print();
            // w.close();
        }
    </script>
@endsection
