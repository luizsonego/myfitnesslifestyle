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
		<div class="col-lg-offset-2 col-lg-8">
		<div class="achievements clearfix">
		@foreach($achievements as $month => $achievement)
		<div class="month">{{$month}}</div>
		@for($i=1;$i<count($achievement);$i++)
			<article class="{{($i%2==0)?'right':'left'}}">
				<div class="row">
				<div class="col-md-12">
					<h3>{{$achievement[$i]->title}}</h3>
					<div class="date">{{date('Y-m-d',strtotime($achievement[$i]->created_at))}}</div>	
					<img src="/images/achievements/{{$achievement[$i]->id}}/{{$achievement[$i]->images[0]}}" alt="{{$achievement[$i]->title}}" />
					<div class="description">{!! $achievement[$i]->summary !!}</div>
				</div>
				</div>
			</article>
		@endfor
		@endforeach
		</div>
		</div>	
		</div>
        </div>

        @include('partials/footer',['trainerDetails'=>true])
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
