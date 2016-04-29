@extends('layouts.admin')

@section('title', 'My Fitness Lifestyle: Create a new Achievement')

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
	{!! Form::open(['enctype'=>'multipart/form-data', 'name'=>'createAchievement','route' => 'admin-store-achievement','method'=>'post']) !!}
		<!--<input type="hidden" name="_token" value="{{ csrf_token() }}">-->
		<label for"category">Trainer</label>
		{!! Form::select('trainer_id',$trainers,null,['placeholder'=>'Select a Trainer','id'=>'trainer']) !!}
		<input type="hidden" name="author_id" value="1" />
		<label for="title">Title</label>
		<input type="text" name="title" id="title" value="" placeholder="Title of the Article" />
		<label for="summary">Summary</label>
		<textarea name="summary" id="summary"></textarea>
		<label for="images">Imaage</label>
		<input type="file" multiple="multiple" id="images" name="images[]"/>
		<input type="submit" value="Create" />
	{!! Form::close() !!}
			</div>
		</div>
	</div>

@endsection
