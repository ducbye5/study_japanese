<?php

namespace App\Repositories\Interfaces;

interface VocabulariesRepositoryInterface
{
	public function getList(array $column = ['*']);
}