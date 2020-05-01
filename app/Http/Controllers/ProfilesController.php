<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Intervention\Image\Facades\Image;
use App\User;

class ProfilesController extends Controller
{
    public function show(User $user)
    {
        $follows = (auth()->user()) ? auth()->user()->following->contains($user->profile->id) : false;

        //mise en cache
        $postsCount = Cache::remember('posts.count'.$user->id, now()->addSeconds(30), function() use ($user){
            return $user->posts->count();
        });

        $followersCount = Cache::remember('followers.count'.$user->id, now()->addSeconds(30), function() use ($user){
            return $user->profile->followers->count();
        });

        $followingCount = Cache::remember('following.count'.$user->id, now()->addSeconds(30), function() use ($user){
            return $user->following->count();
        });

    	return view('profiles.show', compact('user', 'follows', 'postsCount', 'followersCount', 'followingCount'));
    }

    public function edit(User $user)
    {
    	$this->authorize('update', $user->profile);
    	return view('profiles.edit', compact('user'));
    }

    public function update(User $user)
    {
    	$data = request()->validate([
    		'title' => 'required',
    		'description' => 'required',
    		'link' => 'required|url',
            'image' => 'sometimes|image|mimes:jpeg,png,jpg,gif,svg|max:50000'
    	]);

        if (request('image')) {
            $imagePath = request('image')->store('avatars', 'public');
            $img = Image::make(public_path("/storage/{$imagePath}"))->fit(3000,3000);
            $img->save();

            auth()->user()->profile->update(array_merge(
                $data,
                ['image' => $imagePath]
            ));
        }else{
            auth()->user()->profile->update($data);
        }

    	return redirect()->route('profiles.show', ['user' => $user]);
    }
}
