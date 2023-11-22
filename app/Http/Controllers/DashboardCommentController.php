<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Support\Facades\Storage;

class DashboardCommentController extends Controller
{
    public function index()
    {
        $title = 'All Comment';
        $comments = Comment::all();
        return view('dashboard.comment.index', compact('title', 'comments'));
    }

    public function show(Comment $comment)
    {
        $title = "Comment by ".$comment->transaksi->transaksi->user->name;
        return view('dashboard.comment.show', compact('title', 'comment'));
    }

    public function destroy(Comment $comment)
    {
        if($comment->image){
            Storage::delete($comment->image);
        }
        $comment->delete();
        return redirect()->route('dashboard.comment')->with('success', 'Comment berhasil dihapus!');
    }
}
