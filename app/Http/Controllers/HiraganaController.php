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
    	$view = $this->hiraganaService->index();
    	return view($view);
    }

    public function checkAnswer(Request $request){
    	$input = $request->all();
    	$result = $this->hiraganaService->checkAnswer($input);
    	if($result){
    		\Session::flash('success','The answer is TRUE. Please click the NEXT button for the next question');
    	}else{
    		\Session::flash('false','The answer is WRONG. Please click on the RESTART button to start another question');
    	}
    	return redirect()->back();
    }
}
