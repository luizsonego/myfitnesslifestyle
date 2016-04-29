@extends('layouts.admin')

@section('title', 'My Fitness Lifestyle: Achievements')

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
			<a href="{{route('admin-create-achievement')}}">Create</a>
	@foreach ($achievements as $achievement)
    		<div class="row">
			<div class="col-lg-9">
				<p>{{ $achievement->title}}</p>
			</div>
			<div class="col-lg-3">
				<a href="{{route('admin-edit-achievement', ['id'=>$achievement->id])}}" alt="Edit {{$achievement->title}}">Edit</a>
				<a href="{{route('admin-delete-achievement', ['id'=>$achievement->id])}}" alt="Delete {{$achievement->title}}">Delete</a>
			</div>
		</div>
	@endforeach
			</div>
		</div>
	</div>
@endsection
