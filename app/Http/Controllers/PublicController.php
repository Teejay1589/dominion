<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\UpdateProfile;
use App\Http\Requests\ChangeUserPassword;
use App\Post;

class PublicController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->page = collect();
        $this->page->title = 'Patient Dashboard';
        $this->page->view = 'home';
    }

    public function blog()
    {
        // $posts = Post::orderBy('created_at', 'desc')->limit(4)->get();
        // return view('blog.home')->withPosts($posts);
        $this->posts = Post::orderBy('created_at', 'desc')->paginate(8);

        $this->page->title = 'Blog';
        $this->page->view = 'blog';
        return view($this->page->view)
            ->with('page', $this->page)
            ->with('posts', $this->posts);
    }

    public function getSingle($slug) {
        // fetch from the DB based on slug
        // $post = Post::where('slug', '=', $slug)->first();
        $this->post = Post::where('slug', '=', $slug)->first();

        // return the view and pass in the post object
        // return view('m/blog/blog.single')->withPost($post);

        $this->page->title = $this->post->title;
        $this->page->view = 'blog-single';
        return view($this->page->view)
            ->with('page', $this->page)
            ->with('post', $this->post);
    }
}
