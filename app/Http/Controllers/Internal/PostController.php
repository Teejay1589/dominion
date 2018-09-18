<?php

namespace App\Http\Controllers\Internal;

use App\Post;
use App\User;
use Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends InternalControl
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::orderBy('id', 'desc')->paginate(isset($_GET['entries']) ? $_GET['entries'] : 10);
        return view('m/blog/posts.index')->withPosts($posts);
    }

    public function filter($filter, $searchterm = "")
    {
        if ($filter == "user_id") {
            $objects = User::where("name", 'LIKE', "%$searchterm%")->get();
            $this->posts = Post::whereIn($filter, $objects->pluck('id'))->latest()->paginate(isset($_GET['entries']) ? $_GET['entries'] : 10);
        } else {
            $this->posts = Post::where($filter, 'LIKE', "%$searchterm%")->latest()->paginate(isset($_GET['entries']) ? $_GET['entries'] : 10);
        }

        if (isset($this->posts)) {
            $this->posts->filter = $filter;
            $this->posts->searchterm = $searchterm = urldecode($searchterm);
        }

        return view('m/blog/posts.index')->withPosts($this->posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('m/blog/posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // validate the data
        $request->validate([
            'title' => 'required|string|unique:posts|max:191',
            'body' => 'required|string',
        ]);

        $request['user_id'] = Auth::id();
        $request['slug'] = str_slug($request->title);

        $obj = new Post($request->all());
        $obj->save();

        session()->flash('success', 'Blog Post Created Successfully!');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);
        return view('m/blog/posts.show')->withPost($post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // find the post in the database and save as a var
        $post = Post::find($id);

        // return the view and pass in the var we previously created
        return view('m/blog/posts.edit')->with('post', $post);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // Validate the data
        $request->validate([
            'title' => 'required|string|max:191',
            'body' => 'required|string',
        ]);

        if (Post::where('title', $request->title)->count() >= 1) {
            if (Post::where('title', $request->title)->first()->id != $id) {
                return redirect()->back()->withErrors('The title provided is already used.')->withInput();
            }
        }
        if (session()->has('update_id')) {
            session()->forget('update_id');
        }

        // $request['user_id'] = Auth::id();
        $request['slug'] = str_slug($request->title);

        Post::findOrFail($id)->update($request->all());

        session()->flash('success', 'Blog Post Updated Successfully!');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Post::findOrFail($id)->delete();

        session()->flash('success', 'Blog Post Deleted Successfully!');
        return redirect()->back();
    }
}
