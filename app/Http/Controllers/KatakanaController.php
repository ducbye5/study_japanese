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
        $view = $result['view'];
        $data = $result['data'];
    	return view($view,['data'=>$data]);
    }

    public function checkAnswer(Request $request){
    	$input = $request->all();
    	$result = $this->katakanaService->checkAnswer($input);
        $url = $input['nextPage'];
        if(!empty($url)){
            $url = str_replace('http://localhost/study_japanese/public/','',$url);
        }else{
            $url = 'katakana';
        }
        if($result){
            return redirect(url($url));
        }else{
            return redirect()->route('katakana_view');
        }
    }
}
