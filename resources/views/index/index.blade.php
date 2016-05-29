@extends('layouts.main')

@section('title', 'My Fitness Lifestyle')

@section('body')
        <div class="container-fluid">
		<div class="row">
			<div class="col-lg-4">
			</div>
			<div class="col-lg-offset-1 col-lg-7">
				<nav>
					<ul>
						<li><a>Home</a></li>
						<li><a>Trainer</a></li>
						<li><a>Personal Training Studio</a></li>
						<li><a>Blog</a></li>	
						<li>|</li>
						<li>F</li>
						<li>2346690 </li>
					</ul>
				</nav>
			</div>
		</div>
                <div class="row">
			<div class="col-lg-12">
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
					<div class="trainer">
					</div>
				</div>
			</div>
			<div class="col-lg-8">
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
	
		<div class="row">
			@foreach ($articles as $article)
				<div class="col-lg-3">
					<a href="/article/{{$article->title}}/$article->id}}">
						<h3>{{ $article->title }}</h3>
						<p>{!!$article->summary  !!}</p>
						<img style="display:block;width:100%;" src="/images/articles/{{$article->id}}/{{$article->images[0]}}">
					</a>
                                </div>
			@endforeach

		</div>
		
		<div class="row">
			<div class="nutrition">
				<img src="/images/nutrition/QzEVhwD8Ff.jpg" />
			</div>
		</div>
	</div>
@endsection
