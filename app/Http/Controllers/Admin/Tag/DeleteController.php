<?php

namespace App\Http\Controllers\Admin\Tag;

use App\Http\Controllers\Controller;
use App\Models\Tag;

class DeleteController extends Controller
{
    public function __invoke(Tag $tag)
    {
        try {
            $tag->delete();
        } catch (\Exception $exception) {
            \Session::flash('success', $exception->getMessage());
        }

        return redirect()->route('admin.tag.index');
    }
}
