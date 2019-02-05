<?php

namespace App\Http\Controllers;

use App\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function index(Request $request)
    {
        $data = $request->validate([
            'video_id' => 'required',
        ]);
        $comments = Comment::where('video_id', $data['video_id'])->orderBy('id', 'desc')->get();
        return response()->json($comments, 201);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'body' => 'required|min:3',
            'video_id' => 'required',
        ]);
        $comment = Comment::create([
            'body' => $data['body'],
            'user_id' => Auth::id(),
            'is_published' => 1,
            'video_id' => $data['video_id'],
        ]);
        return response()->json($comment, 201);
    }
}
