<?php

namespace App\Http\Controllers\Admin\Post;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Http\Requests\Admin\Post\UpdateRequest;
use Illuminate\Support\Facades\Storage;

class UpdateController extends Controller
{
    public function __invoke(UpdateRequest $request, Post $post)
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
}
