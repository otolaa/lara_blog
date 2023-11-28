<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function __invoke()
    {
        $posts = Post::orderBy('created_at', 'desc')->take(5)->get();
        return view('main.index', compact('posts'));
    }

    public function lte3()
    {
        abort(404);
    }
}
