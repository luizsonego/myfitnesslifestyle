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
				{!! Form::open(['enctype'=>'multipart/form-data', 'name'=>'editArticle','route' => 'admin-store-article','method'=>'post']) !!}
                			<label for"category">Category</label>
                			{!! Form::select('category_id',$categories,$article->category_id,['placeholder'=>'Select a Category','id'=>'category']) !!}
                			<input type="hidden" name="id" value="{{$article->id}}" />
					<input type="hidden" name="author_id" value="{{$article->author_id}}" />
                			<label for="title">Title</label>
                			<input type="text" name="title" id="title" value="{{$article->title}}" placeholder="Title of the Article" />
                			<label for="summary">Summary</label>
                			<textarea name="summary" id="summary">{{$article->summary}}</textarea>
                			<label for="images">Image</label>
                			<input type="file" multiple="multiple" id="images" name="images[]"/>
                			<label for="content"">Content</label>
                			<textarea name="content" id="content">{{$article->content}}</textarea>
                			<input type="submit" value="Create" />
        			{!! Form::close() !!}
			</div>
		</div>
		<div class="row">
			{!! Form::open(['enctype'=>'multipart/form-data', 'name'=>'addArticleImages','route' => 'admin-add-article-images','method'=>'post']) !!}
				<input type="hidden" name="id" value="{{$article->id}}" />
				<label for="images">Image</label>
                                <input type="file" multiple="multiple" id="images" name="images[]"/>
				<input type="submit" value="Create" />
			{!! Form::close() !!}
		</div>
			@foreach($article->images as $image)
				<div class="row">
					<div class="col-lg-4">
						<img style="width:100%;" src="/images/articles/{{$article->id}}/{{$image}}" />
					</div>
					<div class="col-lg-offset-4 col-lg-4">
						<a href="{{route('admin-delete-article-image',['id'=>$article->id,'name'=>$image])}}">Delete</a>
					</div>
				</div>
			@endforeach
	</div>
@endsection
