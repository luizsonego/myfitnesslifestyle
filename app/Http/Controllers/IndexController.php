<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Trainer;
use App\Article;
use App\Achievement;

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

	/**
         * Trainers Page
         * @return \Illuminate\Http\Response
         */
	public function trainers() {
		$data = array(
			'trainers' => Trainer::all(),
		);
		
		return view('index.trainers',$data);
	}

	/**
         * Trainer Page
         * @return \Illuminate\Http\Response
         */
	public function trainer($slug) {
		
		$slug = explode('-',$slug);
		$trainer = Trainer::where(['first_name' => $slug[0], 'last_name' => $slug[1]])->first();
		$achievements = Achievement::where(['trainer_id' => $trainer->id])->get();

		$data = array(
			'trainer' => $trainer,
			'achievements' => $achievements
		);

		return view('index.trainer',$data);
	}
}
