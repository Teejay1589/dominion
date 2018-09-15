@extends('layouts.admin')

@section('page_styles')
	<link rel="stylesheet" type="text/css" href="{{ asset('/vendor/selectize.js-master/dist/css/selectize.bootstrap2.css') }}">
@endsection

@section('stylesheets')


	<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>

	<script>
		tinymce.init({
			selector: 'textarea',
			plugins: 'link code',
			menubar: false
		});
	</script>

@endsection

@section('content')

	<div class="row">
		<form action="{{ url('/m/blog/post/edit'.$post->id) }}" method="POST">
			{{ csrf_field() }}
			<div class="col-md-8">
				<div class="form-group">
					<label class="form-control-label">Title:</label>
					<input class="form-control input-lg" type="text" name="title">
				</div>

				<div class="form-group">
					<label class="form-spacing-top">Slug:</label>
					<input class="form-control" type="text" name="slug">
				</div>

				<div class="form-group">
					<label class="form-spacing-top">Body:</label>
					<textarea class="form-control" name="body" rows="5"></textarea>
				</div>
			</div>

			<div class="col-md-4">
					<div class="well">

						<dl class="dl-horizontal">
							<dt>Created At:</dt>
							<dd>{{ date('M j, Y h:ia'), strtotime($post->created_at)) }}</dd>
						</dl>

						<dl class="dl-horizontal">
							<dt>Last Updated:</dt>
							<dd>{{ date('M j, Y h:ia'), strtotime($post->updated_at)) }}</dd>
						</dl>
						<hr>
						<div class="row">
							<div class="col-sm-6">
								<a href="{{ route('posts.show') }}" class="btn btn-danger btn-block">Cancel</a>
							</div>
							<div class="col-sm-6">
								<button type="submit" class="btn btn-success btn-block">Save Changes</button>
							</div>
						</div>

					</div>
				</div>
		</form>
	</div>	<!-- end of .row (form) -->

@stop

@section('scripts')

	<script type="text/javascript">

		$('.select2-multi').select2();
		$('.select2-multi').select2().val({!! json_encode($post->tags()->getRelatedIds()) !!}).trigger('change');

	</script>

@endsection