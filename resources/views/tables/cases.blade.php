<div class="table-wrapper">
	<table class="table table-hover">
		<thead>
			<tr>
				<th>#</th>
				<th>Title</th>
                <th>Patient</th>
                <th>Symptoms</th>
                <th>Treatment</th>
                <th>Medicine</th>
                <th>Is Consultation</th>
                <th>Is Emergency</th>
                <th>Is Delivery</th>
                <th>Delivery Success</th>
                <th>Doctors</th>
                <th>Disharged on</th>
				<th>Actions</th>
			</tr>
		</thead>
		<tbody>
			@foreach ($cases as $element)
    			<tr>
    				<td>{{ $loop->iteration }}</td>
    				<td>{{ $element->title }}</td>
                    <td>{{ $element->patient->name }}</td>
                    <td>{{ str_limit($element->symptoms, 50) }}</td>
                    <td>{{ str_limit($element->treatment, 50) }}</td>
                    <td>{{ str_limit($element->medicine, 50) }}</td>
                    <td>{{ ($element->is_consultation) ? 'YES' : 'NO' }}</td>
                    <td>{{ ($element->is_emergency) ? 'YES' : 'NO' }}</td>
                    <td>{{ ($element->is_delivery) ? 'YES' : 'NO' }}</td>
                    <td>{{ ($element->is_success) ? 'YES' : 'NO' }}</td>
                    <td>{{ isset($element->case_doctors) ? $element->case_doctors->count() : 0 }}</td>
                    <td><span title="{{ is_null($element->discharged_on) ? '' : Carbon::createFromFormat('Y-m-d H:i:s', $element->discharged_on)->toFormattedDateString() }}">{{ is_null($element->discharged_on) ? '' : Carbon::createFromFormat('Y-m-d H:i:s', $element->discharged_on)->format('Y-m-d') }}</span></td>
    				<td>
    					<small>
                            <a href="javascript:;">view</a>
                            <a href="#modal-update-{{ $element->id }}" data-toggle="modal">update</a>
    						<a href="{{ url('/cases/delete/'.$element->id) }}" class="text-danger confirm-action">delete</a>
    					</small>
                        @include('forms.cases-update', ['active_object' => $element])
    				</td>
    			</tr>
			@endforeach
		</tbody>
	</table>
	@if (count($cases) == 0)
        <p class="text-center text-danger">No Cases Yet!</p>
	@endif
</div>