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
			<a href="{{route('admin-create-article')}}">Create</a>
	@foreach ($articles as $article)
    		<div class="row">
			<div class="col-lg-9">
				<p>{{ $article->title}}</p>
			</div>
			<div class="col-lg-3">
				<a href="{{route('admin-edit-article', ['id'=>$article->id])}}" alt="Edit {{$article->title}}">Edit</a>
				<a href="{{route('admin-delete-article', ['id'=>$article->id])}}" alt="Delete {{$article->title}}">Delete</a>
			</div>
		</div>
	@endforeach
			</div>
		</div>
	</div>
@endsection
