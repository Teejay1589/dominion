<dl class="dl-horizontal">
    <dt></dt>
    <dd class="mb5 lead"><strong>User Permission Details</strong></dd>

    <dt>Table</dt>
    <dd class="mb5">{{ str_ireplace('_', ' ', $element->table) }}</span></dd>
    <dt>Action</dt>
    <dd class="mb5">{{ $element->action }}</dd>
    <dt>User OR Staff</dt>
    <dd class="mb5">{{ optional($element->user)->full_name() }}</dd>
    <dt>Created at</dt>
    <dd class="mb5">{{ $element->created_at }}</dd>
</dl>