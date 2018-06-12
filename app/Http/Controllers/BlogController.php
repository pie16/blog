<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Post;
use App\Services\CommentService;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

class BlogController extends Controller
{
    protected $commentService;
    public function __construct(CommentService $commentService)
    {
        $this->commentService =$commentService;
    }
    public function index()
    {
        $posts = Post::all();
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
