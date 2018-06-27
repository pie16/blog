<?php

namespace App\Http\Controllers  ;

use App\Comment;
use App\Http\Requests\CommentFormRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CommentsController extends Controller
{
    public function create(Request $request){

        $id = $request->input('post_id');
        $pid = $request->input('comment_id');
        session()->put('url.intended', url()->previous());

        return view('blog.comments.create', compact('id', 'pid'));
    }

    public function store(CommentFormRequest $request)
    {
        $comment = new Comment([
            'post_id' => $request->get('post_id'),
            'parent_id' => $request->get('parent_id'),
            'content' => $request->get('content'),
            'user_id' => Auth::id(),
        ]);
        $comment->save();
        //dd(session());
        return redirect()->intended()->with('status', 'Your comment has been created!');
    }
}
