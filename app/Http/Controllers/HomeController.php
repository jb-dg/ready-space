<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(User $user)
    {
        return view('home', compact('user'));
    }

    public function show(User $user)
    {
        return view('home.posts', compact('user'));
    }

    public function welcome()
    {
        //$users = auth()->user()->following->pluck('user_id');
        //$posts = Post::whereIn('user_id', $users)->with('user')->latest()->paginate(21);
        $posts = Post::latest()->paginate(21);
        return view('welcome', compact('posts'));
    }
}
