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
		$question_and_answer = $this->hiraganasRepository->getList();
		$question = $question_and_answer[0]->characters;
		$answer = $question_and_answer[0]->pronunciation;
		$list_pronunciation = $this->hiraganasRepository->getList(['pronunciation']);
		$list_pronunciation = $list_pronunciation->all();
		for($i =0 ;$i< count($list_pronunciation);$i++){
			if($list_pronunciation[$i]->pronunciation == $answer){
				unset($list_pronunciation[$i]);
				break;
			}
		}
		$list_select_result_false = array_rand($list_pronunciation,3);
		for($i=0;$i<count($list_select_result_false);$i++){
			$list_select_result[$i] = $list_pronunciation[$list_select_result_false[$i]]->pronunciation;
		}
		$list_select_result = array_merge($list_select_result,[$answer]);
		shuffle($list_select_result);
		$view = 'Hiragana';
		$next_page = $question_and_answer->nextPageUrl();
		if($next_page == ''){
			return $status='finish';
		}
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
		if($input['select_answer'] == $input['result']){
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