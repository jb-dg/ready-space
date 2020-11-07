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
        //$this->middleware('auth');
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
        $posts = Post::latest()->paginate(21);
        return view('welcome', compact('posts'));
    }
}
