<?php

namespace App\Repositories;
use App\Model\Vocabulary;
use App\Repositories\Interfaces\VocabulariesRepositoryInterface;

class VocabulariesRepository implements VocabulariesRepositoryInterface
{
	private $model;
	public function __construct(
		Vocabulary $Vocabulary
	){
		$this->model = $Vocabulary;
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