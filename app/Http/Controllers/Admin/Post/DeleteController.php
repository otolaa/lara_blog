<?php

namespace App\Http\Controllers\Admin\Post;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Support\Facades\Storage;

class DeleteController extends Controller
{
    public function __invoke(Post $post)
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
