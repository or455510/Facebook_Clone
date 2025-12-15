<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\FollowController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\MessageController;
use Illuminate\Support\Facades\Auth;
use App\Models\Story;
use App\Http\Controllers\StoryController;


// Route::get('/', [PostController::class, 'index'])->middleware('auth');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');
Route::get('/adit', function () {
    return view('adit');
})->middleware(['auth', 'verified'])->name('adit');
Route::get('/addphoto', function () {
    $user = auth()->user();
    $followers = $user ? $user->followers : collect();
    return view('addphoto', compact('followers'));
});
    Route::get('/', [PostController::class, 'index'])->middleware(['auth', 'verified'])->name('welcome');


Route::middleware('auth')->group(function () {
    // CRUD للبوستات
// Route::post('posts.index', [PostController::class , 'not']);
    Route::get('/messages', [MessageController::class, 'indexUsers'])->name('messages.index');

Route::get('/messages/{user}', [MessageController::class, 'chat'])->name('messages.chat');
    Route::post('/messages/{user}', [MessageController::class, 'store'])->name('messages.store');
//     Route::get('/messages', function () {
//         return view('messages.index'); // هنعمل الصفحة دي لاحقًا

// })->name('messages.index');
    Route::get('/notifications', [NotificationController::class, 'index'])->name('notifications.index');
    Route::get('/notifications/count', [NotificationController::class, 'count'])->name('notifications.count');

// Route::get('/notifications/count', function () {

//     return response()->json([
//         'count' => Auth::user()->unreadNotifications->count(),
//     ]);
// });


    Route::get('/notifications', [NotificationController::class, 'index'])->name('notifications.index');

    // البروفايل
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::get('/profile/{user}', [ProfileController::class, 'show'])->name('profile.show');
// Route::get('/profile/{id}/followers', [ProfileController::class, 'followers'])->name('profile.followers');
// Route::get('/profile/{id}/followings', [ProfileController::class, 'followings'])->name('profile.followings');
// صفحة البروفايل لأي مستخدم (عرض)
// Route::get('/profileindex/{id}', [ProfileController::class, 'show'])->name('profile.show');

// المتابعين والمتابَعين
Route::get('/profile/{id}/followers', [ProfileController::class, 'followers'])->name('profile.followers');
Route::get('/profile/{id}/followings', [ProfileController::class, 'followings'])->name('profile.followings');
Route::get('/profile/{id}/seephoto', [ProfileController::class, 'seephoto'])->name('profile.seephoto');

// storys
    Route::get('/stories', [StoryController::class, 'index'])->name('stories.index');
    Route::get('/stories/create', [StoryController::class, 'create'])->name('stories.create');
    Route::post('/stories', [StoryController::class, 'store'])->name('stories.store');
// متابعة وإلغاء متابعة
// Route::post('/profile/{id}/follow', [ProfileController::class, 'follow'])->name('profile.follow');
// Route::delete('/profile/{id}/unfollow', [ProfileController::class, 'unfollow'])->name('profile.unfollow');
    Route::post('/profile/update', [ProfileController::class, 'update'])->name('profile.update');
    Route::get('/profileindex', [ProfileController::class, 'profileindex'])->name('profileindex');
    Route::post('/profile/photo', [ProfileController::class, 'updateProfilePhoto'])->name('profile.photo');
    Route::post('/profile/cover', [ProfileController::class, 'updateCoverPhoto'])->name('profile.cover');
    Route::post('/profileindex', [ProfileController::class, 'storePost'])->name('profileindex.storePost');
    // Route::delete('/posts/{id}', [ProfileController::class, 'deletePost'])->name('posts.delete');
    Route::get('/profileindex/{id}', [ProfileController::class, 'show'])->name('profileindex.show');
    Route::post('/follow/{id}', [ProfileController::class, 'follow'])->name('profile.follow');
    Route::delete('/unfollow/{id}', [ProfileController::class, 'unfollow'])->name('profile.unfollow');
    // Route::post('/profile/update', [ProfileController::class, 'updateProfile'])->name('profile.updateProfile');

    // البوستات
    Route::get('/posts', [PostController::class, 'indexpost'])->name('posts.index');
    Route::post('/posts', [PostController::class, 'store'])->name('posts.store');
    Route::get('/posts/{post}/edit', [PostController::class, 'edit'])->name('posts.edit');
Route::put('/posts/{post}', [PostController::class, 'update'])->name('posts.update');
Route::delete('/posts/{post}', [PostController::class, 'destroy'])->name('posts.destroy');
    // الإعجابات

    Route::post('/posts/{post}/like', [LikeController::class, 'toggle'])->name('posts.like');

    // // التعليقات
    // Route::post('/posts/{post}/comments', [CommentController::class, 'store'])->name('comments.store');
    // Route::delete('/comments/{comment}', [CommentController::class, 'destroy'])->name('comments.destroy');
    // comments ajax
Route::get('/posts/{post}/comments', [\App\Http\Controllers\CommentController::class, 'index'])->name('comments.index');
Route::post('/posts/{post}/comments', [\App\Http\Controllers\CommentController::class, 'store'])->name('comments.store');
Route::delete('/comments/{comment}', [\App\Http\Controllers\CommentController::class, 'destroy'])->name('comments.destroy');


    // المتابعة
    Route::post('/follow/{user}', [FollowController::class, 'toggle'])->name('follow.toggle');
});
require __DIR__.'/auth.php';
