<dl class="dl-horizontal">
    <dt></dt>
    <dd class="mb5 lead"><strong>Surgery Details</strong></dd>

    <dt>Case Title</dt>
    <dd class="mb5">{{ $element->visit->title }}</dd>
    <dt>Surgery Name</dt>
    <dd class="mb5">{{ $element->name }}</dd>
    <dt>Surgery Date</dt>
    <dd class="mb5">
        {{ is_null($element->surgery_date) ? '' : Carbon::createFromFormat('Y-m-d', $element->surgery_date)->toFormattedDateString() }}
    </dd>
    <dt>Complications</dt>
    <dd class="mb5">{{ $element->complications }}</dd>
</dl>