<?php

namespace App\Http\Controllers\Admin;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PostsController extends Controller
{
    public function index()
    {
        $posts = Post::all();
        return view('admin.post.index', compact(['posts']));
    }
    public function create()
    {
        return  view('admin.post.create');
    }
    public function store(Request $request)
    {
        // return   $request->only('title', 'body');
        // return   $request->except('title', 'body');
        // return $request->title;
        // $request->flash();
        // return  redirect()->route('admin.post.create')->withInput();
        // $post = new Post();
        // $post->title = $request->title;
        // $post->body = $request->body;
        // $post->save();
        Post::create(['title' => $request->title, 'body' => $request->body]);
        // return redirect()->back()->with('success', 'You data has succefuly submitted');
        return redirect()->route('admin.post');
    }
}
