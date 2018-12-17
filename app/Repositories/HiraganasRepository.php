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