<dl class="dl-horizontal">
  <dt></dt>
  <dd class="mb5 lead"><strong>Personal Details</strong></dd>

  <dt>File Number</dt>
  <dd class="mb5">{!! $element->file_number(true) !!}</dd>
  <dt>First Name</dt>
  <dd class="mb5">{{ $element->first_name }}</dd>
  <dt>Last Name</dt>
  <dd class="mb5">{{ $element->last_name }}</dd>
  <dt>Phone Number</dt>
  <dd class="mb5">{{ $element->phone_number }} <a href="{{ url('/m/patients/password/reset/'.$element->id) }}" class="text-primary hidden-print">reset password</a></dd>
  <dt>Email</dt>
  <dd class="mb5">{{ $element->email }}</dd>
  <dt>Sex</dt>
  <dd class="mb5">{{ $element->sex }}</dd>
  <dt>Marital Status</dt>
  <dd class="mb5">{{ $element->marital_status }}</dd>
  <dt>Date of Birth</dt>
  <dd class="mb5">{{ $element->date_of_birth }}</dd>
  <dt>Religion</dt>
  <dd class="mb5">{{ $element->religion }}</dd>
  <dt>Address</dt>
  <dd class="mb5">{{ $element->address }}</dd>
  <dt>Nationality</dt>
  <dd class="mb5">{{ $element->nationality }}</dd>
  <dt>State of Origin</dt>
  <dd class="mb5">{{ $element->state_of_origin }}</dd>
  <dt><abbr title="LOCAL GOVERNMRNT AREA">LGA</abbr></dt>
  <dd class="mb5">{{ $element->LGA }}</dd>

  <dt><br></dt>
  <dd class="mb5 lead"></dd>

  <dt></dt>
  <dd class="mb5 lead"><strong>Occupation Details</strong></dd>

  <dt>Occupation</dt>
  <dd class="mb5">{{ $element->occupation }}</dd>
  <dt>Office Address</dt>
  <dd class="mb5">{{ $element->office_address }}</dd>

  <dt><br></dt>
  <dd class="mb5 lead"></dd>

  <dt></dt>
  <dd class="mb5 lead"><strong>Next of Kin Details</strong></dd>

  <dt><abbr title="NEXT OF KIN">NOK</abbr> Name</dt>
  <dd class="mb5">{{ $element->next_of_kin_name }}</dd>
  <dt><abbr title="NEXT OF KIN">NOK</abbr> Relationship</dt>
  <dd class="mb5">{{ $element->next_of_kin_relationship }}</dd>
  <dt><abbr title="NEXT OF KIN">NOK</abbr> Address</dt>
  <dd class="mb5">{{ $element->next_of_kin_address }}</dd>
  <dt><abbr title="NEXT OF KIN">NOK</abbr> Phone Number</dt>
  <dd class="mb5">{{ $element->next_of_kin_phone_number }}</dd>

  <dt><br></dt>
  <dd class="mb5 lead"></dd>

  <dt></dt>
  <dd class="mb5 lead"><strong>Other Details</strong></dd>

  <dt>Blood Group </dt>
  <dd class="mb5">{{ $element->blood_group }}</dd>
  <dt>Weight</dt>
  <dd class="mb5">{{ $element->weight }}</dd>
  <dt>Height</dt>
  <dd class="mb5">{{ $element->height }}</dd>
  <dt>Created at</dt>
  <dd class="mb5">{{ $element->created_at }}</dd>

  <div class="hidden-print">
    <dt><br></dt>
    <dd class="mb5 lead"></dd>

    <dt></dt>
    <dd class="mb5 lead"><strong>Visits</strong> <small><strong>{{ $element->visits->count() }}</strong></small></dd>

    <dt>Visits List</dt>
    <dd class="mb5">List of Patient visits in summary</dd>

    @if ( $element->visits->count() != 0 )
      @foreach ($element->visits as $value)
        <dt>{{ $loop->iteration }}</dt>
        <dd class="mb5">
          <strong>{{ $value->title }}</strong> [{{ $value->visit_doctors->count() }} assigned {{ str_plural('doctor', $value->visit_doctors->count()) }} | {{ $value->surgeries->count() }} performed {{ str_plural('surgery', $value->surgeries->count()) }} | {{ $value->billings->count() }} {{ str_plural('billing', $value->billings->count()) }}]
        </dd>
      @endforeach
    @else
      <dt></dt>
      <dd class="mb5">
        <div class="text-danger">No Visits Found!</div>
      </dd>
    @endif
  </div>
</dl>