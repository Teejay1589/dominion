@extends('layouts.admin')

@section('page_styles')
	<link rel="stylesheet" type="text/css" href="{{ asset('/vendor/selectize.js-master/dist/css/selectize.bootstrap2.css') }}">
@endsection

@section('content')

	<section>
		<div class="container-fluid">
			<div>
				<a href="#modal-create" class="btn btn-link btn-block" data-toggle="modal">Create New Post</a>
                @include('m.blog.posts.create')
            </div>

		</div>

		<div class="col-md-12">
			<table class="table">
				<thead>
					<th>Title</th>
					<th>Body</th>
					<th>Created At</th>
					<th></th>
				</thead>

				<tbody>

					@foreach ($posts as $post)

						<tr>
							<td>{{ $post->title }}</td>
							<td>{{ substr(strip_tags($post->body), 0, 50) }}{{ strlen(strip_tags($post->body)) > 50 ? "..." : "" }}</td>
							<td>{{ date('M j, Y', strtotime($post->created_at)) }}</td>
							{{--<td><a href="{{ route('posts.show', $post->id) }}" class="btn btn-default btn-sm">View</a> <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-default btn-sm">Edit</a></td>--}}
						</tr>

					@endforeach

				</tbody>
			</table>

			<div class="text-center">
				{!! $posts->links(); !!}
			</div>
		</div>
	</section>


@endsection