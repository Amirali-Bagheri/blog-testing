<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $posts = Post::latest();
        $users = User::latest();
        return view('dashboard.dashboard',compact('users','posts'));
    }
}
