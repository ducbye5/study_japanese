<?php

namespace App\Http\Controllers;
use App\Service\KatakanaService;
use Illuminate\Http\Request;

class KatakanaController extends Controller
{
	private $katakanaService;


	public function __construct(
		KatakanaService $KatakanaService
	){
		$this->katakanaService = $KatakanaService;
	}

    public function index(){
    	$result = $this->katakanaService->index();
        if($result == 'finish'){
            return redirect()->route('katakana_view');
        }else{    
            $view = $result['view'];
            $data = $result['data'];
    	   return view($view,['data'=>$data]);
        }
    }

    public function checkAnswer(Request $request){
    	$input = $request->all();
    	$result = $this->katakanaService->checkAnswer($input);
    	if($result){
    		$url = $input['nextPage'];
    		$url = str_replace('http://localhost/study_japanese/public/','',$url);
    		return redirect(url($url));
    	}else{
    		return redirect()->route('katakana_view');
    	}
    }
}
