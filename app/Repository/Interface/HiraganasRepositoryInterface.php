<?php

namespace App\Repository\Interface;

interface HiraganasRepositoryInterface
{
	public function getList(array $column = ['*']);
}