@extends('layouts.admin')

@section('title', 'My Fitness Lifestyle: Trainers')

@section('body')
        <div class="container-fluid paddingSideNone">
                <div class="row">
			<div class="col-lg-3">
                        	@include('admin.partials.navigation')
                        </div>
			<div class="col-lg-9">
				<div class="adminHeader">My Fitness Lifestyle CMS</div>
				<div class="adminTitle clearfix">
					<h1>Trainers</h1>
					<div class="createLink">
						{{ Html::linkRoute('admin-create-trainer','Create',[],['alt'=>'Create New']) }}
					</div>
				</div>
				<div class="adminContentContainer">
					@foreach ($trainers as $trainer)
    						<div class="row">
							<div class="col-lg-3">
								<p class="name">{{ $trainer->first_name }} {{ $trainer->last_name }}</p>
								<img src="/images/trainers/{{$trainer->id}}/{{$trainer->avatar}}" />
							</div>
							<div class="col-lg-7">
								{!!$trainer->description  !!} 
							</div>
							<div class="col-lg-2">
								{{ Html::linkRoute('admin-edit-trainer','',['id'=>$trainer->id],['class'=>'adminActions glyphicon glyphicon-pencil']) }}
								{{ Html::linkRoute('admin-delete-trainer','',['id'=>$trainer->id],['class'=>'adminActions glyphicon glyphicon-remove']) }}
								{{ Html::linkRoute('admin-activate-trainer','',['id'=>$trainer->id],['class'=>'adminActions glyphicon glyphicon-ok']) }}
							</div>
						</div>
					@endforeach
				</div>
			</div>
		</div>
	</div>
@endsection
