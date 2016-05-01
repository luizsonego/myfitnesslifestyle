<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Trainer;

class TrainerController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
	$data = array(
		'trainers' => Trainer::all(),
        );
        return view('admin.trainers.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.trainers.create');
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
            return redirect('/admin/trainer/create')->withErrors($validator)->withInput();
        } else {

		$user = $this->createNewUser([
			'email' => $request->email,
            		'password' => bcrypt($request->password),
        	]);
		
		$avatarName = $this->generateRandomString().'.'.pathinfo($request->avatar->getClientOriginalNAme(), PATHINFO_EXTENSION);

        	$trainer = Trainer::create([
                	'first_name' => $request->first_name,
                	'last_name' => $request->last_name,
                	'description' => $request->description,
                	'avatar' => $avatarName,
                	'user_id'=> $user->id,
        	]);

	        \File::makeDirectory('images/trainers/'.$trainer->id);
       		$img = \Image::make($request->avatar)->save('images/trainers/'.$trainer->id.'/'.$avatarName);

		return redirect('/admin/trainers');
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
	$trainer = new Trainer();
	$data = array(
		'trainer'=> $trainer->find($id),
	);

        return view('admin.trainers.update',$data);
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
	 $trainer = Trainer::find($request->id);
	 $user = $trainer->user;
	 $this->validate($request, [
                 'first_name' => 'required',
                 'last_name' => 'required',
                 'email' => 'required|email|max:255|unique:users,email,'.$user->id,
                 'description' => 'required',
                 'avatar' => 'image'
	 ]);
  
	if(isset($validator) && $validator->fails()) {
              return redirect('/admin/trainer/edit',['id'=>$request->id])->withErrors($validator)->withInput();
        } else {
		$avatar = '';
		if($request->hasFile('avatar')) {
			$avatar = $this->generateRandomString().'.'.pathinfo($request->avatar->getClientOriginalNAme(), PATHINFO_EXTENSION);
                 	\File::delete('images/trainers/'.$trainer->id.'/'.$trainer->avatar);
                 	$img = \Image::make($request->avatar)->save('images/trainers/'.$trainer->id.'/'.$avatar);
         	} else {
			$avatar = $trainer->avatar;
		}  
		
		$user->update(['email' => $request->email]);
     
		$trainer->update([
			'first_name' => $request->first_name,
			'last_name' => $request->last_name,
			'description' => $request->description,
			'avatar' => $avatar
		]);
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
        $trainer = Trainer::find($request->id);
	$trainer->delete();
    }

    /**
     * Change Status of Trainer
     *
     * @param int
     */
     public function activate(Request $request)
     {
	$trainer = Trainer::find($request->id);
	$trainer->active = $request->active;
	$trainer->save();
     }


}
