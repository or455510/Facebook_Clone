<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Illuminate\Support\Facades\Storage;
use App\Models\User; // ✅ أضف السطر ده
use App\models\Post;

class ProfileController extends Controller
{






    /**
     * Display the user's profile form.
     */
public function edit()
{
    $user = auth()->user();
    return view('profile.edit', compact('user'));
}

    // تعديل الصورة والسيرة الذاتية
public function update(Request $request)
{
    $user = auth()->user();

    $data = $request->validate([
        'name' => 'required|string|max:255',
        'bio' => 'nullable|string|max:1000',
        'avatar' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        'cover_photo' => 'nullable|image|mimes:jpg,jpeg,png|max:4096',
    ]);

    // تحميل الصورة الشخصية
    if ($request->hasFile('avatar')) {
        $path = $request->file('avatar')->store('avatars', 'public');
        $data['avatar'] = $path;
    }

    // تحميل صورة الكافر
    if ($request->hasFile('cover_photo')) {
        $path = $request->file('cover_photo')->store('covers', 'public');
        $data['cover_photo'] = $path;
    }


    $user->update($data);

    return redirect()->route('profileindex.show', $user->id)->with('success', 'تم تحديث الملف الشخصي بنجاح!');
}



    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current-password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
    public function profileindex(Request $request)
    {
        $user = Auth::user(); // المستخدم الحالي
        $posts = Post::where('user_id', $user->id ?? 1)->latest()->get();

        // جلب المتابعين والمتابَعين
    $followers = $user->followers ?? collect(); // لو مش معرف علاقة followers بيرجع collection فاضي
    $followings = $user->followings ?? collect();

    return view('profileindex', compact('user', 'posts', 'followers', 'followings'));
    }
    public function updateProfilePhoto(Request $request)
{
    $request->validate([
        'avatar' => 'required|image|max:2048',
    ]);

    $user = Auth::user();

    $path = $request->file('avatar')->store('avatars', 'public');
    $user->avatar = $path;
    $user->save();

    return back()->with('success', 'Profile photo updated successfully!');
}

public function updateCoverPhoto(Request $request)
{
    $request->validate([
        'cover' => 'required|image|max:4096',
    ]);

    $user = Auth::user();

    $path = $request->file('cover')->store('covers', 'public');
    $user->cover = $path;
    $user->save();

    return back()->with('success', 'Cover photo updated successfully!');
}
public function storePost(Request $request)
{
    $request->validate([
        'content' => 'nullable|string|max:5000',
        'image' => 'nullable|image|max:4096',
    ]);

    $path = null;
    if ($request->hasFile('image')) {
        $path = $request->file('image')->store('posts', 'public');
    }

    Post::create([
        'user_id' => Auth::id(),
        'content' => $request->content,
        'image' => $path,
    ]);

    return back()->with('success', 'Post created successfully!');
}
// public function deletePost($id)
// {
//     $post = Post::where('user_id', Auth::id())->findOrFail($id);
//     $post->delete();

//     return back()->with('success', 'Post deleted successfully!');
// }
public function show($id)
{
    // استدعاء المستخدم حسب الـ id
    $user = \App\Models\User::with(['followers', 'followings', 'posts'])->findOrFail($id);

    // بيانات المتابعين والمتابَعين
    $followers = $user->followers;
    $followings = $user->followings;
    $posts = $user->posts()->with('user')->latest()->get();

    return view('profileindex', compact('user', 'followers', 'followings', 'posts'));
}
public function followers($id)
{
            // استدعاء المستخدم حسب الـ id
    $user = \App\Models\User::with(['followers', 'followings', 'posts'])->findOrFail($id);

    // بيانات المتابعين والمتابَعين
    $followers = $user->followers;
    $followings = $user->followings;

    $posts = Post::where('user_id', $user->id ?? 1)->latest()->get();
    $user = User::findOrFail($id);
    $followers = $user->followers()->get();

    return view('profile.followers', compact( 'posts','followers', 'followings','user', 'followers'));
}

public function followings($id)
{
        // استدعاء المستخدم حسب الـ id
    $user = \App\Models\User::with(['followers', 'followings', 'posts'])->findOrFail($id);

    // بيانات المتابعين والمتابَعين
    $followers = $user->followers;
    $followings = $user->followings;

    $posts = Post::where('user_id', $user->id ?? 1)->latest()->get();
    $user = User::findOrFail($id);
    $followings = $user->followings()->get();

    return view('profile.followings', compact( 'posts','followers', 'followings','user', 'followings'));
}
public function seephoto($id)

{
        // استدعاء المستخدم حسب الـ id
    $user = \App\Models\User::with(['followers', 'followings', 'posts'])->findOrFail($id);

    // بيانات المتابعين والمتابَعين
    $followers = $user->followers;
    $followings = $user->followings;

    $posts = Post::where('user_id', $user->id ?? 1)->latest()->get();
    $user = User::findOrFail($id);
    $seephoto = $user->followings()->get();

    return view('profile.seephoto', compact('followers', 'followings', 'posts','user', 'seephoto'));
}


// المستخدم الحالي يتابع شخص آخر
public function follow($id)
{
    $userToFollow = User::findOrFail($id);
    $currentUser = Auth::user();

    if (!$currentUser->followings()->where('followed_id', $id)->exists()) {
        $currentUser->followings()->attach($id);
    }

    return back()->with('success', 'تمت المتابعة بنجاح ✅');
}

// المستخدم الحالي يلغي المتابعة
public function unfollow($id)
{
    $userToUnfollow = User::findOrFail($id);
    $currentUser = Auth::user();

    if ($currentUser->followings()->where('followed_id', $id)->exists()) {
        $currentUser->followings()->detach($id);
    }

    return back()->with('success', 'تم إلغاء المتابعة ❌');
}

// تحديث الاسم، البايو، والصورة
public function updateProfile(Request $request)
{
    $user = Auth::user();

    $request->validate([
        'name' => 'required|string|max:255',
        'bio' => 'nullable|string|max:500',
        'avatar' => 'nullable|image|max:2048',
    ]);

    if ($request->hasFile('avatar')) {
        if ($user->avatar) {
            Storage::delete('public/' . $user->avatar);
        }
        $path = $request->file('avatar')->store('avatars', 'public');
        $user->avatar = $path;
    }

    $user->name = $request->name;
    $user->bio = $request->bio;
    $user->save();

    return back()->with('success', 'تم تحديث الملف الشخصي بنجاح ✅');
}

}
