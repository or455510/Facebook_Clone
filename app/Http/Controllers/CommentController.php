<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    // جلب جميع التعليقات لبوست (للـ Modal) -- JSON
    public function index($postId)
    {
        $comments = Comment::with('user')
            ->where('post_id', $postId)
            ->orderBy('created_at', 'desc')
            ->get()
            ->map(function($c){
                return [
                    'id' => $c->id,
                    'content' => $c->content,
                    'created_at' => $c->created_at->diffForHumans(),
                    'created_at_raw' => $c->created_at,
                    'user' => [
                        'id' => $c->user->id,
                        'name' => $c->user->name,
                        'avatar' => $c->user->avatar ? asset('storage/' . $c->user->avatar) : asset('images/default-avatar.png'),
                    ],
                    'is_owner' => Auth::check() && Auth::id() === $c->user_id,
                ];
            });

        return response()->json(['success' => true, 'comments' => $comments]);
    }

    // اضافة تعليق جديد (Ajax)
    public function store(Request $request, $postId)
    {
        $request->validate([
            'content' => 'required|string|max:1000',
        ]);

        $userId = Auth::id();
        if (!$userId) {
            return response()->json(['success' => false, 'message' => 'Unauthorized'], 401);
        }

        $comment = Comment::create([
            'user_id' => $userId,
            'post_id' => $postId,
            'content' => $request->content,
        ]);

        $comment->load('user');

        $commentData = [
            'id' => $comment->id,
            'content' => e($comment->content),
            'created_at' => $comment->created_at->diffForHumans(),
            'user' => [
                'id' => $comment->user->id,
                'name' => $comment->user->name,
                'avatar' => $comment->user->avatar ? asset('storage/' . $comment->user->avatar) : asset('images/default-avatar.png'),
            ],
            'is_owner' => true
        ];

        // تحديث عداد التعليقات بعد الاضافة
        $count = Comment::where('post_id', $postId)->count();

        return response()->json(['success' => true, 'comment' => $commentData, 'comments_count' => $count]);
    }

    // حذف تعليق (Ajax)
    public function destroy(Comment $comment)
    {
        if (!Auth::check() || Auth::id() !== $comment->user_id) {
            return response()->json(['success' => false, 'message' => 'Unauthorized'], 403);
        }

        $postId = $comment->post_id;
        $comment->delete();

        $count = Comment::where('post_id', $postId)->count();

        return response()->json(['success' => true, 'comments_count' => $count]);
    }
}
