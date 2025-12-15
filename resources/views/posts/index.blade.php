@extends('layouts.app')

@section('content')

<div class="container">
    <div class="card mb-4 p-4">
        <div class="flex items-center space-x-4">
            <img src="{{ $user->avatar ? asset('storage/'.$user->avatar) : 'https://via.placeholder.com/150' }}" class="w-20 h-20 rounded-full">
            <div>
                <h2 class="text-xl font-bold">{{ $user->name }}</h2>
                <p>{{ $user->bio ?? 'لا توجد سيرة ذاتية' }}</p>

@if(Auth::id() !== $user->id)
    <button id="follow-btn" class="btn {{ Auth::user()->isFollowing($user) ? 'btn-danger' : 'btn-success' }}" data-user="{{ $user->id }}">
        {{ Auth::user()->isFollowing($user) ? 'إلغاء المتابعة' : 'متابعة' }}
    </button>
@endif

<p class="mt-2">
    <strong id="followers-count">{{ $user->followers()->count() }}</strong> متابعين |
    <strong>{{ $user->followings()->count() }}</strong> يتابعون
</p>

            </div>
        </div>
    </div>

    <h3 class="mb-3 text-lg font-semibold">بوستات {{ $user->name }}</h3>

    @foreach($posts as $post)
        <div class="card mb-3 p-3">
            <h5>{{ $post->user->name }}</h5>
            <p>{{ $post->content }}</p>

            @if($post->image)
                <img src="{{ asset('storage/'.$post->image) }}" class="img-fluid rounded mb-2">
            @endif

            {{-- زر الإعجاب --}}
            <form class="like-form d-inline" data-post-id="{{ $post->id }}">
                @csrf
                <button type="button" class="btn btn-sm btn-outline-primary">
                    👍 إعجاب (<span class="like-count">{{ $post->likes->count() }}</span>)
                </button>
            </form>

            {{-- التعليقات --}}
            <form class="comment-form mt-2" data-post="{{ $post->id }}">
                @csrf
                <input type="text" name="content" class="border p-1 w-full rounded" placeholder="اكتب تعليقك..." required>
                <button type="submit" class="bg-blue-500 text-white p-1 rounded mt-1">تعليق</button>
            </form>

            <div id="comments-{{ $post->id }}" class="mt-2">
                @foreach($post->comments as $comment)
                    <div class="comment border p-2 rounded mb-1">
                        <div class="flex items-center space-x-2 mb-1">
                            <img src="{{ asset('storage/'.$comment->user->avatar) }}" class="w-6 h-6 rounded-full">
                            <strong>{{ $comment->user->name }}</strong>
                        </div>
                        <p>{{ $comment->content }}</p>

                        @if($comment->user_id === Auth::id())
                            <button class="delete-comment text-red-500 text-sm" data-id="{{ $comment->id }}">حذف</button>
                        @endif
                    </div>
                @endforeach
            </div>
        </div>
    @endforeach
</div>

{{-- <script>
document.addEventListener("DOMContentLoaded", () => {
    // إضافة كومنت بدون إعادة تحميل
    document.querySelectorAll(".comment-form").forEach(form => {
        form.addEventListener("submit", async (e) => {
            e.preventDefault();
            const postId = form.dataset.post;
            const content = form.querySelector("input[name='content']").value;
            const token = document.querySelector('meta[name="csrf-token"]').content;

            const res = await fetch(`/posts/${postId}/comments`, {
                method: "POST",
                headers: { "Content-Type": "application/json", "X-CSRF-TOKEN": token },
                body: JSON.stringify({ content }),
            });

            const data = await res.json();
            if (data.success) {
                const list = document.querySelector(`#comments-${postId}`);
                const newComment = document.createElement("div");
                newComment.classList.add("comment");
                newComment.innerHTML = `
                    <div class="flex items-center space-x-2 mb-1">
                        <img src="${data.comment.user.avatar}" class="w-6 h-6 rounded-full" />
                        <strong>${data.comment.user.name}</strong>
                    </div>
                    <p>${data.comment.content}</p>
                `;
                list.prepend(newComment);
                form.reset();
            }
        });
    });

    // حذف كومنت بدون إعادة تحميل
    document.querySelectorAll(".delete-comment").forEach(btn => {
        btn.addEventListener("click", async () => {
            const commentId = btn.dataset.id;
            const token = document.querySelector('meta[name="csrf-token"]').content;

            const res = await fetch(`/comments/${commentId}`, {
                method: "DELETE",
                headers: { "X-CSRF-TOKEN": token },
            });

            const data = await res.json();
            if (data.success) {
                btn.closest(".comment").remove();
            }
        });
    });

    // الإعجاب
    document.querySelectorAll('.like-form button').forEach(btn => {
        btn.addEventListener('click', async () => {
            const form = btn.closest('.like-form');
            const postId = form.dataset.postId;
            const token = form.querySelector('input[name="_token"]').value;

            const res = await fetch(`/posts/${postId}/like`, {
                method: 'POST',
                headers: { 'X-CSRF-TOKEN': token }
            });

            if (res.ok) {
                const data = await res.json();
                form.querySelector('.like-count').textContent = data.likes_count;
                btn.classList.toggle('btn-outline-primary');
                btn.classList.toggle('btn-primary');
            }
        });
    });
});
</script> --}}

@endsection

<script>
document.addEventListener("DOMContentLoaded", () => {
    const followBtn = document.querySelector("#follow-btn");
    if(followBtn) {
        followBtn.addEventListener("click", async () => {
            const userId = followBtn.dataset.user;
            const token = document.querySelector('meta[name="csrf-token"]').content;

            const res = await fetch(`/users/${userId}/follow`, {
                method: "POST",
                headers: {
                    "X-CSRF-TOKEN": token,
                    "Accept": "application/json"
                }
            });

            const data = await res.json();
            if(data.following) {
                followBtn.textContent = "إلغاء المتابعة";
                followBtn.classList.remove("btn-success");
                followBtn.classList.add("btn-danger");
            } else {
                followBtn.textContent = "متابعة";
                followBtn.classList.remove("btn-danger");
                followBtn.classList.add("btn-success");
            }

            document.querySelector("#followers-count").textContent = data.followers_count;
        });
    }
});
</script>
