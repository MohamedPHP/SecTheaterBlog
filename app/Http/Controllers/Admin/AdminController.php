<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Post;
use App\Comment;

class AdminController extends Controller
{
    public function index()
    {
        $args = [
            'users_count' => User::count(),
            'posts_count' => Post::count(),
            'comments_count' => Comment::count(),
        ];
        
        return view('backend.index', [
            'title' => 'Dashboard',
            'args' => $args
        ]);
    }

    public function logout()
    {
        auth()->logout();
        return redirect('/');
    }
}
