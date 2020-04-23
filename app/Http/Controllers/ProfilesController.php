<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class ProfilesController extends Controller
{
    public function show(User $user)
    {
    	return view('profiles.show', compact('user'));
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
    		'link' => 'required|url'
    	]);

    	auth()->user()->profile->update($data);

    	return redirect()->route('profiles.show', ['user' => $user]);
    }
}
