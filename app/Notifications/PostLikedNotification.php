<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;

class PostLikedNotification extends Notification
{
    use Queueable;

    protected $liker;
    protected $post;

    public function __construct($liker, $post)
    {
        $this->liker = $liker;
        $this->post = $post;
    }

    public function via($notifiable)
    {
        return ['database'];
    }

    public function toDatabase($notifiable)
    {
        return [
            'message' => "{$this->liker->name} أعجب بالمنشور الخاص بك ❤️",
            'post_id' => $this->post->id,
        ];
    }
}
