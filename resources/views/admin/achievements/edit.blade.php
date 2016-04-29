@extends('layouts.admin')

@section('title', 'My Fitness Lifestyle: Edit an Achievement')

@section('body')
        <div class="container">
                <div class="row">
                        <div class="col-lg-4">
                                <ul>
                                        <li>Trainers</li>
                                        <li>Authors</li>
                                        <li>Articles</li>
                                        <li>Categories</li>
                                </ul>
                        </div>
                        <div class="col-lg-8">
				{!! Form::open(['enctype'=>'multipart/form-data', 'name'=>'editAchievement','route' => 'admin-update-achievement','method'=>'post']) !!}
                			<label for"trainer">Trainer</label>
                			{!! Form::select('trainer_id',$trainers,$achievement->trainer_id,['placeholder'=>'Select a Trainer','id'=>'trainer']) !!}
                			<input type="hidden" name="id" value="{{$achievement->id}}" />
                			<label for="title">Title</label>
                			<input type="text" name="title" id="title" value="{{$achievement->title}}" placeholder="Title of the Achievement" />
                			<label for="summary">Summary</label>
                			<textarea name="summary" id="summary">{{$achievement->summary}}</textarea>
                			<input type="submit" value="Update" />
        			{!! Form::close() !!}
			</div>
		</div>
		<div class="row">
			{!! Form::open(['enctype'=>'multipart/form-data', 'name'=>'addAchievementImages','route' => 'admin-add-achievement-images','method'=>'post']) !!}
				<input type="hidden" name="id" value="{{$achievement->id}}" />
				<label for="images">Image</label>
                                <input type="file" multiple="multiple" id="images" name="images[]"/>
				<input type="submit" value="Create" />
			{!! Form::close() !!}
		</div>
			@foreach($achievement->images as $image)
				<div class="row">
					<div class="col-lg-4">
						<img style="width:100%;" src="/images/achievements/{{$achievement->id}}/{{$image}}" />
					</div>
					<div class="col-lg-offset-4 col-lg-4">
						<a href="{{route('admin-delete-achievement-image',['id'=>$achievement->id,'name'=>$image])}}">Delete</a>
					</div>
				</div>
			@endforeach
	</div>
@endsection
