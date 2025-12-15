<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post; // ✅ لازم تضيف ده
use Illuminate\Support\Facades\Auth; // ✅ وكمان ده
use App\Models\Story; // ✅ عشان تجيب القصص


class PostController extends Controller
{
public function index( Request $request)
{
            $user = Auth::user(); // المستخدم الحالي
        $posts = Post::where('user_id', $user->id ?? 1)->latest()->get();


    // return view('profileindex', compact('user', 'posts', 'followers', 'followings'));
    //         $user = Auth::user(); // المستخدم الحالي
    //     $post = Post::where('user_id', $user->id ?? 1)->latest()->get();

    $posts = Post::with('user', 'comments.user', 'likes')->latest()->get();
    $user = auth()->user();

    // ✅ أضف هذا السطر لجلب القصص
    $stories = Story::with('user')->latest()->get();
$followers = $user->followers ?? collect();
    return view('welcome', compact('followers','posts', 'user', 'stories'));
}
public function indexpost()
{
            $user = Auth::user(); // المستخدم الحالي
        $posts = Post::where('user_id', $user->id ?? 1)->latest()->get();


    // return view('profileindex', compact('user', 'posts', 'followers', 'followings'));
    //         $user = Auth::user(); // المستخدم الحالي
    //     $post = Post::where('user_id', $user->id ?? 1)->latest()->get();

    $posts = Post::with('user', 'comments.user', 'likes')->latest()->get();
    $user = auth()->user();

    // ✅ أضف هذا السطر لجلب القصص
    $stories = Story::with('user')->latest()->get();

    return view('posts.index', compact('posts', 'user', 'stories'));
}



    // حفظ بوست جديد
public function store(Request $request)
{
    $request->validate([
        'content' => 'nullable|string|max:1000',
        'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        'video' => 'nullable|mimes:mp4,mov,avi|max:10240',
    ]);

    $post = new Post();
    $post->user_id = Auth::id();
    $post->content = $request->content;

    // ✅ رفع الصورة إن وجدت
    if ($request->hasFile('image')) {
        $post->image = $request->file('image')->store('posts/images', 'public');
    }

    // ✅ رفع الفيديو إن وجد
    if ($request->hasFile('video')) {
        $post->video = $request->file('video')->store('posts/videos', 'public');
    }

    $post->save();

    return redirect()->back()->with('success', 'تم نشر البوست بنجاح!');
}


    // حذف بوست
    public function destroy(Post $post)
    {
        if ($post->user_id === Auth::id()) {
            $post->delete();
            return back()->with('success', 'تم حذف البوست بنجاح 🗑️');
        }

        return back()->with('error', 'غير مصرح لك بحذف هذا البوست ❌');
    }
    // تحديث بوست
    public function update(Request $request, Post $post){
        if ($post->user_id !== Auth::id()) {
            return back()->with('error', 'غير مصرح لك بتعديل هذا البوست ❌');
        }

        $request->validate([
            'content' => 'nullable|string|max:1000',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'video' => 'nullable|mimes:mp4,mov,avi|max:10240',
        ]);

        $post->content = $request->content;

        // تحديث الصورة إن وجدت
        if ($request->hasFile('image')) {
            $post->image = $request->file('image')->store('posts/images', 'public');
        }

        // تحديث الفيديو إن وجد
        if ($request->hasFile('video')) {
            $post->video = $request->file('video')->store('posts/videos', 'public');
        }

        $post->save();

        return redirect()->route('welcome')->with('success', 'تم تحديث البوست بنجاح!');

    }

    }




