<dl class="dl-horizontal">
    <dt></dt>
    <dd class="mb5 lead"><strong>Billing Details</strong></dd>

    <dt>SMS From</dt>
    <dd class="mb5">{{ $active_object->from }}</dd>
    <dt>SMS Messsage</dt>
    <dd class="mb5">{!! nl2br($active_object->message) !!}</dd>
    <dt>Created at</dt>
    <dd class="mb5">{{ $active_object->created_at }}</dd>
</dl>

<div class="clearfix"></div>
<br>

<div class="h4"><strong>Patients</strong> <small><strong>{{ $active_object->sms_patients->count() }}</strong></small></div>
<div>
    @if ( $active_object->sms_patients->count() != 0 )
        <ol>
            @foreach ($active_object->sms_patients as $element)
                <li class="mb5">{{ $element->patient->full_name() }} <span class="badge" title="Phone Number">{{ $element->patient->phone_number }}</span> {!! $element->patient->file_number(true) !!}</li>
            @endforeach
        </ol>
    @else
        <div class="text-danger">No Patients Found!</div>
    @endif
</div>