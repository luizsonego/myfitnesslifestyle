@extends('layouts.admin')

@section('title', 'My Fitness Lifestyle: Edit a Trainer')

@section('body')
        <div class="container-fluid paddingSideNone">
                <div class="row">
                        <div class="col-lg-3">
                                @include('admin.partials.navigation')
                       </div>
			<div class="col-lg-9">
                                <div class="adminHeader">My Fitness Lifestyle CMS</div>
                                <div class="adminTitle clearfix">
                                        <h1>Edit Trainer</h1>
                                </div>
                                {!! Form::open(['enctype'=>'multipart/form-data', 'name'=>'updateTrainer','route' => 'admin-update-trainer','method'=>'post']) !!}
                                        {{ Form::hidden('id',$trainer->id,[])}}
					<div class="row marginBottom">
                                                <div class="col-lg-2">
                                                        <label for="firstName">First Name</label>
                                                </div>
                                                <div class="col-lg-10">
                                                        {{ Form::text('first_name',$trainer->first_name,['id'=>'firstName','placeholder'=>'First Name'])}}
                                                         <span class="errors">{{$errors->first("first_name")}}</span>
                                                </div>
                                        </div>
                                        <div class="row marginBottom">
                                                <div class="col-lg-2">
                                                        <label for="lastName">Last Name</label>
                                                </div>
                                                <div class="col-lg-10">
                                                        {{ Form::text('last_name',$trainer->last_name,['id'=>'lastName','placeholder'=>'Last Name'])}}
                                                         <span class="errors">{{$errors->first("last_name")}}</span>
                                                </div>
                                        </div>
                                        <div class="row marginBottom">
                                                <div class="col-lg-2">
                                                        <label for="email">Email</label>
                                                </div>
                                                <div class="col-lg-10">
                                                        {{ Form::text('email',$trainer->user->email,['id'=>'email','placeholder'=>'Email Address'])}}
                                                        <span class="errors">{{$errors->first("email")}}</span>
                     				</div>
					</div>

					<div class="row marginBottom">
                                                <div class="col-lg-2">
                                                        <label for="avatar">Image <span>{{$errors->first('image')}}</span></label>
                                                </div>
                                                <div class="col-lg-8">
                                                        <input type="file"  id="avatar" name="avatar"/>
                                                </div>
						<div class="col-lg-2">
							<img class="adminOldImage" src="/images/trainers/{{$trainer->id}}/{{$trainer->avatar}}">
						</div>
                                        </div>
                                        <div class="row marginBottom">
                                                <div class="col-lg-2">
                                                        <label for="description">Summery</label>
                                                </div>
                                                <div class="col-lg-10">
                                                        {{ Form::textarea('description',$trainer->description,['id'=>'description','placeholder'=>'Trainer Description'])}}
                                                        <span class="errors">{{$errors->first("description")}}</span>
                                                </div>
                                        </div>
                                        <div class="row marginBottom">
                                                <div class="col-lg-12">
                                                        <input type="submit" value="Update" />
                                                </div>
                                        </div>
                                {!! Form::close() !!}
                        </div>
                </div>
        </div>


<script>
         var edt = CKEDITOR.replace( 'description' )
</script>
@endsection
