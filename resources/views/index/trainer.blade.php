@extends('layouts.main')

@section('title', 'My Fitness Lifestyle')

@section('body')
        @include('partials/navigation')

        <div class="container">

                <div class="row">
                        <div class="col-lg-12">
                                <h1 class="trainersPage">Our Trainers</h1>
                        </div>
                </div>

                <div class="row trainersPage">
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                        <div class="one trainer clearfix">
                                                <a>
                                                        <img  alt="{{$trainer->first_name}} {{$trainer->last_name}}" src="/images/trainers/{{$trainer->id}}/{{$trainer->avatar}}"  />
                                                </a>
                                                <h3>{{ $trainer->first_name}} {{$trainer->last_name}}</h3>
                                                <div class="description">{!! $trainer->description !!}</div>
                                        </div>
                                </div>
                </div>
		<div class="row">
		<div class="col-lg-offset-1 col-lg-10">
		<div class="achievements clearfix">
		@for($i=1;$i<count($achievements);$i++)
			<article class="{{($i%2==0)?'right':'left'}}">
				<div class="row">
				<div class="col-md-12">
					<h3>{{$achievements[$i]->title}}</h3>
					<div class="date">{{$achievements[$i]->created_at}}</div>
					<img src="/images/achievements/{{$achievements[$i]->id}}/{{$achievements[$i]->images[0]}}" alt="{{$achievements[$i]->title}}" />
					<div class="description">{!! $achievements[$i]->summary !!}</div>
				</div>
				</div>
			</article>
		@endfor
		</div>
		</div>	
		</div>
        </div>

        @include('partials/footer');
@endsection
