<?php

namespace App\Http\Controllers;
use App\Service\HiraganaService;
use Illuminate\Http\Request;

class HiraganaController extends Controller
{
	private $hiraganaService;


	public function __construct(
		HiraganaService $HiraganaService
	){
		$this->hiraganaService = $HiraganaService;
	}

    public function index(){
    	$view = $this->hiraganaService->index();
    	return view($view);
    }
}
