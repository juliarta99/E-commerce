<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class DashboardCommentController extends Controller
{
    public function index()
    {
        $title = 'All Comment';
        $comments = Comment::all();
        return view('dashboard.comment.index', compact('title', 'comments'));
    }
}
