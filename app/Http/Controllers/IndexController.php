<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Trainer;
use App\Article;
use App\Achievement;
use App\Category;

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
		$achievements = Achievement::where(['trainer_id' => $trainer->id])
						->orderBy('created_at','desc')
						->get()
						->groupBy(function($date) {
        						return \Carbon\Carbon::parse($date->created_at)->format('Y'); // grouping by years
    						});

		$data = array(
			'trainer' => $trainer,
			'achievements' => $achievements
		);

		return view('index.trainer',$data);
	}
	
	/**
         * Blogs Page
	 * @return \Illuminate\Http\Response
	 */
	public function blogs(Request $request)
	{

		if(isset($request->category) && !empty($request->category)) {
			$category = Category::where(['slug'=>$request->category])->find(1);
			$articles = Article::where(['category_id'=> $category->id])->paginate(1);
		} else {
			$articles = Article::paginate(2);
		}
		
		$data = array (
			'articles' => $articles,
		);

		foreach(Category::all() as $categories) {
                	$data['categories'][$categories->id] = $categories->name;
        	}	
		return view('index.blogs',$data);
	}
	
	/**
         * Blog Page
	 * @return \Illuminate\Http\Response
	 */
	public function blog(Request $request)
	{
		$article = [];
		if(isset($request->slug) && !empty($request->slug)) {
			$article = Article::where(['slug'=> $request->slug])->first();
		} 
		$data = array (
                        'article' => $article,
                );
		return view('index.blog',$data);
	}
}
