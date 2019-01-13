<?php

namespace App\Http\Controllers;
use App\Service\VocabularyService;
use Illuminate\Http\Request;

class VocabularyController extends Controller
{
	private $vocabularyService;


	public function __construct(
		VocabularyService $VocabularyService
	){
		$this->vocabularyService = $VocabularyService;
	}

    public function index(){
    	$result = $this->vocabularyService->index();
        if($result == 'finish'){
            return redirect()->route('vocabulary_view');
        }else{
            $view = $result['view'];
            $data = $result['data'];
    	   return view($view,['data'=>$data]);
        }
    }

    public function checkAnswer(Request $request){
    	$input = $request->all();
    	$result = $this->vocabularyService->checkAnswer($input);
        $url = $input['nextPage'];
        $url = str_replace('http://localhost/study_japanese/public/','',$url);
    	if($result){
    		return redirect(url($url));
    	}else{
            return redirect(url($url));
    		return redirect()->route('vocabulary_view');
    	}
    }
}
