<?php

namespace App\Service;

use App\Repositories\Interfaces\VocabulariesRepositoryInterface;
use App\Repositories\VocabulariesRepository;
use DB;

class VocabularyService
{
	private $vocabulariesRepository;
	public function __construct(
		VocabulariesRepositoryInterface $VocabulariesRepository
	){
		$this->vocabulariesRepository = $VocabulariesRepository;
	}

	public function index(){
		// $this->insert_Data_Vocabulary();
		$question_and_answer = $this->vocabulariesRepository->getList(['*'], 15);
		for($i = 0 ;$i < count($question_and_answer); $i++){
			$question[$i] = $question_and_answer[$i]->characters;
			$answer[$i] = $question_and_answer[$i]->mean;
			$list_mean = $this->vocabulariesRepository->getList(['mean']);
			$list_mean = $list_mean->all();
			for($j =0 ;$j< count($list_mean);$j++){
				if($list_mean[$j]->mean == $answer[$i]){
					unset($list_mean[$j]);
					break;
				}
			}
			$list_select_result_false = array_rand($list_mean,3);
			for($y=0;$y<count($list_select_result_false);$y++){
				$list_select_result[$i][$y] = $list_mean[$list_select_result_false[$y]]->mean;
			}
			$list_select_result[$i] = array_merge($list_select_result[$i],[$answer[$i]]);
			shuffle($list_select_result[$i]);
		}
		$view = 'Vocabulary';
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

	private function insert_Data_Vocabulary(){
		$data = config('data_vocabulary');
		shuffle($data);
		DB::table('vocabularies')->truncate();
		for($i = 0 ; $i < count($data); $i++){
			DB::table('vocabularies')->insert($data[$i]);
		}
	}
}