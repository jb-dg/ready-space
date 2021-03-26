<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Session;

class UserController extends Controller
{
    public function edit(User $user)
    {
    	if (auth()->user()) {
    		return view('user.edit', compact('user'));
    	}
    }

    public function update(User $user)
    {
    	if (auth()->user()) {
    		if ($user->email === request('email')) {
	    		$data = request()->validate([
	    			'email' => ['required', 'string', 'email', 'max:255'],
	    			'password' => 'required'
	    		]);
	    	} else {
	    		$data = request()->validate([
	    			'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
	    			'password' => 'required'
	    		]);
	    	}

	    	if (Hash::check($data['password'], $user->password)) {
    			auth()->user()->update(['email' => $data['email']]);
    			$message = 'Adresse e-mail modifié !';
    			$typeMessage = 'success';
    		} else {
    			$message = 'Veuillez renseigner le bon mot de passe.';
    			$typeMessage = 'error';
    		}
    	}
    	return redirect()->route('user.edit', compact('user'))->with($typeMessage, $message); 	
    }

    public function changePassword(User $user)
    {
    	if (auth()->user()) {
    		$data = request()->validate([
    			'old-password' => ['required', 'string', 'min:8'],
    			'new-password' => ['required', 'string', 'min:8'],
    			'confirm-password' => ['required', 'string', 'min:8']
    		]);

    		if (Hash::check($data['old-password'], $user->password)) {
    			if ($data['new-password'] === $data['confirm-password']) {
    				auth()->user()->update(['password' => Hash::make($data['new-password'])]);
    				$message = 'Mot de passe modifié !';
    				$typeMessage = 'success';
    			} else {
    				$message =  'le nouveau mot de passe et le mot de passe de confirmation doivent être identique';
    				$typeMessage = 'error';
    			}

    		} else {
    			 $message = 'Veuillez entrer votre mot de passe actuel';
    			 $typeMessage = 'error';
    		}
    	}
    	return redirect()->route('user.edit', compact('user'))->with($typeMessage, $message);
    }
}
