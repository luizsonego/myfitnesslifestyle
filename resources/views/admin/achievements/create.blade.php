@extends('layouts.admin')

@section('title', 'My Fitness Lifestyle: Create an Achievement')

@section('body')
        <div class="container-fluid paddingSideNone">
                <div class="row">
                        <div class="col-lg-3">
                                @include('admin.partials.navigation')
                        </div>
                        <div class="col-lg-9">
                                <div class="adminHeader">My Fitness Lifestyle CMS</div>
                                <div class="adminTitle clearfix">
                                        <h1>Add an achievement</h1>
                                </div>
                                {!! Form::open(['enctype'=>'multipart/form-data', 'name'=>'createAchievement','route' => 'admin-store-achievement','method'=>'post']) !!}
                                         <div class="row marginBottom">
                                                <div class="col-lg-2">
                                                        <label for="category">Trainers</label>
                                                </div>
                                                <div class="col-lg-10">
                                                        {{ Form::select('trainer',$trainers,null,['placeholder'=>'Select a Trainer','id'=>'trainer']) }}
                                                         <span class="errors">{{$errors->first("trainer")}}</span>
                                                </div>
                                        </div>
					<div class="row marginBottom">
                                                <div class="col-lg-2">
                                                        <label for="title">Title</label>
                                                </div>
                                                <div class="col-lg-10">
                                                        {{ Form::text('title',null,['id'=>'title','placeholder'=>'Title'])}}
                                                         <span class="errors">{{$errors->first("title")}}</span>
                                                </div>
                                        </div>
                                        <div class="row marginBottom">
                                                <div class="col-lg-2">
                                                        <label for="Summary">Summary</label>
                                                </div>
                                                <div class="col-lg-10">
                                                        {{ Form::textarea('summary',null,['id'=>'summary','placeholder'=>'Summary'])}}
                                                         <span class="errors">{{$errors->first("summary")}}</span>
         				</div>
					 <div class="row marginBottom">
                                                <div class="col-lg-2">
                                                        <label for="images">Images</label>
                                                </div>
                                                <div class="col-lg-10">
                                                        <input type="file" multiple="multiple" id="images" name="images[]"/>
                                                         <span class="errors">{{$errors->first("images")}}</span>
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
        CKEDITOR.replace( 'summary' );
        CKEDITOR.add;

        CKEDITOR.replace( 'content' );
        CKEDITOR.add;
</script>
@endsection
