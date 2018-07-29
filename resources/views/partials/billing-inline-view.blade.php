<dl class="dl-horizontal">
    <dt></dt>
    <dd class="mb5 lead"><strong>Billing Details</strong></dd>

    <dt>Patient</dt>
    <dd class="mb5">{{ $element->patient()->first_name." ".$element->patient()->last_name }} <span class="badge badge-default">{{ $element->patient()->phone_number }}</span></dd>
    <dt>Visit Title</dt>
    <dd class="mb5">{{ $element->visit->title }}</dd>
    <dt>Billing Name</dt>
    <dd class="mb5">{{ $element->billing_name }}</dd>
    <dt>Amount</dt>
    <dd class="mb5"><strong>N</strong>{{ $element->amount }}</dd>
    <dt>Created at</dt>
    <dd class="mb5">{{ $element->created_at }}</dd>
</dl>