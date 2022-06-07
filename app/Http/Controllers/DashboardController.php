<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $posts = \App\Models\Post::where('user_id',auth()->id())->get();
        return view('dashboard.dashboard',compact('posts'));
    }
}
