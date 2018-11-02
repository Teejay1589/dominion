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
                    'model' => new App\Reminder(),
                    'create_form' => 'forms.reminders-create',
                    'create_text' => 'Add Reminder',
                    'data_name' => 'Reminder',
                    'data' => $reminders,
                    'removed_keys' => array('id', 'created_at', 'updated_at'),
                    'added_keys' => array(),
                    'addup_keys' => array()
                ])

                {{-- <div class="clearfix"></div>
                <br> --}}

                <div id="accordion" role="tablist" aria-multiselectable="true">
                    @forelse ($reminders as $element)
                        <div class="panel mb5">
                            <div class="panel-heading p10 pb5" role="tab" id="panel-heading{{ $element->id }}">
                                <span class="pull-right">
                                    <a href="{{ url('/m/reminders/toggle_status/'.$element->id) }}">
                                        <span class="badge {{ ($element->done) ? 'bg-success' : 'bg-danger' }}" title="DONE OR NOT">{{ ($element->done) ? 'YES' : 'NO' }}</span>
                                    </a>
                                </span>
                                <h5 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#accordio" href="#collapse{{ $element->id }}" aria-expanded="true" aria-controls="collapse{{ $element->id }}" class="mr10">{{ $element->label }} <small><span title="User">{{ $element->user->full_name() }}</span></small></a>
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
                                    <a href="{{ url('/m/reminders/toggle_status/'.$element->id) }}" class="mr10">toggle done</a>
                                    <a href="{{ url('/m/reminders/delete/'.$element->id) }}" class="mr10 text-danger">
                                        <span>delete</span>
                                    </a>
                                </span>
                                <div>
                                    @include('forms.reminders-update', ['active_object' => $element])
                                </div>
                            </div>
                            <div id="collapse{{ $element->id }}" class="panel-body panel-collapse collapse" role="tabpanel">
                                <button role="button" class="btn btn-primary btn-xs mb10" onclick="javascript:printReminderDiv('reminders{{ $element->id }}');">Print</button>
                                <div id="reminders{{ $element->id }}">
                                    @include('partials.reminder-inline-view', ['active_object' => $element])
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
                    {{ $reminders->links('shared.pagination', ['small' => true]) }}
                </div>
            </div>
            <div class="col-md-1 col-xs-12"></div>
        </div>
    </section>

@endsection

@section('page_scripts')
    <script type="text/javascript">
        var base_url = '{{ url('/m/reminders') }}';
    </script>
    <script type="text/javascript" src="{{ asset('js/toolbar.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/vendor/selectize.js-master/dist/js/standalone/selectize.min.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('select.select-user').selectize({
                create: false,
                plugins: ['restore_on_backspace', 'remove_button'],
                delimiter: ','
            });
        });
    </script>
    <script type="text/javascript">
        // For Printing
        function printReminderDiv(divName) {
            w=window.open();
            w.document.write("<!DOCTYPE html><html><head><title>Reminder Printout | DMC</title><link href='{{ asset('urban/vendor/bootstrap/dist/css/bootstrap.css') }}' rel='stylesheet'><link href='{{ asset('urban/styles/urban.css') }}' rel='stylesheet'><style type='text/css'>@media print {.hidden-print{display: none !important;}}a.text-primary{color:#0099cc!important;}a.text-primary:hover{color:#007399!important;}a.text-danger{color:#d96557!important;}a.text-danger:hover{color:#ce402f!important;}@media(min-width: 768px){.dl-horizontal dt{width:40%;}.dl-horizontal dd{margin-left:44%;width:55%;}}</style></head><body style='background: transparent;'>" +
            "@include('shared.print-header')" +
            document.getElementById(divName).innerHTML + "</body></html>");
            w.print();
            // w.close();
        }
    </script>
@endsection