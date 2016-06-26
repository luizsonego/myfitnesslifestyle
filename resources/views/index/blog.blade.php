@extends('layouts.main')

@section('title', 'My Fitness Lifestyle')

@section('body')
        @include('partials/navigation')
		<div class="container">
			<article class="individual row">
				<div class="col-lg-12 clearfix">	
					<div class="content">
						<div class="slider">
                                                	<ul class="bxslider">
                                                        	@foreach($article->images as $img)
                                                                	<li><img  src="/images/articles/{{$article->id}}/{{$img}}" /></li>
                                                        	@endforeach
                                                	</ul>
                                        	</div>
						<h1>{{$article->title}}</h1>
                                        	<div class="date">{{date('Y-m-d',strtotime($article->created_at))}}</div>
						{!! $article->content !!}
					</div>
				</div>
			</article>
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

