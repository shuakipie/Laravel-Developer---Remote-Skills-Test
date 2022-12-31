<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Http\Requests;
use Illuminate\Support\Facades\Validator;

class TestController extends Controller
{
    public function index(){
    	
    	$file_content = file_get_contents(url('data.json'));
    	$data= json_decode($file_content,true);
    	if(!is_array($data)){
			$data =array();
		}
		
		return view('test',array('data'=>$data,'total_qty'=>0,'total_price'=>0));
	}
	public function save(Request $request){
		$file_content = file_get_contents(url('data.json'));
		$data= json_decode($file_content,true);
		if(!is_array($data)){
			$data =array();
		}
		$data_post = $request->all();
		$validator = Validator::make($data_post,[
		'quantity'=>'required',
		'price'=>'required'
		
		]);
		if($validator->fails()){
			return redirect()->back()->withErrors(['error'=>$validator->erors()->first()]);
		}
		$data[]=$data_post;
		
		File::put(base_path('/public/data.json'), json_encode($data));
		return redirect('/');
	}
}
