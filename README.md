# Facebook Clone (Laravel)

A Facebook-style social network built with Laravel 9. It implements the core
social features: posts, likes, comments, stories, follows, real-time private
chat, and notifications, on top of a Bootstrap admin template UI (Sneat).

## Features

- Posts with likes and comments
- Stories
- Follow / follower system
- Real-time private messaging with Laravel broadcasting over Pusher
  (`MessageSent` event on private `chat.{user}` channels)
- Notifications
- User profiles with profile management
- Email verification and full auth flow

## Tech Stack

- Laravel 9, PHP 8
- MySQL with Eloquent ORM
- Laravel Sanctum, Pusher (pusher-php-server)
- Blade with the Sneat Bootstrap template

## Getting Started

```bash
composer install
cp .env.example .env
php artisan key:generate
# set DB_* and PUSHER_* credentials in .env
php artisan migrate
php artisan serve
```
