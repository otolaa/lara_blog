<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Category;
use App\Models\Tag;
use App\Helpers\Help;

class IndexController extends Controller
{
    public function __invoke()
    {
        $posts = Post::orderBy('created_at', 'desc')->take(4)->get();
        return view('main.index', compact('posts'));
    }

    public function lte3()
    {
        abort(404);
    }

    public function show(Post $post)
    {
        //return $post;
        return view('main.show', compact('post'));
    }
}
