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
        $view = $result['view'];
        $data = $result['data'];
    	return view($view,['data'=>$data]);
    }

    public function checkAnswer(Request $request){
    	$input = $request->all();
    	$result = $this->vocabularyService->checkAnswer($input);
        $url = $input['nextPage'];
        if(!empty($url)){
            $url = str_replace('http://localhost/study_japanese/public/','',$url);
        }else{
            $url = 'vocabulary';
        }
    	if($result){
    		return redirect(url($url));
    	}else{
    		return redirect()->route('vocabulary_view');
    	}
    }
}
