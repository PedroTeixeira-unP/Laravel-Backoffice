<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

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
        return view('users/users', compact('users'));       
    }

    public function editedbyadmin($id)
    {
        $users =  User::where('id',$id)->first();
        return view('users/editusers', compact('users','id'));
    }

    public function updatedbyadmin(Request $request)
    { 
        $user = User::find($request->id);
        if($request->is_admin != null){
            $request->is_admin = 1;
        }else{
            $request->is_admin = 0;
        }
        $user->name = $request->name;
        $user->email = $request->email;
        $user->is_admin = $request->is_admin;

        $user->save();

        return redirect()->route('user')->with('alert', 'User updated succesfully!');
    }
    
    public function deletedbyadmin($id)
    {
        $user = User::find($id);
        $user->delete();

        return redirect()->back()->with('alert', 'User deleted succesfully!');
    }
	
	public function createdViewAdmin()
	{
		return view('users/create');   
		}
	public function createdbyAdmin(Request $request)
	{
		 $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
		$is_admin = 0;
		if($request->is_admin != null){
            $is_admin = 1;
        }else{
            $is_admin = 0;
        }
		
		$user = New User;
		$user->name = $request->name;
        $user->email = $request->email;
        $user->is_admin = $is_admin;
        $user->password = Hash::make($request->password);	
		$user->save();
		
		
		return redirect()->route('user')->with('alert', 'User created succesfully!');
		
	}
	
}
