<dl class="dl-horizontal">
    <dt></dt>
    <dd class="mb5 lead"><strong>Billing Details</strong></dd>

    <dt>Patient</dt>
    <dd class="mb5">{{ $element->patient()->full_name() }} <span class="badge" title="Phone Number">{{ $element->patient()->phone_number }}</span> {!! $element->patient()->file_number(true) !!}</dd>
    <dt>Visit Title</dt>
    <dd class="mb5">{{ $element->visit->title }}</dd>
    <dt>Billing Name</dt>
    <dd class="mb5">{{ $element->billing_name }}</dd>
    <dt>Amount</dt>
    <dd class="mb5"><strong>N</strong>{{ $element->amount }}</dd>
    <dt>status</dt>
    <dd class="mb5"><strong class="text-{{ ($element->is_paid) ? 'success' : 'danger' }}" title="STATUS">{{ ($element->is_paid) ? 'PAID' : 'UNPAID' }}</strong> <a href="{{ url('/m/billings/toggle_status/'.$element->id) }}" class="text-primary hidden-print">toggle</a></dd>
    <dt>Created at</dt>
    <dd class="mb5">{{ $element->created_at }}</dd>
</dl>