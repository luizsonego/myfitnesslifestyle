@extends('layouts.admin')

@section('title', 'My Fitness Lifestyle: Create a new Category')

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
	{!! Form::open(['enctype'=>'multipart/form-data', 'name'=>'createCategory','route' => 'admin-store-category','method'=>'post']) !!}
		<!--<input type="hidden" name="_token" value="{{ csrf_token() }}">-->
		<label for="name">Name</label>
		<input name="name" type="text" placeHolder="Category Name" id="name" value="" />
		<label for="description">Summery</label>
		<textarea name="description" id="description"></textarea>
		<input type="submit" value="Create" />
	{!! Form::close() !!}
			</div>
		</div>
	</div>

@endsection
