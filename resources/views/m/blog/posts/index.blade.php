@extends('layouts.admin')

@section('page_styles')
@endsection

@section('content')

	{{-- <section>
		<div class="container-fluid">


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
							{--<td><a href="{{ route('posts.show', $post->id) }}" class="btn btn-default btn-sm">View</a> <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-default btn-sm">Edit</a></td>--}
						</tr>

					@endforeach

				</tbody>
			</table>

			<div class="text-center">
				{!! $posts->links(); !!}
			</div>
		</div>
	</section> --}}

	<section>
        <div class="row mb15">
            <div class="col-md-1 col-xs-12"></div>
            <div class="col-md-10 col-xs-12">
            	<div>
					<a href="#modal-create" class="btn btn-primary btn-block" data-toggle="modal">Create New Post</a>
					@include('m.blog.posts.create')
				</div>

                <div class="clearfix"></div>
                <br>

                <div id="accordion" role="tablist" aria-multiselectable="true">
                    @forelse ($posts as $element)
                        <div class="panel mb5">
                            <div class="panel-heading p10 pb5" role="tab" id="panel-heading{{ $element->id }}">
                                <span class="pull-right">
                                    <a data-toggle="collapse" data-parent="#accordio" href="#collapse{{ $element->id }}" aria-expanded="true" aria-controls="collapse{{ $element->id }}" class="mr10">view</a>
                                    <a href="#modal-update-{{ $element->id }}" data-toggle="modal" class="mr10">update</a>
                                    <a href="{{ url('/m/blog/post/delete/'.$element->id) }}" class="mr10 text-danger">
                                        <span>delete</span>
                                    </a>
                                </span>
                                <h5 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#accordio" href="#collapse{{ $element->id }}" aria-expanded="true" aria-controls="collapse{{ $element->id }}" class="mr10">{{ $element->title }}</a>
                                </h5>
								<div class="mb5"></div>
								<div>
                                    @include('forms.posts-update', ['active_object' => $element])
                                </div>
							</div>
							<div id="collapse{{ $element->id }}" class="panel-body panel-collapse collapse" role="tabpanel">
                                @include('partials.post-inline-view', ['element' => $element])
                            </div>
                        </div>
                    @empty
                        <div class="alert alert-danger">
                            {{-- <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> --}}
                            <strong>Sorry!</strong> No Records Found
                        </div>
                    @endforelse
                </div>

                <div class="text-left">
                    {{ $posts->links('shared.pagination', ['small' => true]) }}
                </div>
            </div>
            <div class="col-md-1 col-xs-12"></div>
        </div>
    </section>


@endsection