<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Policies\PostPolicy;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{

    function index()
    {
        $categories = Category::get();
        $posts = Post::get();
        return (count($categories) > 0)
            ? view('posts.index', compact(['categories', 'posts'])) : view('error_pages.404');
    }

    function create()
    {
        $categories = Category::get();
        return (count($categories) > 0)
            ? view('posts.addpost', compact('categories')) : view('error_pages.404');
    }

    function store(Request $request)
    {
        // some validation here
        $post =  Post::create($request->except('image'));
        $post->update([
            'user_id' => auth()->user()->id,
        ]);

        if ($request->hasFile('image')) {
            $imgName = $request->file('image')->getClientOriginalName();
            $request->image->move(public_path('\images\posts_imgs\\'), $imgName);

            $path = 'images\posts_imgs\\';
            $post->update(['image' =>  $path . $imgName]);
        }
        session()->flash('storePost', 'Post Added Successfully');
        return to_route('posts');
    }

    function edit($id)
    {
        $categories = Category::get();
        $post = Post::findOrFail($id);
        // Gate::authorize('update', $post);
        if (auth()->user()->can('update', $post)) {

            return view('posts.edit', compact('post', 'categories'));
        }
        return abort(403);
    }
    function update(Request $request)
    {
        // some validation here
        $post = Post::find($request->id);
        $this->authorize('update', $post);

        $post->update($request->except(['postImg', 'categImg']));
        $post->update([
            'user_id' => auth()->user()->id,
        ]);

        if ($request->hasFile('postImg')) {
            $postImg = $request->file('postImg')->getClientOriginalName();
            $request->postImg->move(public_path('\images\posts_imgs\\'), $postImg);

            $path1 = 'images\posts_imgs\\';
            $post->update([
                'image' =>  $path1 . $postImg,
            ]);
        }
        if ($request->hasFile('categImg')) {
            $categImg = $request->file('categImg')->getClientOriginalName();
            $request->categImg->move(public_path('\images\category_imgs\\'), $categImg);

            $path2 = 'images\category_imgs\\';

            $post->category->update([
                'image' =>  $path2 . $categImg,
            ]);
        }

        session()->flash('edit', 'Post Updated successfully');
        return to_route('posts');
    }

    function destroy(Request $request)
    {
        Post::find($request->id)->delete();
        session()->flash('delete', 'Post Deleted successfully');
        return redirect()->back();
    }
}
