@extends('layouts.admin')

@section('title', 'My Fitness Lifestyle: Trainers')

@section('body')
        <div class="container">
                <div class="row">
                        <div class="col-lg-4">
                                <ul>
                                        <li><a href="{{route('admin-show-all-trainers')}}">Trainers</a></li>
                                        <li>Authors</li>
                                        <li>Articles</li>
                                        <li>Categories</li>
                                </ul>
                        </div>
			<div class="col-lg-8">
			<a href="{{route('admin-create-trainer')}}">Create</a>
	@foreach ($trainers as $trainer)
    		<div class="row">
			<div class="col-lg-3">
				<p>Trainer {{ $trainer->first_name }} {{$trainer->last_name}}</p>
				<img style="width:100%;" src="/images/trainers/{{$trainer->id}}/{{$trainer->avatar}}" />
			</div>
			<div class="col-lg-6">{{$trainer->description}}</div>
			<div class="col-lg-3">
				<a href="{{route('admin-edit-trainer', ['id'=>$trainer->id])}}" alt="Edit {{$trainer->first_name}} {{$trainer->last_name}}">Edit</a>
				<a href="{{route('admin-delete-trainer', ['id'=>$trainer->id])}}" alt="Delete {{$trainer->first_name}} {{$trainer->last_name}}">Delete</a>
			</div>
		</div>
	@endforeach
			</div>
		</div>
	</div>
@endsection
