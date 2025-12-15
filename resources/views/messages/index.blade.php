@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <h2 class="mb-4 chat-title"><i class="fas fa-comments text-primary"></i> الرسائل</h2>

        <div class="list-group shadow-sm rounded chat-list">
            @foreach ($users as $user)
                @php
                    $lastMessage = \App\Models\Message::where(function ($q) use ($user) {
                        $q->where('sender_id', Auth::id())->where('receiver_id', $user->id);
                    })
                        ->orWhere(function ($q) use ($user) {
                            $q->where('sender_id', $user->id)->where('receiver_id', Auth::id());
                        })
                        ->orderBy('created_at', 'desc')
                        ->first();
                @endphp

                <a href="{{ route('messages.chat', ['user' => $user->id]) }}"
                    class="list-group-item list-group-item-action d-flex align-items-center justify-content-between chat-item">
                    <div class="d-flex align-items-center">
                        <div class="chat-avatar-wrapper">
                            <img src="{{ $user->avatar ? asset('storage/' . $user->avatar) : 'https://via.placeholder.com/40' }}"
                                class="rounded-circle me-3 chat-avatar" width="55" height="55" alt="avatar">
                            <span class="chat-status-dot online"></span>

                            <strong class="chat-username">{{ $user->name }}</strong><br>

                        </div>
                    </div>
                    <div>
                        <small class="text-muted chat-last-message">
                            {{ $lastMessage ? Str::limit($lastMessage->content, 30) : 'لا توجد رسائل بعد' }}
                        </small>
                        <small class="text-muted chat-time">
                            {{ $lastMessage ? $lastMessage->created_at->diffForHumans() : '' }}
                        </small>
                    </div>

                </a>
            @endforeach
        </div>
    </div>

    {{-- 💅 استايل احترافي معدّل --}}
    <style>
        body {
            background-color: #f0f2f5;
            font-family: 'Tajawal', sans-serif;
        }

        /* عنوان الصفحة */
        .chat-title {
            color: #1877f2;
            font-weight: 700;
            display: flex;
            align-items: center;
            gap: 10px;
            padding-right: 10px;
        }

        /* قائمة المحادثات */
        .chat-list {


            padding-left: 50px;
            background: #fff;
            border-radius: 12px;
            overflow: hidden;
            border: 1px solid #e4e6eb;
            padding-right: 15px;
            /* تزق المحتوى كله ناحية الشمال */
        }

        /* كل عنصر (شخص) */
        .chat-item {

            display: flex;
            align-items: center;
            justify-content: space-around;
            padding: 15px 20px;
            border: none;
            border-bottom: 1px solid #f0f2f5;
            transition: all 0.2s ease-in-out;
        }

        .chat-item:hover {
            background-color: #f5f6f7;
        }

        /* الصورة + النقطة */
        .chat-avatar-wrapper {
            position: relative;
            margin-right: 20px;
            /* تزق الصورة شوية من اليمين */
            display: flex;
            align-items: center;
        }

        /* الصورة */
        .chat-avatar {
            border: 2px solid #1877f2;
            box-shadow: 0 0 6px rgba(24, 119, 242, 0.3);
            border-radius: 50%;
            width: 55px;
            height: 55px;
            object-fit: cover;
        }

        /* النقطة الخضراء على يمين الصورة */
        .chat-status-dot {
            position: absolute;
            bottom: 5px;
            left: 50px;
            /* بدل ما تكون يمين، بقت على الجنب زي فيسبوك */
            width: 12px;
            height: 12px;
            border-radius: 50%;
            border: 2px solid #fff;
        }

        .chat-status-dot.online {
            background-color: #31a24c;
        }

        .chat-status-dot.offline {
            background-color: #ccc;
        }

        /* النصوص */
        .chat-username {
            font-size: 16px;
            color: #050505;
        }

        .chat-last-message {
            font-size: 13px;
            color: #65676b;
        }

        .chat-time {
            font-size: 12px;
            color: #90949c;
        }

        /* تفاعل العنصر */
        .list-group-item-action:focus,
        .list-group-item-action:hover {
            z-index: 1;
            text-decoration: none;
            color: #050505;
        }
    </style>
@endsection
