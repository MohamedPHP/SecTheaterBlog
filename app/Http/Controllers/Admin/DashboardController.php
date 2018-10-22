<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Comment;

class DashboardController extends Controller
{
    public function deleteComment($id)
    {
        $c = Comment::find($id);
        if ($c) {
            $c->delete();
        }
        return back();
    }
}
