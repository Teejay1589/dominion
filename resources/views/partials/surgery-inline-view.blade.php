<dl class="dl-horizontal">
    <dt></dt>
    <dd class="mb5 lead"><strong>Surgery Details</strong></dd>

    <dt>Patient</dt>
    <dd class="mb5">{{ $element->patient()->first_name." ".$element->patient()->last_name }} <span class="badge badge-default">{{ $element->patient()->phone_number }}</span></dd>
    <dt>Visit Title</dt>
    <dd class="mb5">{{ $element->visit->title }}</dd>
    <dt>Surgery Name</dt>
    <dd class="mb5">{{ $element->surgery_name }}</dd>
    <dt>Surgery Date</dt>
    <dd class="mb5">
        {{ is_null($element->surgery_date) ? '' : Carbon::createFromFormat('Y-m-d', $element->surgery_date)->toFormattedDateString() }}
    </dd>
    <dt>Complications</dt>
    <dd class="mb5">{{ $element->complications }}</dd>
    <dt>Created at</dt>
    <dd class="mb5">{{ $element->created_at }}</dd>

    <dt><br></dt>
    <dd class="mb5 lead"></dd>

    @isset($element->surgery)
        <dt></dt>
        <dd class="mb5 lead"><strong>Resurgery Details</strong></dd>

        <dt>Visit Title</dt>
        <dd class="mb5">{{ $element->surgery->visit->title }}</dd>
        <dt>Surgery Name</dt>
        <dd class="mb5">{{ $element->surgery->surgery_name }}</dd>
        <dt>Surgery Date</dt>
        <dd class="mb5">
            {{ is_null($element->surgery->surgery_date) ? '' : Carbon::createFromFormat('Y-m-d', $element->surgery->surgery_date)->toFormattedDateString() }}
        </dd>
        <dt>Complications</dt>
        <dd class="mb5">{{ $element->surgery->complications }}</dd>
        <dt>Created at</dt>
        <dd class="mb5">{{ $element->created_at }}</dd>
    @endisset
</dl>