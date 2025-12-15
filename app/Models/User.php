<?php

namespace App\Models;


// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;


class User extends Authenticatable
{
public function stories()
{
    return $this->hasMany(Story::class);
}

    use HasFactory, Notifiable;
protected $fillable = [
    'name',
    'email',
    'password',
    'bio',
    'avatar',
    'cover_photo', // ✅ أضف السطر ده
];


// المستخدمين اللي بمتابعهم
public function followers()
{
    return $this->belongsToMany(User::class, 'follows', 'followed_id', 'follower_id');
}

public function followings()
{
    return $this->belongsToMany(User::class, 'follows', 'follower_id', 'followed_id');
}

public function isFollowing(User $user)
{
    return $this->followings()->where('followed_id', $user->id)->exists();
}

    public function comments()
{
    return $this->hasMany(Comment::class);
}

    public function likes()
{
    return $this->hasMany(Like::class);
}

public function posts()
{
    return $this->hasMany(Post::class);
}


    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */


    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
