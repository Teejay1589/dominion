<dl class="dl-horizontal">
    <dt></dt>
    <dd class="mb5 lead"><strong>User OR Staff Details</strong></dd>

    <dt>Role</dt>
    <dd class="mb5"><span class="badge">{{ optional($element->role)->name }}</span></dd>
    <dt>Permissions</dt>
    <dd class="mb5"><strong class="text-success">{{ App\Permission::where('permit', '>=', $element->role_id)->count() + App\UserPermission::where('user_id', $element->id)->count() }}</strong></dd>
    <dt>First Name</dt>
    <dd class="mb5">{{ $element->first_name }}</dd>
    <dt>Last Name</dt>
    <dd class="mb5">{{ $element->last_name }} <a href="{{ url('/m/users/password/reset/'.$element->id) }}" class="text-primary hidden-print">reset password</a></dd>
    <dt>Email</dt>
    <dd class="mb5">{{ $element->email }}</dd>
    <dt>Phone</dt>
    <dd class="mb5">{{ $element->phone }}</dd>
    <dt>Gender</dt>
    <dd class="mb5">{{ $element->gender }}</dd>
    <dt>Date of Birth</dt>
    <dd class="mb5">{{ $element->date_of_birth }}</dd>
    <dt>Address</dt>
    <dd class="mb5">{{ $element->address }}</dd>
    <dt>Country</dt>
    <dd class="mb5">{{ $element->country }}</dd>
    <dt>State</dt>
    <dd class="mb5">{{ $element->state }}</dd>
    <dt>Job</dt>
    <dd class="mb5">{{ $element->job }}</dd>
    <dt>Created at</dt>
    <dd class="mb5">{{ $element->created_at }}</dd>
</dl>