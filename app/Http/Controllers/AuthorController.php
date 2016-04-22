<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Author;

class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = array(
                'authors' => Author::all(),
        );
        return view('admin.authors.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.authors.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $author =  new Author;
        $author->first_name = $request->first_name;
        $author->last_name = $request->last_name;
        $author->description = $request->description;
        $author->avatar = $request->avatar->getClientOriginalNAme();
        $author->save();
        \File::makeDirectory('images/authors/'.$author->id);
        $img = \Image::make($request->avatar)->save('images/authors/'.$author->id.'/'.$request->avatar->getClientOriginalName());
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $author = new Author();
        $data = array(
                'author'=> $author->find($id),
        );

        return view('admin.authors.update',$data);
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
        $author = Author::find($request->id);

        if($request->hasFile('avatar')) {
                \File::delete('images/authors/'.$author->id.'/'.$author->avatar);
                $img = \Image::make($request->avatar)->save('images/authors/'.$author->id.'/'.$request->avatar->getClientOriginalName());
                $author->avatar = $request->avatar->getClientOriginalNAme();
        }
        $author->first_name = $request->first_name;
        $author->last_name = $request->last_name;
        $author->description = $request->description;
        $author->save();

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $author = Author::find($request->id);
        $author->delete();
    }

}
