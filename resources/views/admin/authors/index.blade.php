@extends('layouts.admin')

@section('title', 'My Fitness Lifestyle: Authors')

@section('body')
        <div class="container-fluid paddingSideNone">
                <div class="row">
                        <div class="col-lg-3">
                                @include('admin.partials.navigation')
                        </div>
                        <div class="col-lg-9">
                                <div class="adminHeader">My Fitness Lifestyle CMS</div>
                                <div class="adminTitle clearfix">
                                        <h1>Authors</h1>
                                        <div class="createLink">
                                                {{ Html::linkRoute('admin-create-author','Create',[],['alt'=>'Create New']) }}
                                        </div>
                                </div>
                                <div class="adminContentContainer">
                                        @foreach ($authors as $author)
                                                <div class="row">
                                                        <div class="col-lg-3">
                                                                <p class="name">{{ $author->first_name }} {{ $author->last_name }}</p>
                                                                <img src="/images/authors/{{$author->id}}/{{$author->avatar}}" />
                                                        </div>
                                                        <div class="col-lg-7">
                                                                {!!$author->description  !!}
                                                        </div>
                                                        <div class="col-lg-2">
                                                                {{ Html::linkRoute('admin-edit-author','',['id'=>$author->id],['class'=>'adminActions glyphicon glyphicon-pencil']) }}
                                                                {{ Html::linkRoute('admin-delete-author','',['id'=>$author->id],['class'=>'adminActions glyphicon glyphicon-remove']) }}
                                                                {{ Html::linkRoute('admin-activate-author','',['id'=>$author->id],['class'=>'adminActions glyphicon glyphicon-ok']) }}
                                                        </div>
                                                </div>
                                        @endforeach
                                </div>
                        </div>
                </div>
        </div>
@endsection
