@extends('layouts.main')

@section('title', 'My Fitness Lifestyle')

@section('body')
	<header class="container">
		<div class="row">
                        	<div class="col-lg-4">
                                		<a href="/">
                                        		<img src="/images/mfl-logo.png" alt="logo" />
                                		</a>
						<h1><span> MY</span> <span>fitness</span> <span>lifestyle</span></h1>
					</div>
                        	<div class="col-lg-offset-1 col-lg-7">
                                	<nav class="clearfix">
                                        	<ul>
                                                	<li><a href="">Home</a></li>
                                                	<li><a href="">Trainer</a></li>
                                                	<li><a href="">Personal Training Studio</a></li>
                                                	<li><a href="">Blog</a></li>    
                                                	<li>|</li>
                                                	<li><a href="">F</a></li>
                                                	<li><a href="">2346690</a></li>
                                        	</ul>
                                	</nav>
                        	</div>
                </div>
	</header>
        <div class="container-fluid">
                <div class="row">
			<div class="col-lg-12 removePadding">
				<div class="slider">
					<img src="/images/slider/TAUxxt1kzT.jpg" alt="Image 1" />
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
                                                	<a href="/trainer/{{$trainer->first_name.'-'.$trainer->last_name}}">Read More</a>
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
				</div>
			</div>
		</div>
	
		<div class="row">
			<h5 class="homeBlog">Recent Blog</h5>
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
		
		<div class="row">
			<div class="col-lg-12">
				<div class="homeNutrition">
					<img src="/images/nutrition/QzEVhwD8Ff.jpg" />
				</div>
			</div>
		</div>

		<footer>
			<div class="row">
				<div class="col-lg-3">
					<div class="contact">
						<h4>Contact Us</h4>
						<p>
							<a>09023848</a>
							<a>email@email.com</a>
						</p>
						<p>
							Gym Timings <br />
							Monday-Sunday <br />
							9:00 AM - 10:00 PM
						</p>
						<p>
							Gym Address <br />
							104 Nant Road, ZX12 456
						</p>
					</div>
				</div>
				<div class="col-lg-4">
					<div class="location">
						<h4>Gym Location</h4>
						<div class="map">
						</div>
					</div>
				</div>
				<div class="col-lg-5">
				</div>
			</div>
			
		</footer>
	</div>
@endsection
