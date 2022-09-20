<?php

namespace App\Http\Controllers\Admin;

use App\Models\Post;
use App\Models\Picture;
use Illuminate\Http\Request;
use App\Http\Requests\PostsRequest;
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

        // return $request->all();
        // return $request->input('picture');
        $pictureId = null;
        if ($request->hasFile('picture')) {
            $files = $request->File('picture');
            // $filename = $file->getClientOriginalName();
            $title = $request->title;
            $exten = $files->extension();
            $file = $title . ".$exten";
            $fFile = str_replace(' ', '-', $file);
            $files->move('images', $fFile);
            $pic = new Picture();
            $pic->name = $fFile;
            $pic->save();
            $pictureId = $pic->id;
        }
        // return $filename;
        // return $file;
        // if ($request->hasFile('picture')){

        // }
        // $request->validate([
        //     'title' => 'required|string|max:40|unique:posts',
        //     'body' => 'required|string'
        // ], [
        //     'title.required' => 'The blog title is required',
        //     'title.string' => 'Blog title must be a valid string',
        //     'body.required' => 'Blog content is required',
        // ]);

        // return   $request->only('title', 'body');
        // return   $request->except('title', 'body');
        // return $request->title;
        // $request->flash();
        // return  redirect()->route('admin.post.create')->withInput();
        // $post = new Post();
        // $post->title = $request->title;
        // $post->body = $request->body;
        // $post->save();
        Post::create(['title' => $request->title, 'body' => $request->body, 'picture_id' => $pictureId]);
        return redirect()->back()->with('success', 'You data has succefuly submitted');
        // return redirect()->route('admin.post');
    }
    public function delete($id)
    {
        Post::findorfail($id)->delete();
        return redirect('admin/post')->with('delete', 'Your post has successfully deleted');
    }
}
