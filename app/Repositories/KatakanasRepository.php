<?php

namespace App\Repositories;
use App\Model\Katakana;
use App\Repositories\Interfaces\KatakanasRepositoryInterface;

class KatakanasRepository implements KatakanasRepositoryInterface
{
	private $model;
	public function __construct(
		Katakana $Katakana
	){
		$this->model = $Katakana;
	}

	public function getList(array $column = ['*']){
		$query = $this->model->select($column);
		if($column == ['*']){
			$result = $query->paginate(1);
		}else{
			$result = $query->get();
		}
		return $result;
	}
}