<div class="table-wrapper">
	<table class="table table-hover table-condensed">
		<thead>
			<tr>
				<th>#</th>
				<th>First Name</th>
				<th>Last Name</th>
				<th>Gender</th>
				<th>Phone Number</th>
				{{-- <th>Next of Kin</th> --}}
				<th>Blood Group</th>
				<th>Weight</th>
				<th>Height</th>
				<th>No of Visits</th>
				<th>Actions</th>
			</tr>
		</thead>
		<tbody>
			@foreach ($patients as $element)
    			<tr>
    				<td>{{ $loop->iteration }}</td>
    				{{-- <td>{{ $patients->perPage() * $patients->currentPage() + $loop->iteration - $patients->perPage() }}</td> --}}
    				<td>{{ $element->first_name }}</td>
    				<td>{{ $element->last_name }}</td>
    				<td>{{ $element->gender }}</td>
    				<td>{{ $element->phone }}</td>
    				{{-- <td>{{ $element->next_of_kin }} {{ (isset($element->next_of_kin_telephone)) ? "[".$element->next_of_kin_telephone."]" : "" }}</td> --}}
    				<td>{{ $element->blood_group }}</td>
    				<td>{{ $element->weight }}</td>
    				<td>{{ $element->height }}</td>
    				<td>{{ $element->visits->count() }} <small><a href="{{ url('/m/patient/'.$element->id.'/visits') }}">visits</a></small></td>
    				<td>
    					<small>
                            <a href="#modal-view-{{ $element->id }}" data-toggle="modal">view</a>
                            <a href="#modal-update-{{ $element->id }}" data-toggle="modal">update</a>
    						<a href="{{ url('/m/patients/delete/'.$element->id) }}" class="text-danger confirm-action">delete</a>
    					</small>
    				</td>
    			</tr>
			@endforeach
		</tbody>
	</table>
    @foreach ($patients as $element)
		@include('partials.patient-view', ['active_object' => $element])
		@include('forms.patients-update', ['active_object' => $element])
    @endforeach
	@if (count($patients) == 0)
        <p class="text-center text-danger">No Patients Yet!</p>
	@endif
	{{-- <div class="text-center">
		{{ $patients->links() }}
	</div> --}}
</div>