<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class NotificationController extends Controller
{
    // عرض كل الإشعارات
    public function index()
    {
        $user = Auth::user();

        // جلب كل الإشعارات الخاصة بالمستخدم
        $notifications = $user->notifications()->latest()->get();

        // تحديد الإشعارات كـ "مقروءة"
        $user->unreadNotifications->markAsRead();

        return view('notifications.index', compact('notifications'));
    }

    // جلب عدد الإشعارات الغير مقروءة (للأيقونة)
    public function count()
    {
        return response()->json([
            'count' => Auth::user()->unreadNotifications->count(),
        ]);
    }
}
