<?php

namespace App\Http\Controllers\Admin\Post;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Tag;
use App\Models\Category;
use App\Http\Requests\Admin\Post\StoreRequest;
use App\Http\Requests\Admin\Post\UpdateRequest;
use Illuminate\Support\Facades\Storage;

class IndexController extends Controller
{
    public function __invoke()
    {
        $posts = Post::orderBy('created_at', 'desc')->paginate(20);
        return view('admin.post.index', compact('posts'));
    }

    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('admin.post.create', compact('categories','tags'));
    }

    public function store(StoreRequest $request)
    {
        try {
            $data = $request->validated();
            $tagIds = isset($data['tag_ids']) && $data['tag_ids'] ? $data['tag_ids'] : [];
            unset($data['tag_ids']);

            if (isset($data['preview_image']))
                $data['preview_image'] = Storage::disk('public')->put('/images', $data['preview_image']);

            if (isset($data['main_image']))
                $data['main_image'] = Storage::disk('public')->put('/images', $data['main_image']);

            $post = Post::firstOrCreate($data);
            $post->tags()->attach($tagIds);
        } catch (\Exception $exception) {
            abort(404);
        }

        return redirect()->route('admin.post.index');
    }

    public function show(Post $post)
    {
        return view('admin.post.show', compact('post'));
    }

    public function edit(Post $post)
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('admin.post.edit', compact('post','categories', 'tags'));
    }

    public function update(UpdateRequest $request, Post $post)
    {
        try {
            $data = $request->validated();
            $tagIds = isset($data['tag_ids']) && $data['tag_ids'] ? $data['tag_ids'] : [];
            unset($data['tag_ids']);

            if (isset($data['preview_image']))
                $data['preview_image'] = Storage::disk('public')->put('/images', $data['preview_image']);

            if (isset($data['main_image']))
                $data['main_image'] = Storage::disk('public')->put('/images', $data['main_image']);

            $post->update($data);
            $post->tags()->sync($tagIds);
        } catch (\Exception $exception) {
            abort(404);
        }

        return view('admin.post.show', compact('post'));
    }

    public function delete(Post $post)
    {
        if (isset($post->preview_image))
            Storage::disk('public')->delete($post->preview_image);

        if (isset($post->main_image))
            Storage::disk('public')->delete($post->main_image);

        $post->tags()->sync([]);
        $post->delete();
        return redirect()->route('admin.post.index');
    }
}
