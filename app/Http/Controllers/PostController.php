<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use App\Post;
use App\User;

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
    		'title' => ['required', 'string'],
            'caption' => ['required', 'string'],
    		'image' => "required|image|mimes:jpeg,png,jpg,gif,svg|max:100000",
    	]);

    	$imagePath = request('image')->store('uploads', 'public');
        $img = Image::make(public_path("/storage/{$imagePath}"))->fit(5000,6000);
        $img->save();

    	auth()->user()->posts()->create([
    		'title' => $data['title'],
            'caption' => $data['caption'],
    		'image' => $imagePath
    	]);

    	return redirect()->route('profiles.show', ['user' => auth()->user()]);
    }

    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }

    public function edit(Post $post, User $user)
    {
        if ($user->id = $post->user_id) {
            return view('posts.edit', compact('post'));
        }
    }

    public function update(Post $post)
    {
        $data = request()->validate([
            'title' => ['required', 'string'],
            'caption' => ['required', 'string'],
            'image' => "sometimes|image|mimes:jpeg,png,jpg,gif,svg|max:100000",
        ]);

        if (request('image')) {
            $imagePath = request('image')->store('uploads', 'public');
            $img = Image::make(public_path("/storage/{$imagePath}"))->fit(3000,3000);
            $img->save();

            $post->update(array_merge(
                $data,
                ['image' => $imagePath]
            ));
        }else{
            $post->update($data);
        }

        return redirect()->route('profiles.show', ['user' => auth()->user()])->with('success','Annonce mis à jour !');; 
    }

    public function destroy(Post $post, User $user)
    {
        if ($user->id = $post->user_id) {
            $post->delete();
            return redirect()->route('profiles.show', ['user' => auth()->user()])->with('success','Annonce supprimé !');; 
        }
    }
}
