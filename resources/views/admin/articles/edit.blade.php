@extends('layouts.admin')

@section('title', 'My Fitness Lifestyle: Update Article')

@section('body')
        <div class="container-fluid paddingSideNone">
                <div class="row">
                        <div class="col-lg-3">
                                @include('admin.partials.navigation')
                        </div>
                        <div class="col-lg-9">
                                <div class="adminHeader">My Fitness Lifestyle CMS</div>
                                <div class="adminTitle clearfix">
                                        <h1>Update an Article</h1>
                                </div>
                                {!! Form::open(['enctype'=>'multipart/form-data', 'name'=>'updateArticle','route' => 'admin-update-article','method'=>'post']) !!}
                                        {{ Form::hidden('id',$article->id,[])}}
					<div class="row marginBottom">
                                                <div class="col-lg-2">
                                                        <label for="category">Category</label>
                                                </div>
                                                <div class="col-lg-10">
                                                        {{ Form::select('category',$categories,$article->category_id,['placeholder'=>'Select a Category','id'=>'category']) }}
                                                         <span class="errors">{{$errors->first("category")}}</span>
                                                </div>
                                        </div>
					<div class="row marginBottom">
                                                <div class="col-lg-2">
                                                        <label for="author">Author</label>
                                                </div>
                                                <div class="col-lg-10">
                                                        {{ Form::select('author',$authors,$article->author->id,['placeholder'=>'Select an Author','id'=>'author']) }}
                                                         <span class="errors">{{$errors->first("author")}}</span>
                                                </div>
                                        </div>
                                        <div class="row marginBottom">
                                                <div class="col-lg-2">
                                                        <label for="title">Title</label>
                                                </div>
                                                <div class="col-lg-10">
                                                        {{ Form::text('title',$article->title,['id'=>'title','placeholder'=>'Title'])}}
                                                         <span class="errors">{{$errors->first("title")}}</span>
                                                </div>
                                        </div>
                                        <div class="row marginBottom">
                                                <div class="col-lg-2">
                                                        <label for="Summary">Summary</label>
                                                </div>
                                                <div class="col-lg-10">
                                                        {{ Form::textarea('summary',$article->summary,['id'=>'summary','placeholder'=>'Summary'])}}
                                                         <span class="errors">{{$errors->first("summary")}}</span>
                                                </div>
                                        </div>
					<div class="row marginBottom">
                                                <div class="col-lg-2">
                                                        <label for="Content">Content</label>
                                                </div>
                                                <div class="col-lg-10">
                                                        {{ Form::textarea('content',$article->content,['id'=>'content','placeholder'=>'Content'])}}
                                                         <span class="errors">{{$errors->first("content")}}</span>
                                                </div>
                                        </div>
					<div class="row marginBottom">
                                                <div class="col-lg-12">
                                                        <input type="submit" value="Create" />
                                                </div>
                                        </div>
				{!! Form::close() !!}
				{!! Form::open(['enctype'=>'multipart/form-data', 'name'=>'addArticleImages','route' => 'admin-add-article-images','method'=>'post']) !!}
					{{ Form::hidden('id',$article->id,[]) }}
						<div class="row marginBottom">
                                                	<div class="col-lg-2">
                                                        	<label for="images">Images</label>
                                                	</div>
                                                	<div class="col-lg-10">
                                                        	<input type="file" multiple="multiple" id="images" name="images[]"/>
                                                         	<span class="errors">{{$errors->first("images")}}</span>
                                                	</div>
                                        	</div>
						<div class="row marginBottom">
                                               		 <div class="col-lg-12">
                                                        	<input type="submit" value="Create" />
                                                	</div>
                                        	</div>
				{!! Form::close() !!}
				@foreach($article->images as $image)
                                	<div class="row">
                                        	<div class="col-lg-4">
                                                	<img style="width:100%;" src="/images/articles/{{$article->id}}/{{$image}}" />
                                        	</div>
                                        	<div class="col-lg-offset-4 col-lg-4">
							{{ Html::linkRoute('admin-delete-article-image','',['id'=>$article->id,'img'=>$image],['class'=>'adminActions glyphicon glyphicon-remove']) }}
                                        	</div>
                                	</div>
                        	@endforeach

                        </div>
                </div>
        </div>
<script>
        CKEDITOR.replace( 'summary' );
        CKEDITOR.add;

        CKEDITOR.replace( 'content' );
        CKEDITOR.add;
</script>
@endsection
