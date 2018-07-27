@if(Session::has('warning'))
	<div class="alert alert-warning" style="margin: 0;">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	    {!! Session::get('warning') !!}
	</div>
@endif
@if(Session::has('success'))
	<div class="alert alert-success" style="margin: 0;">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	    {!! Session::get('success') !!}
	</div>
@endif
@if( $errors->any() )
	<div class="alert alert-danger" style="margin: 0;">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	  	@foreach($errors->all() as $error)
			<div>{{ $error }}</div>
		@endforeach
	</div>
@endif