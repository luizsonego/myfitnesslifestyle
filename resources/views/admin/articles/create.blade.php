@extends('layouts.admin')

@section('title', 'My Fitness Lifestyle: Create a new Trainer')

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
	{!! Form::open(['enctype'=>'multipart/form-data', 'name'=>'createArticle','route' => 'admin-store-article','method'=>'post']) !!}
		<!--<input type="hidden" name="_token" value="{{ csrf_token() }}">-->
		<label for"category">Category</label>
		{!! Form::select('category_id',$categories,null,['placeholder'=>'Select a Category','id'=>'category']) !!}
		<input type="hidden" name="author_id" value="1" />
		<label for="title">Title</label>
		<input type="text" name="title" id="title" value="" placeholder="Title of the Article" />
		<label for="summary">Summary</label>
		<textarea name="summary" id="summary"></textarea>
		<label for="images">Imaage</label>
		<input type="file" multiple="multiple" id="images" name="images[]"/>
		<label for="content"">Content</label>
		<textarea name="content" id="content"></textarea>
		<input type="submit" value="Create" />
	{!! Form::close() !!}
			</div>
		</div>
	</div>

@endsection
