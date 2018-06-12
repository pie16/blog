<div class="media-left">
    <a href="#">
        <img class="media-object" src="/examples/images/avatar1.jpg" alt="...">
    </a>
</div>
<div class="media-body">
    <div class="media-heading">
        <div class="author">{!! $comment->user->name !!}</div>
        <div class="metadata">
            <span class="date">{!! $comment->created_at !!}</span>
        </div>
    </div>
    <div class="media-text text-justify">{!! $comment->content !!}</div>
    <div class="footer-comment">
        @if (Auth::check())
        <a class="btn btn-default" href="{!! action('CommentsController@create', ['post_id' => $post->id, 'comment_id' => $comment->id]) !!}">Ответить</a>
        @endif
    </div>
    <hr>
</div>

    <ul>
        @if (!empty($comment->child))
           {{-- {!! dump($comment) !!};--}}
            @foreach($comment->child as $c)
                {{--    {!! dump($c) !!};--}}
               @include("blog.comments.template", ['comment'=>$c])
            @endforeach
        @endif
    </ul>



