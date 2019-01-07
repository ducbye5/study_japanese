<?php

namespace App\Repositories;
use App\Model\Hiragana;
use App\Repositories\Interfaces\HiraganasRepositoryInterface;

class HiraganasRepository implements HiraganasRepositoryInterface
{
	private $model;
	public function __construct(
		Hiragana $Hiragana
	){
		$this->model = $Hiragana;
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