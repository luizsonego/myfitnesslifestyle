<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Achievement;
use App\Trainer;

class AchievementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = array(
                'achievements'=>Achievement::all(),
		'trainers'=>Trainer::all(),
        );
        return view('admin.achievements.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $trainers = [];
        foreach(Trainer::all() as $trainer) {
                $trainers[$trainer->id] = $trainer->first_name.' '.$trainer->last_name;
        }
        $data = array(
                'trainers' =>$trainers
        );
        return view('admin.achievements.create',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $achievement = new Achievement();
        $achievement->trainer_id = $request->trainer;
        $achievement->title = $request->title;
        $achievement->summary = $request->summary;
        $achievement->save();

        \File::makeDirectory('images/achievements/'.$achievement->id);
        $imageNames = [];
        foreach($request->images as $img) {
                $name = $this->generateRandomString().'.'.pathinfo($img->getClientOriginalName(), PATHINFO_EXTENSION);
                \Image::make($img)->save('images/achievements/'.$achievement->id.'/'.$name);
                $imageNames[] =$name;
        }

        $achievement->update(['images'=>$imageNames]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $trainers = [];
        foreach(Trainer::all() as $trainer) {
                $trainers[$trainer->id] = $trainer->first_name.' '.$trainer->last_name;
        }
        $data = array(
	        'trainers' => $trainers,
                'achievement' => Achievement::find($request->id),
        );

        return view('admin.achievements.edit',$data);
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
        $achievement = Achievement::find($request->id);
        $achievement->title = $request->title;
        $achievement->summary = $request->summary;
        $achievement->trainer_id = $request->trainer_id;
        $achievement->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $achievement = Achievement::find($request->id);
        \File::deleteDirectory('images/achievements/'.$achievement->id);
        $achievement->delete();
    }

    /**
     * Remove the specified image resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroyImage(Request $request)
    {
        $achievement = Achievement::find($request->id);
        $images = [];
        foreach($achievement->images as $img)
        {
                if($img != $request->img)
                {
                        $images[] = $img;
                }
        }

        \File::delete('images/achievements/'.$achievement->id.'/'.$request->img);
        $achievement->update(['images'=>$images]);

    }

    /**
     * Add the specified image resource to storage.
     *
     * @param  request object
     * @return \Illuminate\Http\Response
     */
    public function addImages(Request $request)
    {
        $achievement = Achievement::find($request->id);
        $images = [];
        $newImages = [];

        //create the new images
        foreach($request->images as $img) {
                $name = $this->generateRandomString().'.'.pathinfo($img->getClientOriginalName(), PATHINFO_EXTENSION);
                $img = \Image::make($img)->save('images/achievements/'.$achievement->id.'/'.$name);
                $newImages[] = $name;
        }

        foreach($achievement->images as $img)
        {
                $images[] =$img;
        }

        $achievement->update(['images'=>array_merge($images,$newImages)]);

    }
}
