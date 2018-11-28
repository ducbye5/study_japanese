<?php

namespace App\Repository;
use App\Model\Hiragana;
use App\Repository\Interface\HiraganasRepositoryInterface;

class HiraganaRepository implements HiraganasRepositoryInterface
{
	private $model;
	public function __construct(
		Hiragana $Hiragana
	){
		$this->model = $Hiragana;
	}

	public function getList(array $column = ['*']){
		$result = $this->model->select($column)->get();
		return $result;
	}
}