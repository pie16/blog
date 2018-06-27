@extends('layouts.app')
@section('title', 'Blog')
@section('content')
    <div class="container">
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif
        <div class="row">
            <div class="col-md-12 col-md-offset-1">
                @if ($posts->isEmpty())
                    <p> There is no post.</p>
                @else
                    @foreach ($posts as $post)
                <div class="panel panel-default">
                    <div class="panel-heading">{{ $post->title }}</div>
                    <div class="panel-body">
                        {!! mb_substr($post->content,0,500) !!}...
                        <a href="{!! action('BlogController@show', $post->slug) !!}">Читать далее </a>
                    </div>
                </div>
                    @endforeach
                @endif
                    <div class="container">
                        @foreach ($posts as $post)
                            {{ $post->name }}
                        @endforeach
                    </div>

                    {{ $posts->links() }}
            </div>
        </div>
    </div>
@endsection