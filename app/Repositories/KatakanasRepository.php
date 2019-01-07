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

	public function getList(array $column = ['*'],$limit = ''){
		$query = $this->model->select($column);
		if($column == ['*']){
			$result = $query->paginate($limit);
		}else{
			$result = $query->get();
		}
		return $result;
	}
}