<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Events\MessageSent;

class MessageController extends Controller
{
    public function index($userId)
    {
        $messages = Message::where(function($q) use ($userId) {
                $q->where('sender_id', Auth::id())
                  ->where('receiver_id', $userId);
            })
            ->orWhere(function($q) use ($userId) {
                $q->where('sender_id', $userId)
                  ->where('receiver_id', Auth::id());
            })
            ->orderBy('created_at', 'asc')
            ->get();

        return view('messages.chat', compact('messages', 'userId'));
    }

    // إرسال رسالة جديدة
public function store(Request $request, $userId)
{
    $request->validate([
        'content' => 'required|string|max:1000',
    ]);

    $message = Message::create([
        'sender_id' => Auth::id(),
        'receiver_id' => $userId,
        'content' => $request->content,
    ]);

    broadcast(new MessageSent($message))->toOthers();

    return response()->json(['success' => true]);
}


    // عرض المحادثة بين المستخدمين
    public function chat($userId)
    {
            // بنجيب كل المستخدمين ما عدا المستخدم الحالى
    $users = \App\Models\User::where('id', '!=', Auth::id())->get();

        $messages = Message::where(function ($query) use ($userId) {
            $query->where('sender_id', Auth::id())
                  ->where('receiver_id', $userId);
        })->orWhere(function ($query) use ($userId) {
            $query->where('sender_id', $userId)
                  ->where('receiver_id', Auth::id());
        })->orderBy('created_at', 'asc')->get();

        return view('messages.chat', compact('users','messages', 'userId'));
    }
    public function indexUsers()
{
    // بنجيب كل المستخدمين ما عدا المستخدم الحالى
    $users = \App\Models\User::where('id', '!=', Auth::id())->get();

    return view('messages.index', compact('users'));
}

}
