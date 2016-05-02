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
	$this->validate($request, [
                'first_name' => 'required',
                'last_name' => 'required',
                'email' => 'required|email|max:255|unique:users',
                'password' => 'required|min:6',
                'description' => 'required',
                'avatar' => 'required|image'
        ]);

        if(isset($validator) && $validator->fails()) {
            return redirect('/admin/author/create')->withErrors($validator)->withInput();
        } else {
		$user = $this->createNewUser([
                        'email' => $request->email,
                        'password' => bcrypt($request->password),
                ]);

                $avatarName = $this->generateRandomString().'.'.pathinfo($request->avatar->getClientOriginalNAme(), PATHINFO_EXTENSION);

                $author = Author::create([
                        'first_name' => $request->first_name,
                        'last_name' => $request->last_name,
                        'description' => $request->description,
                        'avatar' => $avatarName,
                        'user_id'=> $user->id,
                ]);

                \File::makeDirectory('images/authors/'.$author->id);
                $img = \Image::make($request->avatar)->save('images/authors/'.$author->id.'/'.$avatarName);
                return redirect('/admin/authors');
    	}
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
	$user = $author->user;
	$this->validate($request, [
                 'first_name' => 'required',
                 'last_name' => 'required',
                 'email' => 'required|email|max:255|unique:users,email,'.$user->id,
                 'description' => 'required',
                 'avatar' => 'image'
         ]);

	if(isset($validator) && $validator->fails()) {
              return redirect('/admin/author/edit',['id'=>$request->id])->withErrors($validator)->withInput();
        } else {
                $avatar = '';
                if($request->hasFile('avatar')) {
                        $avatar = $this->generateRandomString().'.'.pathinfo($request->avatar->getClientOriginalNAme(), PATHINFO_EXTENSION);
                        \File::delete('images/authors/'.$author->id.'/'.$trainer->avatar);
                        $img = \Image::make($request->avatar)->save('images/authors/'.$author->id.'/'.$avatar);
                } else {
                        $avatar = $author->avatar;
                }

                $user->update(['email' => $request->email]);

                $author->update([
                        'first_name' => $request->first_name,
                        'last_name' => $request->last_name,
                        'description' => $request->description,
                        'avatar' => $avatar
                ]);

                return redirect('admin/authors');
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
        $author = Author::find($request->id);
        $author->delete();
    }


    /**
     * Change Status of Author
     *
     * @param int
     */
     public function changeStatus(Request $request)
     {
        $author = Author::find($request->id);
        $author->active = $request->active;
        $author->save();
     }
}
