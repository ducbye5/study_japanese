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