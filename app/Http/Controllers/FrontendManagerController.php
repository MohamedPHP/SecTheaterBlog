<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Post;
use App\Comment;
use App\Like;

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

        // Eager Loading Insinde Eager Loading
        // $post = Post::with('category', 'tags', 'user')->with(['comments' => function ($q) {
        //     return $q->with('user');
        // }])->where('id', $id)->first();


        $post = Post::with('category', 'tags', 'user', 'comments')->where('id', $id)->first();

        // ->withCount('likes')

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

    public function addComment($post_id)
    {
        // dd($post_id);
        $post = Post::find($post_id);

        if (!$post) {
            return redirect('/');
        }


        // First Way
        // $c = new Comment;
        // $c->post_id = $post->id;
        // $c->user_id = auth()->user()->id;
        // $c->comment = request()->comment;
        // $c->save();

        // Second Way
        // $c = Comment::create([
        //     'post_id' => $post->id,
        //     'user_id' => auth()->user()->id,
        //     'comment' => request()->comment,
        // ]);

        // Thired Way **Best Practice
        $post->comments()->create([
            'user_id' => auth()->user()->id,
            'comment' => request()->comment,
        ]);

        return redirect()->back()->with([
            'message' => 'Comment Create Successfully'
        ]);
    }

    public function addLike($post_id)
    {
        // dd($post_id);
        $post = Post::find($post_id);

        if (!$post) {
            return redirect('/');
        }

        // **Best Practice
        $post->likes()->create([
            'user_id' => auth()->user()->id,
        ]);

        return redirect()->back()->with([
            'message' => 'You Liked The Post'
        ]);
    }

    public function removeLike($post_id)
    {
        $post = Post::find($post_id);

        if (!$post) {
            return redirect('/');
        }

        $post->likes()->where('user_id', auth()->user()->id)->delete();

        return redirect()->back()->with([
            'message' => 'You UnLiked The Post'
        ]);
    }
}
