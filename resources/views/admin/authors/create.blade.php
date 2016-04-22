@extends('layouts.admin')

@section('title', 'My Fitness Lifestyle: Create a new Author')

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
	{!! Form::open(['enctype'=>'multipart/form-data', 'name'=>'createAuthor','route' => 'admin-store-author','method'=>'post']) !!}
		<!--<input type="hidden" name="_token" value="{{ csrf_token() }}">-->
		<label for="firstName">First Name</label>
		<input type="text" name="first_name" id="fistName" value="" placeholder="First Name" />
		<label for="lastName">Last Name</label>
		<input type="text" name="last_name" id="lastName" value="" placeholder="Last Name" />
		<label for="avatar">Imaage</label>
		<input type="file"  id="avatar" name="avatar"/>
		<label for="description">Summery</label>
		<textarea name="description" id="description"></textarea>
		<input type="submit" value="Create" />
	{!! Form::close() !!}
			</div>
		</div>
	</div>

@endsection
