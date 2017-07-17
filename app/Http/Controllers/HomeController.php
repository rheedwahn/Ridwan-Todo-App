<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Users;

use Auth;

class HomeController extends Controller
{
    public function index()
    {
    	
    	if(Auth::check())
    	{
    		return redirect()->route('todo.home');
    	}

    	return view('welcome');
    }
}
