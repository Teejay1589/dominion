<div class="table-wrapper">
	<table class="table table-hover">
		<thead>
			<tr>
				<th>#</th>
				<th>Title</th>
                <th>Patient</th>
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
                    <td><span title="{{ Carbon::createFromFormat('Y-m-d', $element->discharged_on)->toFormattedDateString() }}">{{ $element->discharged_on }}</span></td>
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