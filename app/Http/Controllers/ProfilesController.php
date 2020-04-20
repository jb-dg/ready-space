<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfilesController extends Controller
{
    public function show($userName)
    {
    	return view('profiles.show');
    }
}
