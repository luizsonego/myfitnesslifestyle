<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Trainer;
use App\Article;

class IndexController extends Controller
{
	/**
    	 * Home Page.
    	 * @return \Illuminate\Http\Response
    	 */
	public function index() {
		$data = array(
			'articles'=>Article::all(),
                	'trainers' => Trainer::all(),
        	);

		return view('index.index',$data); 
	}
}
