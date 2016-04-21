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
        $trainer =  new Trainer;
	$trainer->first_name = $request->first_name;
	$trainer->last_name = $request->last_name;
	$trainer->description = $request->description;
	$trainer->avatar = $request->avatar->getClientOriginalNAme();
	$trainer->save();
	\File::makeDirectory('images/trainers/'.$trainer->id);
	$img = \Image::make($request->avatar)->save('images/trainers/'.$trainer->id.'/'.$request->avatar->getClientOriginalName());
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

	if($request->hasFile('avatar')) {
		\File::delete('images/trainers/'.$trainer->id.'/'.$trainer->avatar);
		$img = \Image::make($request->avatar)->save('images/trainers/'.$trainer->id.'/'.$request->avatar->getClientOriginalName());
		$trainer->avatar = $request->avatar->getClientOriginalNAme();
	}
	$trainer->first_name = $request->first_name;
        $trainer->last_name = $request->last_name;
        $trainer->description = $request->description;
	$trainer->save();

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $trainer = Trainer::find($request->id);
	$trainer->delete();
    }
}
