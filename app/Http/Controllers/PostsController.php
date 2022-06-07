<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    public function index()
    {
        //
    }

    public function create()
    {
        return view('dashboard.posts.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            "tilte" => 'required',
            "content" => 'required',
            "slug" => 'unique:posts,slug',
        ]);

        $user_id = auth()->id();

        Post::create([
            "title" => $request->title,
            "content" => $request->content,
            "slug" => $request->slug,
            "user_id" => $user_id
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
        $slug = $request->slug;
        $post = Post::where("slug", $slug)->firstOrFail();
        return view("dashboard.posts.create", ["post" => $post]);
    }

    public function update(Request $request, Post $post_id)
    {
        $post = Post::findOrFail($post_id);

        $request->validate([
            "tilte" => 'required',
            "content" => 'required',
            "slug" => 'unique:posts,slug',
        ]);

        $user_id = auth()->id();

        $post->update([
            "title" => $request->title,
            "content" => $request->content,
            "slug" => $request->slug,
        ]);

        return redirect()->route('dashboard')->with("success", "عملیات با موفقیت انجام شد");
    }

    public function destroy(Post $post_id)
    {
        $post = Post::findOrFail($post_id);
        $post->delete();
    }
}