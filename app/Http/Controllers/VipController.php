<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class VipController extends Controller
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

    public function vips()
    {      
        $pacotevips =  DB::table('pacotevip')->select('id','Nome','Tipo','Valor','Novidade')->get();
        return view('vips/vips', compact('pacotevips'));       
    }
	
	public function editvips($id)
    {
		$pacotevips =  DB::table('pacotevip')->where('id',$id)->select('id','Nome','Tipo','Valor','Novidade')->first();
        $listavips =  DB::table('listapacotes')->where('pacote_id',$pacotevips->Nome)->select('id','pacote_id','oferta')->get();
        return view('vips/editvips', compact('listavips','pacotevips'));
    }
	public function update(Request $request)
	{
		
		if($request->oldname != $request->Nome)
		{
			DB::table('listapacotes')->where('pacote_id',$request->oldname)->update([
			'pacote_id' => $request->Nome,
			]);
		}
		
		if($request->Novidade != null){
            $request->Novidade = "1";
        }else{
            $request->Novidade = "0";
        }
		DB::table('pacotevip')->where('id',$request->id)->update([
			'Nome' => $request->Nome,
			'Tipo' => $request->Tipo,
			'Valor' => $request->Valor,
			'Novidade' => $request->Novidade,
		]);
		return back();
		
		
	}
	
	public function updatelista(Request $request)
	{
		DB::table('listapacotes')->insert([
			'pacote_id' => $request->pacote_id,
			'oferta' => $request->oferta,
		]);
		return back();
	}
	public function deletelista(Request $request)
	{
		
		DB::table('listapacotes')->where('id',$request->id)->delete();
		return back();
	}
	
	public function createdView()
	{
		return view('vips/create');  
	}
	public function created(Request $request)
	{
		if($request->Novidade != null){
            $request->Novidade = "1";
        }else{
            $request->Novidade = "0";
        }
		DB::table('pacotevip')->insert([
			'Nome' => $request->Nome,
			'Tipo' => $request->Tipo,
			'Valor' => $request->Valor,
			'Novidade' => $request->Novidade,
		]);
		
        return redirect()->route('vips')->with('alert', 'Package created succesfully!');
		
	}
	public function deleted($id)
	{
		$pacotevips =  DB::table('pacotevip')->where('id',$id)->select('Nome')->first();
		
		DB::table('pacotevip')->where('id',$id)->delete();
		DB::table('listapacotes')->where('pacote_id',$pacotevips->Nome)->delete();
		return back();
	}
}