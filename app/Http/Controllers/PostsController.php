<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    public function create()
    {
        return view('dashboard.posts.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            "title"   => 'required',
            "content" => 'required',
            "slug"    => 'unique:posts,slug',
        ]);

        $user_id = auth()->id();

        Post::create([
            "title"   => $request->get('title'),
            "content" => $request->get('content'),
            "slug"    => $request->get('slug'),
            "user_id" => $user_id,
        ]);

        return redirect()->route('dashboard')->with("success", "عملیات با موفقیت انجام شد");
    }

    public function show(Request $request)
    {
        $slug = $request->slug;
        $post = Post::where("slug", $slug)->firstOrFail();

        return view("blog.single", ["post" => $post]);
    }

    public function edit(Request $request)
    {
        $id = $request->id;
        $post = Post::where("id", $id)->firstOrFail();

        return view("dashboard.posts.edit", ["post" => $post]);
    }

    public function update(Request $request, $id)
    {
        $post = Post::findOrFail($id);

        $request->validate([
            "title"   => 'required',
            "content" => 'required',
            "slug"    => 'unique:posts,slug',
        ]);

        $post->update([
            "title"   => $request->get('title'),
            "content" => $request->get('content'),
            "slug"    => $request->get('slug'),
        ]);

        return redirect()->route('dashboard')->with("success", "عملیات با موفقیت انجام شد");
    }

    public function destroy(Request $request)
    {
        $id = $request->id;
        $post = Post::findOrFail($id);
        $post->delete();

        return redirect()->route('dashboard')->with("success", "عملیات با موفقیت انجام شد");
    }
}
