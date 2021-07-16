<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class BannerController extends Controller
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

    public function banners()
    {      
        $banners =  DB::table('banners')->select('id','texto1','texto2','link','botao')->get();
        return view('banners/banners', compact('banners'));       
    }
	
	public function editedbyadmin($id)
    {
        $banner =  DB::table('banners')->select('id','texto1','texto2','link','botao')->where('id',$id)->first();
        return view('banners/editbanner', compact('banner','id'));
    }

    public function updatedbyadmin(Request $request)
    { 
        if($request->botao != null){
            $request->botao = "Sim";
        }else{
            $request->botao = "Nao";
        }

        DB::table('banners')->where('id',$request->id)->update([
			'texto1' => $request->texto1,
			'texto2' => $request->texto2,
			'botao' =>$request->botao,
			'link' =>$request->link,
		]);

        return redirect()->route('banners')->with('alert', 'Banner updated succesfully!');
    }
}