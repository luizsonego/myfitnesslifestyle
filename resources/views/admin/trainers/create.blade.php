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
	{!! Form::open(['enctype'=>'multipart/form-data', 'name'=>'createTrainer','route' => 'admin-store-trainer','method'=>'post']) !!}
		<label for="firstName">First Name <span>{{$errors->first('first_name')}}</span></label>
		<input type="text" name="first_name" id="fistName" value="" placeholder="First Name" />
                <label for="lastName">Last Name <span>{{$errors->first('last_name')}}</span></label>
                <input type="text" name="last_name" id="lastName" value="" placeholder="Last Name" />
		<label for="email">Email <span>{{$errors->first('email')}}</span></label>
                <input type="email" name="email" id="email" value="" placeholder="Email Address" />
                <label for="password">Password <span>{{$errors->first('password')}}</span></label>
                <input type="password" name="password" id="password" value="" placeholder="Password" />
		<label for="avatar">Imaage <span>{{$errors->first('image')}}</span></label>
		<input type="file"  id="avatar" name="avatar"/>
		<label for="description">Summery <span>{{$errors->first('description')}}</span></label>
		<textarea name="description" id="description"></textarea>
		<input type="submit" value="Create" />
	{!! Form::close() !!}
			</div>
		</div>
	</div>

@endsection
