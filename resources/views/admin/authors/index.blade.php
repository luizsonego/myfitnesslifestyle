@extends('layouts.admin')

@section('title', 'My Fitness Lifestyle: Authors')

@section('body')
        <div class="container">
                <div class="row">
                        <div class="col-lg-4">
                                <ul>
                                        <li><a href="{{route('admin-show-all-trainers')}}">Trainers</a></li>
                                        <li><a href="{{route('admin-show-all-authors')}}">Authors</a></li>
                                        <li>Articles</li>
                                        <li><a href="{{route('admin-show-all-categories')}}">Categories</a></li>
                                </ul>
                        </div>
			<div class="col-lg-8">
			<a href="{{route('admin-create-author')}}">Create</a>
	@foreach ($authors as $author)
    		<div class="row">
			<div class="col-lg-3">
				<p>Author {{ $author->first_name }} {{$author->last_name}}</p>
				<img style="width:100%;" src="/images/authors/{{$author->id}}/{{$author->avatar}}" />
			</div>
			<div class="col-lg-6">{{$author->description}}</div>
			<div class="col-lg-3">
				<a href="{{route('admin-edit-author', ['id'=>$author->id])}}" alt="Edit {{$author->first_name}} {{$author->last_name}}">Edit</a>
				<a href="{{route('admin-delete-author', ['id'=>$author->id])}}" alt="Delete {{$author->first_name}} {{$author->last_name}}">Delete</a>
			</div>
		</div>
	@endforeach
			</div>
		</div>
	</div>
@endsection
