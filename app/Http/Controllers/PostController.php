<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use App\Post;

class PostController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth');
	}

    public function index()
    {
        $users = auth()->user()->following->pluck('user_id');
        $posts = Post::whereIn('user_id', $users)->with('user')->latest()->paginate(2);
        return view('posts.index', compact('posts'));
    }

    public function create()
    {
    	return view('posts.create');
    }

    public function store()
    {
    	$data = request()->validate([
    		'caption' => ['required', 'string'],
    		'image' => "required|image|mimes:jpeg,png,jpg,gif,svg|max:2048",
    	]);

    	$imagePath = request('image')->store('uploads', 'public');
        $img = Image::make(public_path("/storage/{$imagePath}"))->fit(5000,6000);
        $img->save();

    	auth()->user()->posts()->create([
    		'caption' => $data['caption'],
    		'image' => $imagePath
    	]);

    	return redirect()->route('profiles.show', ['user' => auth()->user()]);
    }

    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }
}
