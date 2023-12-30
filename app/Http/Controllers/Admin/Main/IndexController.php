<?php

namespace App\Http\Controllers\Admin\Main;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Post;
use App\Models\Tag;
use App\Models\Category;


class IndexController extends Controller
{
    public function __invoke()
    {
        $user_count = User::all()->count();
        $post_count = Post::all()->count();
        $tag_count = Tag::all()->count();
        $category_count = Category::all()->count();
        return view('admin.main.index', compact('user_count', 'post_count', 'tag_count', 'category_count'));
    }
}
