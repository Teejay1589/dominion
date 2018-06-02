@include('blog.header')


<div class="jarallax w3ls-services w3ls-section" id="services">
    <div class="container text-center">
            <h2>Welcome to our blog!</h2>
            <h2 class="lead">Get the best of medical news and health information!</h2>
    </div>
</div>

<div class="jarallax w3ls-services w3ls-section">
    <div class="container">
        @foreach($posts as $post)

            <div class="post">
                <h3>{{ $post->title }}</h3>
                <span class="pull-right"> {{ \Carbon\Carbon::parse($post->created_at)
                                                    ->diffForHumans() }}</span>
                <p>{{ substr(strip_tags($post->body), 0, random_int(90, 250)) }}{{ strlen(strip_tags($post->body)) > 150 ? "..." : "" }}</p>
                <a href="{{ url('/blog/'.$post->slug) }}" class="btn btn-primary">Read More</a>
            </div>

            <hr>

        @endforeach

    </div>
</div>


@include('blog.footer')