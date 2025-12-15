@extends('layouts.app')

@section('content')
<div class="main">
    <div class="container py-4 chat-container">
    <h3 class="mb-3 text-center chat-header">
        <i class="fas fa-comment-dots text-primary"></i>
        محادثة بينك وبين {{ \App\Models\User::find($userId)->name }}
    </h3>

    <div id="messages-box" class="chat-box">
        @foreach($messages as $message)
            <div class="chat-message {{ $message->sender_id == Auth::id() ? 'sent' : 'received' }}">
                <div class="chat-bubble">
                    {{ $message->content }}
                </div>
            </div>
        @endforeach
    </div>

    <form id="message-form" class="mt-3 chat-form">
        @csrf
        <div class="input-group">
            <input type="text" name="content" id="message-input" class="form-control chat-input" placeholder="✏️ اكتب رسالة..." required>
            <button class="btn btn-primary chat-send-btn" type="submit">
                <i class="fas fa-paper-plane">send</i>
            </button>
        </div>
    </form>
</div>
</div>

{{-- 💅 استايل ماسنجر احترافي --}}
<style>
    .main{
        display: flex;
        align-items: center;
        justify-content: center;
        width: 100%;

    }
    .input-group{
        width: 100%;
        display: flex;
        align-items: center;
        justify-content: space-around;
    }
body {
    background-color: #f0f2f5;
    font-family: 'Tajawal', sans-serif;
}

/* الغلاف الرئيسي */
.chat-container {
    width: 80%;
    max-width: 700px;
    background: #fff;
    border-radius: 16px;
    padding: 25px;
    box-shadow: 0 2px 8px rgba(0,0,0,0.1);
}

/* العنوان */
.chat-header {
    color: #1877f2;
    font-weight: 700;
    border-bottom: 1px solid #ddd;
    padding-bottom: 10px;
    margin-bottom: 15px;
}

/* صندوق الرسائل */
.chat-box {
    height: 420px;
    overflow-y: auto;
    background: #f9fafb;
    border-radius: 12px;
    padding: 15px;
    border: 1px solid #e0e0e0;
    scroll-behavior: smooth;
}

/* الرسائل */
.chat-message {
    display: flex;
    margin-bottom: 10px;
    align-items: flex-end;
}

.chat-message.sent {
    justify-content: flex-end;
}

.chat-message.received {
    justify-content: flex-start;
}

/* الفقاعات */
.chat-bubble {
    max-width: 65%;
    padding: 10px 15px;
    border-radius: 18px;
    font-size: 15px;
    line-height: 1.4;
    word-wrap: break-word;
    box-shadow: 0 1px 2px rgba(0,0,0,0.1);
}

.chat-message.sent .chat-bubble {
    background-color: #0084ff;
    color: white;
    border-bottom-right-radius: 4px;
}

.chat-message.received .chat-bubble {
    background-color: #e4e6eb;
    color: #050505;
    border-bottom-left-radius: 4px;
}

/* شريط الكتابة */
.chat-form {
    border-top: 1px solid #ddd;
    padding-top: 10px;
}

.chat-input {
    border-radius: 25px;
    padding: 10px 15px;
    font-size: 15px;
}

.chat-send-btn {
    border-radius: 50%;
    width: 80px;
    height: 45px;
    margin-left: 8px;
    display: flex;
    align-items: center;
    justify-content: center;
    background-color: #1877f2;
}

.chat-send-btn i {
    color: white;
    font-size: 18px;
}

.chat-send-btn:hover {
    background-color: #166fe5;
}

/* Scrollbar أنيق */
.chat-box::-webkit-scrollbar {
    width: 6px;
}
.chat-box::-webkit-scrollbar-thumb {
    background-color: #ccc;
    border-radius: 3px;
}
.chat-box::-webkit-scrollbar-thumb:hover {
    background-color: #aaa;
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const form = document.getElementById('message-form');
    const input = document.getElementById('message-input');
    const box = document.getElementById('messages-box');
    const userId = "{{ $userId }}";

    // دايماً ينزل لآخر الرسائل
    box.scrollTop = box.scrollHeight;

    // إرسال الرسالة بدون Reload
    form.addEventListener('submit', function(e) {
        e.preventDefault();

        fetch(`/messages/${userId}`, {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                'Content-Type': 'application/json',
            },
            body: JSON.stringify({
                content: input.value
            })
        })
        .then(res => res.json())
        .then(data => {
            if (data.success) {
                input.value = '';
                loadMessages();
            }
        });
    });

    // تحديث الرسائل تلقائيًا كل 5 ثواني
    function loadMessages() {
        fetch(`/messages/${userId}`)
            .then(res => res.text())
            .then(html => {
                const parser = new DOMParser();
                const newDoc = parser.parseFromString(html, 'text/html');
                const newMessages = newDoc.querySelector('#messages-box').innerHTML;
                box.innerHTML = newMessages;
                box.scrollTop = box.scrollHeight;
            });
    }

    setInterval(loadMessages, 5000);

    // استقبال الرسائل الجديدة (Laravel Echo)
    if (window.Echo) {
        window.Echo.private(`chat.${userId}`)
            .listen('MessageSent', (e) => {
                const msg = document.createElement('div');
                msg.className = 'chat-message received';
                msg.innerHTML = `
                    <div class="chat-bubble">${e.message.content}</div>
                `;
                box.appendChild(msg);
                box.scrollTop = box.scrollHeight;
            });
    }
});
</script>
@endsection
