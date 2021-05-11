<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class UsersController extends Controller
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

    public function users()
    {      
        $users =  DB::table('users')->select('id','name','email','is_admin')->get();
        return view('users', compact('users'));       
    }

    public function edit($id)
    {
        return view('editusers', compact('id'));
    }
}
