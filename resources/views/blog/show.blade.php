@extends('layouts.app')
@section('title', 'View a post')
@section('content')
    <div class="container col-md-8 col-md-offset-2">
        <div class="well well bs-component">
            <div class="content">
                <h2 class="header">{!! $post->title !!}</h2>
                <p> {!! $post->content !!} </p>
            </div>
            <div class="clearfix"></div>
        </div>
                @foreach ($comments as $comment)
                    @include("blog.comments.template", ['comments'=>$comment])
                @endforeach


        <div class="well well bs-component">
            @if (Auth::check())
                {{--@include ('blog.comments.create')--}}
{{--                @php
                session(['post_id' => $post->id]);
                @endphp--}}
                <a class="btn btn-default" href="{!! action('CommentsController@create', ['post_id' => $post->id, 'comment_id' => 0]) !!}">Добавить комментарий</a>
            @else
                <a href="{{ url('/login') }}">Войдите</a> или
                <a href="{{ url('/register') }}">зарегестрируйтесь</a> чтобы добавить коментарий
            @endif
        </div>
    </div>


@endsection