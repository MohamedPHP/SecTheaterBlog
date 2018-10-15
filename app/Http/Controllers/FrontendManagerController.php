<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Post;

class FrontendManagerController extends Controller
{
    public function index()
    {
        $posts = Post::with('category')->paginate(9);

        return view('frontend.index', [
            'posts' => $posts,
        ]);
    }

    public function single($id)
    {
        $post = Post::with('category', 'tags', 'user')->where('id', $id)->first();


        if (!$post) {
            return redirect('/');
        }

        $postsHasSameTags = Post::where('id', '!=', $post->id)->whereHas('tags', function ($q) use($post) {
            return $q->whereIn('tags.id', $post->tags->pluck('id')->toArray());
        })->orderBy('id', 'DESC')->limit(3)->get();

        return view('frontend.single', [
            'post' => $post,
            'postsHasSameTags' => $postsHasSameTags,
        ]);
    }
}
