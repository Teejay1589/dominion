@extends('layouts.app')

@section('title', $page->title)

@section('page_styles')
  <style type="text/css">
    .expand {
      /*margin: -5px -10px;*/
      margin: auto -10px;
    }
  </style>
@endsection

@section('content')
  <div class="row">
    <div class="jumbotron expand" style="background: rgba(25,25,25,0.8); color: #fff;">
      <div class="container">
        <div>
          <div class="clearfix"></div>
          <br>
          <h2>Welcome to DMC Blog</h2>
          <p>Get the best of medical news and health information!</p>
          <div class="clearfix"></div>
          <br>
        </div>
      </div>
    </div>
  </div>

  <div class="container">
    <div class="row">

      <div class="clearfix"></div>
      <br>

      <div>
        <h1>Blog Page Content.</h1>

        <div>
        	@forelse($posts as $post)
	        	<div class="post">
              <h3>{{ $post->title }}</h3>
              <span class="pull-right">{{ isset($post->created_at) ? Carbon::createFromFormat('Y-m-d H:i:s', $post->created_at)->toFormattedDateString() : '[UNKNOWN]' }}</span>
              <p>{{ substr(strip_tags($post->body), 0, random_int(90, 250)) }}{{ strlen(strip_tags($post->body)) > 150 ? "..." : "" }}</p>
              <a href="{{ url('/blog/'.$post->slug) }}" class="btn btn-primary">Read More</a>
            </div>

            @if ( !$loop->last )
	            <hr>
            @endif
          @empty
          	<div class="bg-danger" style="padding: 5px 10px;">
          		There are NO Blog Posts Yet!
          	</div>
          	<div class="clearfix"></div>
          	<br>
          	<br>
          	<br>
          	<br>
          	<br>
          	<br>
          	<br>
	        @endforelse
        </div>
      </div>

      <div class="clearfix mt20"></div>
      <br>
      <br>

    </div>
  </div>
@endsection

@section('page_scripts')
@endsection