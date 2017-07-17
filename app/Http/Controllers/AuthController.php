<?php

namespace App\Http\Controllers;

use App\Users;

use Session;

use Auth;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function getRegister()
    {

        if(Auth::check())
        {
            return redirect()->route('todo.home');
        }

        return view('auth.register');
    }

    public function getLogin()
    {

        if(Auth::check())
        {
            return redirect()->route('todo.home');
        }

        return view('auth.login');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createUser(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:200|string',
            'email' => 'required|max:30|email|unique:users|max:255',
            'password' => 'required|min:6',
            'profile' => 'required|image',
            'username' => 'required|max:20|unique:users|alpha_dash',
            ]);

        $profile_image = $request->profile;

        $profile_image_new_name = time().$profile_image->getClientOriginalName();

        $profile_image->move('uploads/profile_image', $profile_image_new_name);

        Users::create([
            'name' => $request->name,
            'email' => $request->email,
            'username' => $request->username,
            'password' => bcrypt($request->password),
            'user_image' => 'uploads/profile_image/'.$profile_image_new_name,
            ]);

        Session::flash('success', 'Your account has been created, you can proceed to login');

        return redirect()->route('home');

    }

    public function userLogin(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required'
            ]);

        if(!Auth::attempt($request->only(['email','password']), $request->has('remember'))) 
        {
            Session::flash('error', 'Could not sign you in with those credentials!');

            return redirect()->back();
        }

        Session::flash('success', 'Welcome To Todo Application !!!');
        return redirect()->route('todo.home');
    }

    public function userLogout()
    {
        
        Auth::logout();

        return redirect()->route('home');
    
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
