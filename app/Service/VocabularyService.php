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
		//$this->insert_Data_Vocabulary();
		$question_and_answer = $this->vocabulariesRepository->getList();
		$question = $question_and_answer[0]->characters;
		$answer = $question_and_answer[0]->mean;
		$list_mean = $this->vocabulariesRepository->getList(['mean']);
		$list_mean = $list_mean->all();
		for($i =0 ;$i< count($list_mean);$i++){
			if($list_mean[$i]->mean == $answer){
				unset($list_mean[$i]);
				break;
			}
		}
		$list_select_result_false = array_rand($list_mean,3);
		for($i=0;$i<count($list_select_result_false);$i++){
			$list_select_result[$i] = $list_mean[$list_select_result_false[$i]]->mean;
		}
		$list_select_result = array_merge($list_select_result,[$answer]);
		shuffle($list_select_result);
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
		if($input['select_answer'] == $input['result']){
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