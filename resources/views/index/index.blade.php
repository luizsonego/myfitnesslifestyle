@extends('layouts.main')

@section('title', 'My Fitness Lifestyle')

@section('body')
	@include('partials/navigation')
	
        <div class="container-fluid">
                <div class="row">
			<div class="col-lg-12 removePadding">
				<div class="slider">
					<ul class="bxslider">
						<li><img title="Stay Healthy and Fit" src="/images/slider/slider1.jpg" /></li>
  						<li><img title="Stay Healthy and Fit" src="/images/slider/slider1.jpg" /></li>
  						<li><img title="Stay Healthy and Fit" src="/images/slider/slider1.jpg" /></li>
  						<li><img title="Stay Healthy and Fit" src="/images/slider/slider1.jpg" /></li>
					</ul>
					<div class="caption">
						<h1><span class="stay">Stay</span> <span class="health">Healthy</span> <span class="and">and</span> <span class="fit">Fit<span></h1>
						<h2>Your Body is a Reflection of your Lifestyle!</h2>
					</div>
				</div>
			</div>
             	</div>
        </div>
	<div class="container">

		<div class="row">
			<div class="col-lg-4">
				<div class="trainers">
					<h1>Our Trainers</h1>
					<p>Checkout our Trainers we need to work on the text a bit</p>
					@foreach ($trainers as $trainer)
                                		<div class="trainer clearfix">
                                        		<img  src="/images/trainers/{{$trainer->id}}/{{$trainer->avatar}}"  />
                                                	<h3>{{ $trainer->first_name}} {{$trainer->last_name}}</h3>
                                                	<a href="/trainer/{{$trainer->first_name.'-'.$trainer->last_name}}">See More</a>
                                        	</div>
                        		@endforeach
				</div>
			</div>
			<div class="col-lg-8">
				<div class="about">
				<h2>ABOUT MY FITNESS LIFE STYle</h2>
				<p>
					Consulted he eagerness unfeeling deficient existence of. 
					Calling nothing end fertile for venture way boy. Esteem spirit temper 
					too say adieus who direct esteem. It esteems luckily mr or picture 
					placing drawing no. Apartments frequently or motionless on reasonable 
					projecting expression. Way mrs end gave tall walk fact bed. 
				</p>
				<p>
                                        Consulted he eagerness unfeeling deficient existence of.
                                        Calling nothing end fertile for venture way boy. Esteem spirit temper 
                                        too say adieus who direct esteem. It esteems luckily mr or picture 
                                        placing drawing no. Apartments frequently or motionless on reasonable 
                                        projecting expression. Way mrs end gave tall walk fact bed. 
                                </p>
				<p>
                                        Consulted he eagerness unfeeling deficient existence of.
                                        Calling nothing end fertile for venture way boy. Esteem spirit temper
                                        too say adieus who direct esteem. It esteems luckily mr or picture
                                        placing drawing no. Apartments frequently or motionless on reasonable
                                        projecting expression. Way mrs end gave tall walk fact bed.
                                </p>
				</div>
			</div>
		</div>
	
		<div class="row">
			<div class="homeBlog clearfix">
				<h5>Recent Blog</h5>
				@foreach ($articles as $article)
					<article>
						<img class="col-lg-2" src="/images/articles/{{$article->id}}/{{$article->images[0]}}"  />
						<div class="col-lg-2">
							<h3>{{ $article->title }}</h3>
							<p>{{date('d-m-Y',strtotime($article->created_at))}}</p>
							<a href="/article/{{$article->title}}/$article->id}}">Read More</a>
						</div>
					</article>
				@endforeach
			</div>
		</div>
		
		<div class="row">
			<div class="col-lg-12">
				<div class="homeNutrition">
					<div class="caption">
						<h4>its not a short term diet</h4>
						<h5>its a long term life change</h5>
					</div>
					<h6>
						Something something something something 
						something something is ksdjfh iioisgkl
					</h6>
					<img src="/images/nutrition/QzEVhwD8Ff.jpg" />
				</div>
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
