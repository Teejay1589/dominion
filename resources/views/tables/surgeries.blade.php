<div class="table-wrapper">
	<table class="table table-hover table-condensed">
		<thead>
			<tr>
				<th>#</th>
				<th>Visit Title</th>
                <th>Surgery Name</th>
				<th>Surgery Date</th>
                <th>Complications</th>
                {{-- <th>Is Successful</th> --}}
				<th>Actions</th>
			</tr>
		</thead>
		<tbody>
			@foreach ($surgeries as $element)
    			<tr>
    				<td>{{ $loop->iteration }}</td>
    				<td>{{ $element->visit->title }}</td>
                    <td>{{ $element->name }}</td>
                    <td><span title="{{ is_null($element->surgery_date) ? '' : Carbon::createFromFormat('Y-m-d', $element->surgery_date)->toFormattedDateString() }}">{{ is_null($element->surgery_date) ? '' : Carbon::createFromFormat('Y-m-d', $element->surgery_date)->format('Y-m-d') }}</span></td>
                    <td>{{ str_limit($element->complications, 50) }}</td>
                    {{-- <td>{{ ($element->is_success) ? 'YES' : 'NO' }}</td> --}}
    				<td>
    					<small>
                            <a href="#modal-view-{{ $element->id }}" data-toggle="modal">view</a>
                            <a href="#modal-update-{{ $element->id }}" data-toggle="modal">update</a>
                            <a href="#modal-create-{{ $element->id }}" data-toggle="modal">resurgery</a>
    						<a href="{{ url('/m/surgeries/delete/'.$element->id) }}" class="text-danger confirm-action">delete</a>
    					</small>
                    </td>
                </tr>
			@endforeach
		</tbody>
	</table>
    @foreach ($surgeries as $element)
        @include('partials.surgery-view', ['active_object' => $element])
        @include('forms.surgeries-update', ['active_object' => $element])
        @include('forms.surgeries-create2', ['active_object' => $element])
    @endforeach
	@if (count($surgeries) == 0)
        <p class="text-center text-danger">No Surgeries Yet!</p>
	@endif
    {{-- <div class="text-center">
        {{ $surgeries->links() }}
    </div> --}}
</div>