@extends('layouts.admin')

@section('page_styles')
    <link rel="stylesheet" type="text/css"
          href="{{ asset('/vendor/selectize.js-master/dist/css/selectize.bootstrap2.css') }}">
@endsection

@section('content')

    <section>
        <div class="container-fluid">

            <div class="row">
                <div class="col-md-8">
                    <h1>{{ $post->title }}</h1>

                    <p class="lead">{!! $post->body !!}</p>

                </div>

                <div class="col-md-4">
                    <div class="well">
                        <dl class="dl-horizontal">
                            <label>Url:</label>
                            <p>
                                <a href="{{ route('/m/blog/blog.single', $post->slug) }}">{{ route('/m/blog/blog.single', $post->slug) }}</a>
                            </p>
                        </dl>

                        <dl class="dl-horizontal">
                            <label>Created At:</label>
                            <p>{{ date('M j, Y h:ia', strtotime($post->created_at)) }}</p>
                        </dl>

                        <dl class="dl-horizontal">
                            <label>Last Updated:</label>
                            <p>{{ date('M j, Y h:ia', strtotime($post->updated_at)) }}</p>
                        </dl>
                        <hr>
                        <div class="row">
                            <div class="col-sm-6">
                                <a href="{{ route('/m/blog/posts.edit', $post->id) }}"
                                   class="btn btn-primary btn-block">Edit</a>
                            </div>
                            <div class="col-sm-6">
                                <a href="{{ route('/m/blog/posts.destroy', $post->id) }}"
                                   class="btn btn-danger btn-block">Delete</a>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-12">
                                <a href="{{ route('posts.index') }}" class="btn btn-default btn-block btn-h1-spacing"><<
                                    See All Posts</a>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection