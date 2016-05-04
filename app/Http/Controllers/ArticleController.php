<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Category;
use App\Author;
use App\Article;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = array(
		'articles'=>Article::all()
	);
	return view('admin.articles.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
	$data = [];
	foreach(Category::all() as $category) {
		$data['categories'][$category->id] = $category->name;
	}

	foreach(Author::all() as $author) {
		$data['authors'][$author->id] = $author->first_name.' '.$author->last_name;
	}
        return view('admin.articles.create',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
	
	$this->validate($request, [
                'title' => 'required',
                'summary' => 'required',
                'content' => 'required',
                'category' => 'required',
                'author' => 'required',
                'images.*' => 'required|image'
        ]);

        if(isset($validator) && $validator->fails()) {
            return redirect('/admin/articles/create')->withErrors($validator)->withInput();
        } else {
		$article = new Article();
        	$article->title = $request->title;
		$article->summary = $request->summary;
		$article->content = $request->content;
		$article->category_id = $request->category;
		$article->author_id = $request->author;
		$article->save();

		\File::makeDirectory('images/articles/'.$article->id);
		$imageNames = [];
        	foreach($request->images as $img) {
			$name = $this->generateRandomString().'.'.pathinfo($img->getClientOriginalName(), PATHINFO_EXTENSION);
			\Image::make($img)->save('images/articles/'.$article->id.'/'.$name);
			$imageNames[] = $name;
        	}

		$article->update(['images'=>$imageNames]);
		return redirect('/admin/articles');
	}
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $data = array(
		'article' => Article::find($request->id),
	);

	return view('admin.article.preview',$data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $data = array(
		'article' => Article::find($request->id),
	);

	foreach(Category::all() as $category) {
                $data['categories'][$category->id] = $category->name;
        }

        foreach(Author::all() as $author) {
                $data['authors'][$author->id] = $author->first_name.' '.$author->last_name;
        }

	return view('admin.articles.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
	$this->validate($request, [
                'title' => 'required',
                'summary' => 'required',
                'content' => 'required',
                'category' => 'required',
                'author' => 'required',
        ]);

        if(isset($validator) && $validator->fails()) {
            return redirect('/admin/articles/edit',['id'=>$request->id])->withErrors($validator)->withInput();
        } else {
        	$article = Article::find($request->id);
        	$article->title = $request->title;
        	$article->summary = $request->summary;
        	$article->content = $request->content;
        	$article->category_id = $request->category;
		$article->author_id = $request->author;
        	$article->save();
		return redirect('admin/articles');
	}
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $article = Article::find($request->id);
	\File::deleteDirectory('images/articles/'.$article->id);
	$article->delete();
    }

    /**
     * Remove the specified image resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroyImage(Request $request)
    {
        $article = Article::find($request->id);
	$images = [];
	foreach($article->images as $img)
	{
		if($img != $request->img)
		{
			$images[] = $img;
		}
	}

	\File::delete('images/articles/'.$article->id.'/'.$request->img);
	$article->update(['images'=>$images]);

    }

    /**
     * Add the specified image resource to storage.
     *
     * @param  request object
     * @return \Illuminate\Http\Response
     */
    public function addImages(Request $request)
    {
        $article = Article::find($request->id);
        $images = [];
	$newImages = [];

	//create the new images
	foreach($request->images as $img) {
		$name = $this->generateRandomString().'.'.pathinfo($img->getClientOriginalName(), PATHINFO_EXTENSION);
                $img = \Image::make($img)->save('images/articles/'.$article->id.'/'.$name);
        	$newImages[] = $name;
	}

        foreach($article->images as $img)
        {
		$images[] =$img;
        }

        $article->update(['images'=>array_merge($images,$newImages)]);

    }

    /**
     * Change Status of Trainer
     *
     * @param int
     */
     public function changeStatus(Request $request)
     {
        $article = Article::find($request->id);
        $article->active = $request->active;
        $article->save();
     }


}
