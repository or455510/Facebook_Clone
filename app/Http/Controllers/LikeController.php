<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Like;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use App\Notifications\PostLikedNotification; // ✅ هنعمل إشعار مخصص للإعجابات

class LikeController extends Controller
{
    public function toggle(Post $post)
    {
        $user = Auth::user();

        $liked = $post->likes()->where('user_id', $user->id)->exists();

        if ($liked) {
            $post->likes()->where('user_id', $user->id)->delete();
            $status = 'unliked';
        } else {
            $post->likes()->create(['user_id' => $user->id]);
            $status = 'liked';

            // 🔔 إرسال إشعار لصاحب المنشور
            if ($post->user_id !== $user->id) { // ما تبعتش لنفسك
                $post->user->notify(new PostLikedNotification($user, $post));
            }
        }

        return response()->json([
            'status' => $status,
            'likes_count' => $post->likes()->count(),
        ]);
    }
}
