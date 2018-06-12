<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Requests\PostEditFormRequest;
use App\Http\Requests\PostFormRequest;
use App\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class PostsController extends Controller
{
    public function index()
    {
        $posts = Post::all();
        return view('backend.posts.index', compact('posts'));
    }

    public function create(){
        $categories = Category::all();
        return view('backend.posts.create', compact('categories'));
    }

    public function store(PostFormRequest $request)
    {
        $post= new Post([
            'title' => $request->get('title'),
            'content' => $request->get('content'),
            'slug' => Str::slug($request->get('title'), '-'),
            'user_id' => Auth::id(),

        ]);
        $post->save();
        $post->categories()->sync($request->get('categories'));
        return redirect('/admin/posts/create')->with('status', 'The post has been created!');
    }

    public function edit($id)
    {
        $post = Post::whereId($id)->firstOrFail();
        $categories = Category::all();
        $selectedCategories = $post->categories->pluck('id')->toArray();;
        return view('backend.posts.edit', compact('post', 'categories', 'selectedCategories'));
    }

    public function update($id, PostEditFormRequest $request)
    {
        $post = Post::whereId($id)->firstOrFail();
        $post->title = $request->get('title');
        $post->content = $request->get('content');
        $post->slug = Str::slug($request->get('title'), '-');
        $post->save();
        $post->categories()->sync($request->get('categories'));
        return redirect(action('Admin\PostsController@edit', $post->id))->with('status', 'The post has been updated!');
    }

}
