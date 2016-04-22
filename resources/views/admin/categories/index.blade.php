@extends('layouts.admin')

@section('title', 'My Fitness Lifestyle: Categories')

@section('body')
        <div class="container">
                <div class="row">
                        <div class="col-lg-4">
                                <ul>
                                        <li><a href="{{route('admin-show-all-trainers')}}">Trainers</a></li>
                                        <li>Authors</li>
                                        <li>Articles</li>
                                        <li><a href="{{route('admin-show-all-categories')}}">Categories</a></li>
                                </ul>
                        </div>
			<div class="col-lg-8">
			<a href="{{route('admin-create-category')}}">Create</a>
	@foreach ($categories as $category)
    		<div class="row">
			<div class="col-lg-3">
				<p>{{ $category->name }}</p>
			</div>
			<div class="col-lg-6">{{$category->description}}</div>
			<div class="col-lg-3">
				<a href="{{route('admin-edit-category', ['id'=>$category->id])}}" alt="Edit {{$category->name}}">Edit</a>
				<a href="{{route('admin-delete-category', ['id'=>$category->id])}}" alt="Delete {{$category->name}}">Delete</a>
			</div>
		</div>
	@endforeach
			</div>
		</div>
	</div>
@endsection
