<?php

namespace App\Service;

use App\Repository\Interface\HiraganasRepositoryInterface;

class HiraganaService
{
	private $hiraganasRepository;
	public function __construct(
		//HiraganasRepositoryInterface $HiraganasRepository
	){
		//$this->hiraganasRepository = $HiraganasRepository;
	}

	public function index(){
		//$list_charactors = $this->hiraganasRepository->getList();
		//dd($list_charactors);
		$view = 'Hiragana';
		return $view;
	}

	public function checkAnswer($input){
		if($input['select_answer'] == $input['result']){
			$status = true;
		}else{
			$status = false;
		}
		return $status;
	}
}