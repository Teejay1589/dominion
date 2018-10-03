<dl class="dl-horizontal">
  <dt></dt>
  <dd class="mb5 lead"><strong>Personal Details</strong></dd>

  @if (get_class(Auth::user()) == "App\User")
    <dt>Patient</dt>
    <dd class="mb5">{{ $active_object->patient->full_name() }} <span title="Phone Number">{{ $active_object->patient->phone_number }}</span> {!! $active_object->patient->file_number(true) !!}</dd>
  @endif
  <dt>File Name</dt>
  <dd class="mb5">{!! $active_object->file_name !!} <a href="{{ asset($active_object->file) }}" target="_blank" title="view original file" class="text-primary">view original file</a></dd>
  <dt>File</dt>
  <dd class="mb5">
    <img src="{{ asset($active_object->file_thumb()) }}" alt="file image" class="img-responsive">
  </dd>
  <dt>Created at</dt>
  <dd class="mb5">{{ $active_object->created_at }}</dd>
</dl>