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
			@for($i=0;$i<count($trainers);$i++)
				<div class="col-lg-6 col-md-6 col-sm-6">
					<div class="{{$i%2!=0?'before':''}} trainer clearfix">
						<a>
                         				<img  alt="{{$trainers[$i]->first_name}} {{$trainers[$i]->last_name}}" src="/images/trainers/{{$trainers[$i]->id}}/{{$trainers[$i]->avatar}}"  />
						</a>
                        			<h3>{{ $trainers[$i]->first_name}} {{$trainers[$i]->last_name}}</h3>
						<div class="description">{!! $trainers[$i]->description !!}</div>
						<a class="seeMore" ref="/trainer/{{$trainers[$i]->first_name.'-'.$trainers[$i]->last_name}}">See More</a>
					</div>
				</div>
			@endfor
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
