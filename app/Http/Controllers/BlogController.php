<?php

namespace App\Http\Controllers;


use App\Post;
use App\Services\CommentService;

class BlogController extends Controller
{
    protected $commentService;
    public function __construct(CommentService $commentService)
    {
        $this->commentService =$commentService;
    }
    public function index()
    {
        $posts = Post::paginate(5);
        //dd($posts);
        return view('blog.index', compact('posts'));
    }

    public function show($slug)
    {
        $post = Post::whereSlug($slug)->with('comments', 'comments.user')->firstOrFail();
        //dd($post);
        $comments = $this->commentService->buildCommentTree($post->comments->keyBy('id'));


        return view('blog.show', compact('post', 'comments'));
    }


}
