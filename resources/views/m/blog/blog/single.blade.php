@extends('/m/blog/main')
<?php $titleTag = htmlspecialchars($post->title); ?>
@section('title', "| $titleTag")

@section('content')
    <div class="jarallax w3ls-services w3ls-section">
        <div class="container">

            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <h1>{{ $post->title }}</h1>
                    <p>{{ $post->user->first_name . " " . $post->user->last_name }}
                        <span class="pull-right">{{ isset($post->created_at) ? Carbon::createFromFormat('Y-m-d H:i:s', $post->created_at)->toFormattedDateString() : '[UNKNOWN]' }}</span></p>

                    @if(!empty($post->image))
                        <img src="{{asset('/img/'.$post->image)}}" width="800" height="400"/>
                    @endif
                    <p> <br> {!! nl2br($post->body) !!}</p>
                    <hr>
                </div>
            </div>
        </div>
    </div>

@endsection
