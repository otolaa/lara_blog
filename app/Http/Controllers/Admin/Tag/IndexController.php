<?php

namespace App\Http\Controllers\Admin\Tag;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Tag\StoreRequest;
use App\Models\Tag;
use App\Http\Requests\Admin\Tag\UpdateRequest;

class IndexController extends Controller
{
    public function __invoke()
    {
        $tags = Tag::orderBy('created_at', 'desc')->paginate(20);
        return view('admin.tag.index', compact('tags'));
    }

    public function create()
    {
        return view('admin.tag.create');
    }

    public function store(StoreRequest $request)
    {
        $data = $request->validated();
        Tag::firstOrCreate($data);
        return redirect()->route('admin.tag.index');
    }

    public function show(Tag $tag)
    {
        return view('admin.tag.show', compact('tag'));
    }

    public function edit(Tag $tag)
    {
        return view('admin.tag.edit', compact('tag'));
    }

    public function update(UpdateRequest $request, Tag $tag)
    {
        $data = $request->validated();
        $tag->update($data);
        return view('admin.tag.show', compact('tag'));
    }

    public function delete(Tag $tag)
    {
        try {
            $tag->delete();
        } catch (\Exception $exception) {
            \Session::flash('success', $exception->getMessage());
        }

        return redirect()->route('admin.tag.index');
    }
}
