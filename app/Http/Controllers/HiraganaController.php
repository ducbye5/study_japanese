<?php

namespace App\Http\Controllers;
use App\Service\HiraganaService;
use Illuminate\Http\Request;

class HiraganaController extends Controller
{
	private $hiraganaService;


	public function __construct(
		HiraganaService $HiraganaService
	){
		$this->hiraganaService = $HiraganaService;
	}

    public function index(){
    	$result = $this->hiraganaService->index();
        $view = $result['view'];
        $data = $result['data'];
    	return view($view,['data'=>$data]);
    }

    public function checkAnswer(Request $request){
    	$input = $request->all();
    	$result = $this->hiraganaService->checkAnswer($input);
    	if($result){
    		$url = $input['nextPage'];
    		$url = str_replace('http://localhost/study_japanese/public/','',$url);
    		//\Session::flash('success','The answer is TRUE. Please click the NEXT button for the next question');
    		return redirect(url($url));
    	}else{
    		return redirect()->route('hiragana_view');
    	}
    }
}
