<?php

namespace App\Http\Controllers;

use App\Models\BlogPost;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class BlogController extends Controller
{
    function blogSingleIndex($slug) {
        $blog  = BlogPost::where('slug', $slug)->first();
        return view('blog',compact('blog'));
    }

    function blogsIndex()
    {
        $blogs = BlogPost::orderby('id', 'desc')->paginate(10);
        return view('blogs', compact('blogs'));
    }

    function blogIndex(Request $request)
    {
        $posts = BlogPost::orderby('updated_at', 'desc')->paginate(25);
        $post = [];
        if ($request->edit) {
            $post = BlogPost::find($request->edit);
        }
        return view('admin.blog', compact(['posts', 'post']));
    }

    function updatePost(Request $request)
    {
        Validator::make($request->all(), [
            'title' => 'required|string|min:10',
            'body' => 'required|string',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg',
            'id' => 'exists:blog_posts,id'
        ])->validate();
        $post = BlogPost::find($request->id);
        $photo_name = $post->image;
        if ($request->hasFile('image')) {
            $img = $request->file('image');
            $photo_name = 'assets/images/blog/'. time() . rand() . '.' . $img->getClientOriginalExtension();
            move_uploaded_file($img, $photo_name);
        }
        $post->update([
            'title' => $request->title,
            'body' => $request->body,
            'image' => $photo_name,
            'category' => $request->category ?? 'News',
            'slug' => rand(11, 999).'-'.Str::slug($request->title)
        ]);
        return redirect('/admin/create-post')->with('success', 'Post has been updated successfully ');
    }


    function createPost(Request $request)
    {
        Validator::make($request->all(), [
            'title' => 'required|string|min:10',
            'body' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
        ])->validate();

        $photo_name = 'noimg.png';
        if ($request->hasFile('image')) {
            $img = $request->file('image');
            $photo_name = 'assets/images/blog/'. time() . rand() . '.' . $img->getClientOriginalExtension();
            move_uploaded_file($img, $photo_name);
        }


        BlogPost::create([
            'title' => $request->title,
            'body' => $request->body,
            'image' => $photo_name,
            'category' => $request->category ?? 'News',
            'slug' => rand(11, 999).'-'.Str::slug($request->title),
            'created_by' => auth()->user()->id
        ]);
        return back()->with('success', 'News has been created ');
    }
}
