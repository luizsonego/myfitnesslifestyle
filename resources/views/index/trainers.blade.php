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
			@foreach ($trainers as $trainer)
				<div class="col-lg-6">
					<div class="trainer clearfix">
						<a>
                         				<img  alt="{{$trainer->first_name}} {{$trainer->last_name}}" src="/images/trainers/{{$trainer->id}}/{{$trainer->avatar}}"  />
						</a>
                        			<h3>{{ $trainer->first_name}} {{$trainer->last_name}}</h3>
						<div class="description">{!! $trainer->description !!}</div>
						<a class="seeMore" ref="/trainer/{{$trainer->first_name.'-'.$trainer->last_name}}">See More</a>
					</div>
				</div>
			@endforeach
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
