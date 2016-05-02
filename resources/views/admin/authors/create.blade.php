@extends('layouts.admin')

@section('title', 'My Fitness Lifestyle: Create a new Author')

@section('body')
        <div class="container-fluid paddingSideNone">
                <div class="row">
                        <div class="col-lg-3">
                                @include('admin.partials.navigation')
                        </div>
                        <div class="col-lg-9">
                                <div class="adminHeader">My Fitness Lifestyle CMS</div>
                                <div class="adminTitle clearfix">
                                        <h1>Add a New Author</h1>
                                </div>
				{!! Form::open(['enctype'=>'multipart/form-data', 'name'=>'createAuthor','route' => 'admin-store-author','method'=>'post']) !!}
                                        <div class="row marginBottom">
                                                <div class="col-lg-2">
                                                        <label for="firstName">First Name</label>
                                                </div>
                                                <div class="col-lg-10">
                                                        {{ Form::text('first_name',null,['id'=>'firstName','placeholder'=>'First Name'])}}
                                                         <span class="errors">{{$errors->first("first_name")}}</span>
                                                </div>
                                        </div>
                                        <div class="row marginBottom">
                                                <div class="col-lg-2">
                                                        <label for="lastName">Last Name</label>
                                                </div>
                                                <div class="col-lg-10">
                                                        {{ Form::text('last_name',null,['id'=>'lastName','placeholder'=>'Last Name'])}}
                                                         <span class="errors">{{$errors->first("last_name")}}</span>
                                                </div>
                                        </div>
                                        <div class="row marginBottom">
                                                <div class="col-lg-2">
                                                        <label for="email">Email</label>
                                                </div>
                                                <div class="col-lg-10">
                                                        {{ Form::text('email',null,['id'=>'email','placeholder'=>'Email Address'])}}
                                                        <span class="errors">{{$errors->first("email")}}</span>
                                                </div>
                                        </div>
                                        <div class="row marginBottom">
                                                <div class="col-lg-2">
                                                        <label for="password">Password</label>
                                                </div>
                                                <div class="col-lg-10">
                                                        {{ Form::text('password',null,['id'=>'password','placeholder'=>'Password'])}}
                                                        <span class="errors">{{$errors->first("password")}}</span>
                                                </div>
                                        </div>
					<div class="row marginBottom">
                                                <div class="col-lg-2">
                                                        <label for="avatar">Image <span>{{$errors->first('image')}}</span></label>
                                                </div>
                                                <div class="col-lg-10">
                                                        <input type="file"  id="avatar" name="avatar"/>
                                                </div>
                                        </div>
                                        <div class="row marginBottom">
                                                <div class="col-lg-2">
                                                        <label for="description">Summery</label>
                                                </div>
                                                <div class="col-lg-10">
                                                        {{ Form::textarea('description',null,['id'=>'description','placeholder'=>'Trainer Description'])}}
                                                        <span class="errors">{{$errors->first("description")}}</span>
                                                </div>
                                        </div>
                                        <div class="row marginBottom">
                                                <div class="col-lg-12">
                                                        <input type="submit" value="Create" />
                                                </div>
                                        </div>
                                {!! Form::close() !!}
                        </div>
                </div>
        </div>


<script>
        CKEDITOR.replace( 'description' );
</script>
@endsection
