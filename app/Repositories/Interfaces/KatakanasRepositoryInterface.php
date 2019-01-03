<?php

namespace App\Repositories\Interfaces;

interface KatakanasRepositoryInterface
{
	public function getList(array $column = ['*']);
}