<dl class="dl-horizontal">
  <dt></dt>
  <dd class="mb5 lead"><strong>Personal Details</strong></dd>

  <dt>Patient</dt>
  <dd class="mb5">{{ $active_object->patient->full_name() }} <span title="Phone Number">{{ $active_object->patient->phone_number }}</span> {!! $active_object->patient->file_number(true) !!}</dd>
  <dt>File Name</dt>
  <dd class="mb5">{!! $active_object->file_name !!}</dd>
  <dt>File</dt>
  <dd class="mb5">
    <img src="{{ asset($active_object->file) }}" alt="file image" class="img-responsive">
  </dd>
  <dt>Created at</dt>
  <dd class="mb5">{{ $active_object->created_at }}</dd>
</dl>