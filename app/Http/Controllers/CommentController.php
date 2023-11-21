<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\DetailTransaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class CommentController extends Controller
{
    public function create($id)
    {
        $title = 'Add Comment';
        $detail = DetailTransaksi::with('product', 'transaksi', 'transaksi.deliverys')->find($id);
        $delivery = $detail->transaksi->deliverys->where('id_toko', $detail->product->toko->id)->first();
        if($detail->transaksi->id_user != Auth::user()->id || $delivery->status != "success"){
            return redirect()->route('transaksi')->with('error', 'Terjadi kesalahan!');
        } else if(Comment::where('id_transaksi', $id)->exists()){
            return redirect()->route('transaksi')->with('error', 'Anda telah membuat ulasan untuk transaksi tersebut!');
        }
        $rates = collect([
            ['value' => 0],
            ['value' => 0.5],
            ['value' => 1],
            ['value' => 1.5],
            ['value' => 2],
            ['value' => 2.5],
            ['value' => 3],
            ['value' => 3.5],
            ['value' => 4],
            ['value' => 4.5],
            ['value' => 5],
        ]);
        return view('comment.create', compact('title', 'detail', 'rates'));
    }

    public function store($id, Request $request)
    {
        $detail = DetailTransaksi::with('transaksi')->find($id);
        $delivery = $detail->transaksi->deliverys->where('id_toko', $detail->product->toko->id)->first();
        if($detail->transaksi->id_user != Auth::user()->id || $delivery->status != "success"){
            return redirect()->route('transaksi')->with('error', 'Terjadi kesalahan!');
        } else if(Comment::where('id_transaksi', $id)->exists()){
            return redirect()->route('transaksi')->with('error', 'Anda telah membuat ulasan untuk transaksi tersebut!');
        }
        
        $validateData = $request->validate([
            'image' => 'nullable|file|image|max:1024',
            'body' => 'nullable|string',
            'rate' => 'required'
        ]);
        if($request->file('image')) {
            $validateData['image'] = $request->file('image')->store('comment-images');
        } else {
            $validateData['image'] = null;
        };

        Comment::create([
            'id_transaksi' => $id,
            'image' => $validateData['image'],
            'body' => $validateData['body'],
            'rate' => $validateData['rate']
        ]);
        return redirect()->route('product.single.show', $detail->product->slug)->with('success', 'Ulasan berhasil ditambahkan');
    }

    public function edit(Comment $comment)
    {
        if($comment->transaksi->transaksi->id_user != Auth::user()->id){
            return redirect()->route('transaksi')->with('error', 'Terjadi kesalahan!');
        }
        $title = "Edit Comment";
        $rates = collect([
            ['value' => 0],
            ['value' => 0.5],
            ['value' => 1],
            ['value' => 1.5],
            ['value' => 2],
            ['value' => 2.5],
            ['value' => 3],
            ['value' => 3.5],
            ['value' => 4],
            ['value' => 4.5],
            ['value' => 5],
        ]);
        return view('comment.edit', compact('title', 'comment', 'rates'));
    }

    public function update(Comment $comment, Request $request)
    {
        if($comment->transaksi->transaksi->id_user != Auth::user()->id){
            return redirect()->route('transaksi')->with('error', 'Terjadi kesalahan!');
        }

        $validateData = $request->validate([
            'image' => 'nullable|file|image|max:1024',
            'body' => 'nullable|string',
            'rate' => 'required'
        ]);
        if($request->file('image')) {
            if($comment->image) {
                Storage::delete($comment->image);
            }
            $validateData['image'] = $request->file('image')->store('comment-images');
        }
        Comment::where('id', $comment->id)->update($validateData);
        return redirect()->route('product.single.show', $comment->transaksi->product->slug)->with('success', 'Comment berhasil diperbaharui');
    }
}
