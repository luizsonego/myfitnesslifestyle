@extends('layouts.admin')

@section('title', 'My Fitness Lifestyle: Articles')

@section('body')
        <div class="container-fluid paddingSideNone">
                <div class="row">
                        <div class="col-lg-3">
                                @include('admin.partials.navigation')
                        </div>
                        <div class="col-lg-9">
                                <div class="adminHeader">My Fitness Lifestyle CMS</div>
                                <div class="adminTitle clearfix">
                                        <h1>Articles</h1>
                                        <div class="createLink">
                                                {{ Html::linkRoute('admin-create-article','Create',[],['alt'=>'Create New']) }}
                                        </div>
                                </div>
                                <div class="adminContentContainer">
                                        @foreach ($articles as $article)
                                                <div class="row">
                                                        <div class="col-lg-3">
                                                                <p class="name">{{ $article->title }}</p>
                                                        </div>
                                                        <div class="col-lg-7">
                                                                {!!$article->summary  !!}
                                                        </div>
                                                        <div class="col-lg-2">
                                                                {{ Html::linkRoute('admin-edit-article','',['id'=>$article->id],['class'=>'adminActions glyphicon glyphicon-pencil']) }}
                                                                {{ Html::linkRoute('admin-delete-article','',['id'=>$article->id],['class'=>'adminActions glyphicon glyphicon-remove']) }}
                                                        	{{ Html::linkRoute('admin-activate-article','',['id'=>$article->id],['class'=>'adminActions glyphicon glyphicon-ok']) }}
							</div>
                                                </div>
                                        @endforeach
                                </div>
                        </div>
                </div>
        </div>
@endsection
