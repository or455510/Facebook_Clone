<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Notifications\NewFollowerNotification; // ✅ استيراد الإشعار الصحيح

class FollowController extends Controller
{
    public function toggle(User $user)
    {
        $authUser = Auth::user();

        // 🛑 منع متابعة نفسك
        if ($authUser->id === $user->id) {
            return response()->json(['message' => 'لا يمكنك متابعة نفسك'], 403);
        }

        // ✅ تحقق إذا كان المستخدم متابع بالفعل
        if ($authUser->followings()->where('followed_id', $user->id)->exists()) {
            $authUser->followings()->detach($user->id);
            $status = 'unfollowed';
        } else {
            $authUser->followings()->attach($user->id);
            $status = 'followed';

            // 🔔 إرسال إشعار للمستخدم اللي تم متابعته
            $user->notify(new NewFollowerNotification($authUser));
        }

        return response()->json([
            'status' => $status,
            'followers_count' => $user->followers()->count(),
        ]);
    }
}
