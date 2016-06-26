@extends('layouts.main')

@section('title', 'My Fitness Lifestyle')

@section('body')
        @include('partials/navigation')
	
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<h2 class="blogsTitle">Read our Blog</h2>
				<p class="blogsTitleDescription">We need to write something here, please think of something nice</p>
			</div>
		</div>

		<div class="row">
			<div class="col-lg-12">
				{!! Form::open(['enctype'=>'multipart/form-data', 'name'=>'searchArticles','route' => 'blogs-page','method'=>'post']) !!}
					{!! Form::select('category',$categories,null,['placeholder'=>'Select a Category','id'=>'category']) !!}
                                	<span class="errors">{{$errors->first("category")}}</span>	
				{!! Form::close() !!}
			</div>
		</div>
	</div>

	<div class="container">
		@foreach($articles as $article)
			<article class="row">
				<div class="blog"> 
					<div class="col-lg-4">
						{{Html::image('images/articles/'.$article->id.'/'.$article->images[0],$article->title,[])}}	
					</div>
					<div class="col-lg-8">
						<h1>{!! $article->title  !!}</h1>
						<div class="date">{{date('Y-m-d', strtotime($article->created_at))}}</h1>
						<div class="summary">{!! $article->summary  !!} </div>
						{{ Html::linkRoute('blog-page','Read More',['slug'=>$article->slug],['class'=>'adminActions']) }}
					</div>
				</div>
			</article>
		@endforeach
	</div>
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				{!! $articles->render()  !!}
			</div>
		</div>
	</div>
        @include('partials/footer');
@endsection

@section('js')
        <script type="text/javascript">
                @include('partials/commonjs')

                $(document).ready(function(){
                        $('.bxslider').bxSlider({
                                pager: false,
                                auto: true,
                                captions: false,
                        }); 
                        initialize();
                });
        </script>
@endsection
