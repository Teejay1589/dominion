<div class="table-wrapper">
	<table class="table table-hover table-condensed">
		<thead>
			<tr>
				<th>#</th>
                <th>Surgery Name</th>
				<th>Actions</th>
			</tr>
		</thead>
		<tbody>
			@foreach ($surgery_names as $element)
    			<tr>
    				<td>{{ $loop->iteration }}</td>
                    <td>{{ $element->surgery_name }}</td>
    				<td>
    					<small>
                            <a href="#modal-update-{{ $element->id }}" data-toggle="modal">update</a>
    						<a href="{{ url('/m/surgery_names/delete/'.$element->id) }}" class="text-danger confirm-action">delete</a>
    					</small>
                    </td>
                </tr>
			@endforeach
		</tbody>
	</table>
    @foreach ($surgery_names as $element)
        @include('forms.surgery_names-update', ['active_object' => $element])
    @endforeach
	@if (count($surgery_names) == 0)
        <p class="text-center text-danger">No Surgery Names Yet!</p>
	@endif
    {{-- <div class="text-center">
        {{ $surgery_names->links() }}
    </div> --}}
</div>