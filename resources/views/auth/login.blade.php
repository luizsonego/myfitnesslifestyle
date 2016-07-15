@extends('layouts.admin')

@section('title', 'My Fitness Lifestyle: CMS')

@section('body')
        <div class="container-fluid paddingSideNone">
                <div class="row">
                        <div class="col-lg-12">
                                Login
                        </div>
                </div>
		<div class="row">
			<div class="col-lg-12">
				{!! Form::open(['enctype'=>'multipart/form-data', 'name'=>'createTrainer','route' => 'admin-login','method'=>'post']) !!}
					<div class="row marginBottom">
                                                <div class="col-lg-2">
							{!! csrf_field() !!}
                                                        <label for="Email">Email</label>
                                                </div>
                                                <div class="col-lg-10">
                                                        {{ Form::text('email',old("email"),['id'=>'email','placeholder'=>'Email'])}}
                                                         <span class="errors">{{old("email")}}</span>
                                                </div>
                                        </div>
					<div class="row marginBottom">
                                                 <div class="col-lg-2">
                                                         <label for="Email">Password</label>
                                                 </div>
                                                 <div class="col-lg-10">
                                                         {{ Form::text('password',null,['id'=>'password','placeholder'=>'Password'])}}
                                                          <span class="errors">{{old("email")}}</span>
                                                  </div>
                                          </div>
					<div class="row marginBottom">
						<div class="col-lg-12">
							<button type="submit">Login</button>
						</div>
					</div>
				{!! Form::close() !!}
			</div>
		</div>
        </div>
@endsection
