<div class="table-wrapper">
	<table class="table table-hover">
		<thead>
			<tr>
				<th>#</th>
				<th>Case Title</th>
				<th>Surgery Name</th>
                <th>Started At</th>
                <th>Ended At</th>
                <th>Is Successful</th>
				<th>Actions</th>
			</tr>
		</thead>
		<tbody>
			@foreach ($surgeries as $element)
    			<tr>
    				<td>{{ $loop->iteration }}</td>
    				<td>{{ $element->case->title }}</td>
                    <td>{{ $element->name }}</td>
                    <td><span title="{{ is_null($element->started_at) ? '' : Carbon::createFromFormat('Y-m-d H:i:s', $element->started_at)->toFormattedDateString() }}">{{ is_null($element->started_at) ? '' : Carbon::createFromFormat('Y-m-d H:i:s', $element->started_at)->format('Y-m-d') }}</span></td>
                    <td><span title="{{ is_null($element->ended_at) ? '' : Carbon::createFromFormat('Y-m-d H:i:s', $element->ended_at)->toFormattedDateString() }}">{{ is_null($element->ended_at) ? '' : Carbon::createFromFormat('Y-m-d H:i:s', $element->ended_at)->format('Y-m-d') }}</span></td>
                    <td>{{ ($element->is_success) ? 'YES' : 'NO' }}</td>
    				<td>
    					<small>
                            <a href="#modal-view-{{ $element->id }}" data-toggle="modal">view</a>
                            <a href="#modal-update-{{ $element->id }}" data-toggle="modal">update</a>
    						<a href="{{ url('/m/surgeries/delete/'.$element->id) }}" class="text-danger confirm-action">delete</a>
    					</small>
                        @include('partials.surgery-view', ['active_object' => $element])
                        @include('forms.surgeries-update', ['active_object' => $element])
    				</td>
    			</tr>
			@endforeach
		</tbody>
	</table>
	@if (count($surgeries) == 0)
        <p class="text-center text-danger">No Surgeries Yet!</p>
	@endif
</div>