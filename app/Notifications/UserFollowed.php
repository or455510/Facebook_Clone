<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use App\Models\User;

class UserFollowed extends Notification
{
    use Queueable;

    public $follower;

    public function __construct(User $follower)
    {
        $this->follower = $follower;
    }

    public function via($notifiable)
    {
        return ['database'];
    }

    public function toArray($notifiable)
    {
        return [
            'message' => "{$this->follower->name} قام بمتابعتك 🎉",
            'follower_id' => $this->follower->id,
        ];
    }
}
