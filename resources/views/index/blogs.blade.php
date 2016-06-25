@extends('layouts.main')

@section('title', 'My Fitness Lifestyle')

@section('body')
        @include('partials/navigation')
	
	<div class="container">
	</div>

	<div class="container">
		@foreach($articles as $article)
			<article class="row blog"> 
				<div class="col-lg-4">
					{{Html::image('images/articles/'.$article->id.'/'.$article->images[0],$article->title,[])}}	
				</div>
				<div class="col-lg-8">
					<h1>{!! $article->title  !!}</h1>
					<div class="date">{{date('Y-m-d', strtotime($article->created_at))}}</h1>
					<div class="summary">{!! $article->summary  !!} </div>
				</div>
			</article>
		@endforeach
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
