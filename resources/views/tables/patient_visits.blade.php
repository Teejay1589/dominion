<div class="table-wrapper">
	<table id="visits-table" class="table table-hover table-condensed">
		<thead>
			<tr>
				<th>#</th>
                <th>Type</th>
				<th>Title</th>
                {{-- <th>Symptoms</th> --}}
                {{-- <th>Treatment</th> --}}
                {{-- <th>Medicine</th> --}}
                <th>Consultation</th>
                <th>Emergency</th>
                <th>Delivery</th>
                <th>Delivery Success</th>
                <th>Doctors</th>
                <th>Surgeries</th>
                <th>Disharged on</th>
				<th>Actions</th>
			</tr>
		</thead>
		<tbody>
			@foreach ($patient_visits as $element)
    			<tr>
    				<td>{{ $loop->iteration }}</td>
                    <td>{{ $element->type }}</td>
    				<td>{{ $element->title }}</td>
                    {{-- <td>{{ str_limit($element->symptoms, 50) }}</td> --}}
                    {{-- <td>{{ str_limit($element->treatment, 50) }}</td> --}}
                    {{-- <td>{{ str_limit($element->medicine, 50) }}</td> --}}
                    <td>{{ ($element->is_consultation) ? 'YES' : 'NO' }}</td>
                    <td>{{ ($element->is_emergency) ? 'YES' : 'NO' }}</td>
                    <td>{{ ($element->is_delivery) ? 'YES' : 'NO' }}</td>
                    <td>{{ ($element->is_success) ? 'YES' : 'NO' }}</td>
                    <td>{{ isset($element->visit_doctors) ? $element->visit_doctors->count() : 0 }}</td>
                    <td>{{ isset($element->surgeries) ? $element->surgeries->count() : 0 }}</td>
                    <td><span title="{{ is_null($element->discharged_on) ? '' : Carbon::createFromFormat('Y-m-d H:i:s', $element->discharged_on)->toFormattedDateString() }}">{{ is_null($element->discharged_on) ? '' : Carbon::createFromFormat('Y-m-d H:i:s', $element->discharged_on)->format('Y-m-d') }}</span></td>
    				<td>
    					<small>
                            <a href="#modal-view-{{ $element->id }}" data-toggle="modal">view</a>
                            <a href="#modal-update-{{ $element->id }}" data-toggle="modal">update</a>
    						<a href="{{ url('/m/visits/delete/'.$element->id) }}" class="text-danger confirm-action">delete</a>
    					</small>
                    </td>
                </tr>
			@endforeach
		</tbody>
	</table>
    @foreach ($visits as $element)
        @include('partials.visit-view', ['active_object' => $element])
        @include('forms.visits-update', ['active_object' => $element])
    @endforeach
	@if (count($visits) == 0)
        <p class="text-center text-danger">No Visits Yet!</p>
	@endif
    {{-- <div class="text-center">
        {{ $visits->links() }}
    </div> --}}
</div>