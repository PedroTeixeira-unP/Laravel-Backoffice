<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class HomeController extends Controller
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
    public function index()
    {       
        $banners =  DB::table('Banners')->select('id','texto1','texto2','link','botao')->get();
            return view('home', compact('banners'));    
    }
    public function users()
    {       
        return view('users');    
    }
}
