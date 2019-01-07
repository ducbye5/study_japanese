<?php

namespace App\Repositories\Interfaces;

interface HiraganasRepositoryInterface
{
	public function getList(array $column,$limit);
}