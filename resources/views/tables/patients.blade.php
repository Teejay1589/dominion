<div class="table-wrapper">
	<table class="table table-hover">
		<thead>
			<tr>
				<th>#</th>
				<th>Name</th>
				<th>Gender</th>
				<th>Telephone</th>
				<th>Next of Kin</th>
				<th>Blood Group</th>
				<th>Genotype</th>
				<th>No of Cases</th>
				<th>Actions</th>
			</tr>
		</thead>
		<tbody>
			@foreach ($patients as $element)
    			<tr>
    				<td>{{ $loop->iteration }}</td>
    				<td>{{ $element->name }}</td>
    				<td>{{ $element->gender }}</td>
    				<td>{{ $element->telephone }}</td>
    				<td>{{ $element->next_of_kin }} {{ (isset($element->next_of_kin_telephone)) ? "[".$element->next_of_kin_telephone."]" : "" }}</td>
    				<td>{{ $element->blood_group }}</td>
    				<td>{{ $element->genotype }}</td>
    				<td>{{ $element->cases->count() }} <small><a href="javascript:;">cases</a></small></td>
    				<td>
    					<small>
                            <a href="javascript:;">view</a>
                            <a href="#modal-update-{{ $element->id }}" data-toggle="modal">update</a>
    						<a href="{{ url('/patients/delete/'.$element->id) }}" class="text-danger confirm-action">delete</a>
    					</small>
    					@include('forms.patients-update', ['active_object' => $element])
    				</td>
    			</tr>
			@endforeach
		</tbody>
	</table>
	@if (count($patients) == 0)
        <p class="text-center text-danger">No Patients Yet!</p>
	@endif
</div>