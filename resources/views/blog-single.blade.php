@extends('layouts.app')

@section('title', $page->title)

@section('page_styles')
@endsection

@section('content')
  {{-- <div class="row">
    <div class="jumbotron" style="background: rgba(25,25,25,0.8); margin: -5px -10px; color: #fff;">
      <div class="container">
        <h2>{{ $post->title }}</h2>
        <p>By {{ $post->user->first_name . " " . $post->user->last_name }}</p>
        <div class="clearfix"></div>
        <br>
      </div>
    </div>
  </div> --}}

  <div class="container">
    <div class="row">

      <div class="clearfix"></div>
      <br>
      <br>

      <div>
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
              <h1>{{ $post->title }}</h1>
              <p>{{ $post->user->first_name . " " . $post->user->last_name }}
                  <span class="pull-right">{{ isset($post->created_at) ? Carbon::createFromFormat('Y-m-d H:i:s', $post->created_at)->toFormattedDateString() : '[UNKNOWN]' }}</span></p>

              @if(!empty($post->image))
                  <img src="{{asset('/img/' . $post->image)}}" width="800" height="400"/>
              @endif
              <p> <br> {!! nl2br($post->body) !!}</p>
              <hr>
            </div>
        </div>
      </div>

    </div>
  </div>
@endsection

@section('page_scripts')
@endsection