<?php

namespace App\Http\Controllers\Admin\Main;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Post;

class IndexController extends Controller
{
    public function __invoke()
    {
        $user_count = User::all()->count();
        $post_count = Post::all()->count();
        return view('admin.main.index', compact('user_count', 'post_count'));
    }
}
