<dl class="dl-horizontal">
    <dt></dt>
    @if( isset($element->surgery) )
        <dd class="mb5 lead"><strong>Resurgery Details</strong></dd>
    @else
        <dd class="mb5 lead"><strong>Surgery Details</strong></dd>
    @endif


    @if (get_class(Auth::user()) == "App\User")
        <dt>Patient</dt>
        <dd class="mb5">{{ $element->patient()->full_name() }} <span class="badge" title="Phone Number">{{ $element->patient()->phone_number }}</span> {!! $element->patient()->file_number(true) !!}</dd>
    @endif
    <dt>Visit Title</dt>
    <dd class="mb5">{{ $element->visit->title }}</dd>
    <dt>Surgery Name</dt>
    <dd class="mb5">{{ $element->surgery_name }}</dd>
    <dt>Surgery Date</dt>
    <dd class="mb5">
        {{ is_null($element->surgery_date) ? '' : Carbon::createFromFormat('Y-m-d', $element->surgery_date)->toFormattedDateString() }}
    </dd>
    <dt class="text-danger">Complications</dt>
    <dd class="mb5 text-danger">{{ $element->complications }}</dd>
    @if (get_class(Auth::user()) == "App\User")
        <dt>Created at</dt>
        <dd class="mb5">{{ $element->created_at }}</dd>
    @endif

    @foreach ($element->surgeries->sortBy('id') as $item)
        <dt><br></dt>
        <dd class="mb5 lead"></dd>

        <dt></dt>
        <dd class="mb5 lead"><strong>Resurgery {{ $loop->iteration }} Details</strong></dd>

        <dt>Visit Title</dt>
        <dd class="mb5">{{ $item->visit->title }}</dd>
        <dt>Surgery Name</dt>
        <dd class="mb5">{{ $item->surgery_name }}</dd>
        <dt>Surgery Date</dt>
        <dd class="mb5">
            {{ is_null($item->surgery_date) ? '' : Carbon::createFromFormat('Y-m-d', $item->surgery_date)->toFormattedDateString() }}
        </dd>
        <dt class="text-danger">Complications</dt>
        <dd class="mb5 text-danger">{{ $item->complications }}</dd>
        @if (get_class(Auth::user()) == "App\User")
            <dt>Created at</dt>
            <dd class="mb5">{{ $item->created_at }}</dd>
        @endif
    @endforeach

    <dt><br></dt>
    <dd class="mb5 lead"></dd>

    @isset($element->surgery)
        <dt></dt>
        <dd class="mb5 lead"><strong>Earlier Surgery Details</strong></dd>

        <dt>Visit Title</dt>
        <dd class="mb5">{{ $element->surgery->visit->title }}</dd>
        <dt>Surgery Name</dt>
        <dd class="mb5">{{ $element->surgery->surgery_name }}</dd>
        <dt>Surgery Date</dt>
        <dd class="mb5">
            {{ is_null($element->surgery->surgery_date) ? '' : Carbon::createFromFormat('Y-m-d', $element->surgery->surgery_date)->toFormattedDateString() }}
        </dd>
        <dt class="text-danger">Complications</dt>
        <dd class="mb5 text-danger">{{ $element->surgery->complications }}</dd>
        @if (get_class(Auth::user()) == "App\User")
            <dt>Created at</dt>
            <dd class="mb5">{{ $element->created_at }}</dd>
        @endif
    @endisset
</dl>