<?php
/**
 * Created by PhpStorm.
 * User: Olayinka_Peter
 * Date: 5/26/2018
 * Time: 7:07 PM
 */
namespace App\Http\Controllers\Internal;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Post;

class BlogController extends InternalControl
{
    public function __construct() {
//        $this->middleware('auth:admin');
    }

    public function getIndex() {
        $posts = Post::paginate(10);

        return view('m/blog/blog.index')->withPosts($posts);
    }

    public function getSingle($slug) {
        // fetch from the DB based on slug
        $post = Post::where('slug', '=', $slug)->first();

        // return the view and pass in the post object
        return view('m/blog/blog.single')->withPost($post);
    }
}
