<?php

namespace App\Service;

use App\Repositories\Interfaces\HiraganasRepositoryInterface;
use App\Repositories\HiraganasRepository;
use DB;

class HiraganaService
{
	private $hiraganasRepository;
	public function __construct(
		HiraganasRepositoryInterface $HiraganasRepository
	){
		$this->hiraganasRepository = $HiraganasRepository;
	}

	public function index(){
		//$this->insert_Data_Hiragana();
		$question_and_answer = $this->hiraganasRepository->getList(['*'],10);
		for($i = 0 ;$i < count($question_and_answer); $i++){
			$question[$i] = $question_and_answer[$i]->characters;
			$answer[$i] = $question_and_answer[$i]->pronunciation;
			$list_pronunciation = $this->hiraganasRepository->getList(['pronunciation']);
			$list_pronunciation = $list_pronunciation->all();
			for($j =0 ;$j< count($list_pronunciation);$j++){
				if($list_pronunciation[$j]->pronunciation == $answer[$i]){
					unset($list_pronunciation[$j]);
					break;
				}
			}
			$list_select_result_false = array_rand($list_pronunciation,3);
			for($y=0;$y<count($list_select_result_false);$y++){
				$list_select_result[$i][$y] = $list_pronunciation[$list_select_result_false[$y]]->pronunciation;
			}
			$list_select_result[$i] = array_merge($list_select_result[$i],[$answer[$i]]);
			shuffle($list_select_result[$i]);
		}
		$view = 'Hiragana';
		$next_page = $question_and_answer->nextPageUrl();
		$result = [
			'view' => $view,
			'data' => [
				'question' => $question_and_answer,
				'answer' => $answer,
				'select' => $list_select_result,
				'next_page' => $next_page
			]
		];
		return $result;
	}

	public function checkAnswer($input){
		if(!empty($input['data']['select']) && ($input['data']['select'] == $input['data']['anwser'])){
			$status = true;
		}else{
			$status = false;
		}
		return $status;
	}

	private function insert_Data_Hiragana(){
		$data = config('data.Hiragana');
		shuffle($data);
		DB::table('hiraganas')->truncate();
		for($i = 0 ; $i < count($data); $i++){
			DB::table('hiraganas')->insert($data[$i]);
		}
	}
}