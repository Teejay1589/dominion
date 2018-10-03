<dl class="dl-horizontal">
    <dt></dt>
    <dd class="mb5 lead"><strong>Reminder Details</strong></dd>

    <dt>User</dt>
    <dd class="mb5">{{ $element->user->full_name() }} <span class="badge" title="Role">{{ $element->user->role->name }}</span></dd>
    <dt>Label</dt>
    <dd class="mb5">{{ $element->label }}</dd>
    <dt>Done</dt>
    <dd class="mb5">
        <strong class="text-{{ ($element->done) ? 'success' : 'danger' }}" title="STATUS">{{ ($element->done) ? 'YES' : 'NO' }}</strong>
        @if (get_class(Auth::user()) == "App\User")
            <a href="{{ url('/m/reminders/toggle_status/'.$element->id) }}" class="text-primary hidden-print">toggle</a>
        @endif
    </dd>
    @if (get_class(Auth::user()) == "App\User")
        <dt>Created at</dt>
        <dd class="mb5">{{ $element->created_at }}</dd>
    @endif
</dl>