@extends('master')

@section('con')
<!doctype html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>تغذية المنشورات - فيسبوك ستايل</title>
    <style>
        /* Reset & base */
        *{box-sizing:border-box;margin:0;padding:0}
        body{font-family:Poppins, system-ui, sans-serif;background:#f0f2f5;color:#111}
        a{color:inherit;text-decoration:none}

        /* layout */
        .wrapper{max-width:980px;margin:20px auto;padding:0 15px}
        .feed-container{max-width:700px;margin:0 auto}
        .post-card{background:#fff;border-radius:12px;box-shadow:0 1px 3px rgba(0,0,0,.08);margin-bottom:16px;padding:12px}
        .post-header{display:flex;align-items:center;justify-content:space-between}
        .post-user{display:flex;align-items:center;gap:10px}
        .post-user img{width:48px;height:48px;border-radius:50%;object-fit:cover}
        .post-info{display:flex;flex-direction:column}
        .post-info strong{font-size:15px}
        .post-info small{color:#6b6b6b;font-size:13px}

        /* menu */
        .post-menu{position:relative}
        .post-menu button{background:none;border:0;cursor:pointer;padding:6px;font-size:18px}
        .menu-dropdown{display:none;position:absolute;right:0;top:36px;background:#fff;border-radius:8px;box-shadow:0 8px 18px rgba(0,0,0,.12);overflow:hidden;min-width:160px}
        .menu-dropdown a, .menu-dropdown form button{display:block;padding:10px 12px;border:0;background:none;text-align:right;cursor:pointer}
        .menu-dropdown a:hover, .menu-dropdown form button:hover{background:#f3f4f6}

        /* content */
        .post-text{margin:10px 0;font-size:15px;line-height:1.45}
        .post-media img, .post-media video{width:100%;border-radius:10px;max-height:560px;object-fit:cover}

        /* actions */
        .post-actions{display:flex;justify-content:space-between;border-top:1px solid #e6e6e6;padding-top:8px;margin-top:10px}
        .post-actions .left-actions{display:flex;gap:8px}
        .post-actions button{background:none;border:0;padding:8px 12px;cursor:pointer;border-radius:8px}
        .post-actions button:hover{background:#f3f4f6}
        .reaction-count{color:#6b6b6b;font-size:14px}
        .like-active{color:#1877f2;font-weight:600}

        /* comments */
        .comments-section{margin-top:10px;border-top:1px solid #f0f0f0;padding-top:10px}
        .comment{display:flex;gap:8px;align-items:flex-start;padding:8px;border-radius:8px;margin-bottom:8px;background:#f4f6f8}
        .comment img{width:36px;height:36px;border-radius:50%;object-fit:cover}
        .comment-body{flex:1}
        .comment-body strong{display:block;font-size:14px}
        .comment-body p{font-size:14px;color:#222}
        .comment-time{font-size:12px;color:#6b6b6b}

        .comment-box{display:flex;gap:8px;align-items:center;margin-top:6px}
        .comment-box input{flex:1;padding:10px;border-radius:999px;border:1px solid #e0e0e0}
        .comment-box button{padding:8px 14px;border-radius:999px;background:#1877f2;color:#fff;border:0;cursor:pointer}

        /* stories */
        .story-galary{display:flex;gap:10px;overflow-x:auto;padding:10px 0;margin-bottom:16px}
        .story{min-width:120px;height:200px;border-radius:12px;background:#000;color:#fff;position:relative;overflow:hidden;flex-shrink:0}
        .story img.avatar{position:absolute;left:12px;top:12px;width:44px;height:44px;border-radius:50%;border:3px solid #1877f2;object-fit:cover}
        .story p{position:absolute;bottom:12px;width:100%;text-align:center;padding:0 6px;font-weight:600}

        /* responsive */
        @media (max-width:768px){.wrapper{padding:0 12px}.story{min-width:120px;height:170px}}
    </style>

</head>
<body>
<div class="wrapper">
    <div class="feed-container">

        {{-- stories (top) --}}
        <div class="story-galary">
            <a href="{{ route('stories.create') }}" class="story story1" style="background:linear-gradient(transparent, rgba(0,0,0,.4)), url('{{ asset('storage/' . auth()->user()->avatar) }}') center/cover no-repeat;">
                <img class="avatar" src="{{ asset('images/images/upload.png') }}" alt="add">
                <p>أنشر قصة</p>
            </a>

            @foreach($stories as $story)
                <div class="story" data-story-user="{{ $story->user->name }}" data-story-avatar="{{ $story->user->avatar ? asset('storage/' . $story->user->avatar) : asset('images/default-avatar.png') }}" data-story-image="{{ $story->image ? asset('storage/' . $story->image) : '' }}" data-story-video="{{ $story->video ? asset('storage/' . $story->video) : '' }}" data-story-text="{{ $story->text ?? '' }}" style="background-image: linear-gradient(transparent, rgba(0,0,0,.4)), url('{{ $story->image ? asset('storage/' . $story->image) : asset('images/story-placeholder.jpg') }}');">
                    <img class="avatar" src="{{ $story->user->avatar ? asset('storage/' . $story->user->avatar) : asset('images/default-avatar.png') }}" alt="{{ $story->user->name }}">
                    <p>{{ $story->user->name }}</p>
                </div>
            @endforeach
        </div>

        {{-- write post (simple) --}}
        <div class="post-card">
            <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div style="display:flex;gap:10px;align-items:flex-start">
                    <img src="{{ auth()->user()->avatar ? asset('storage/' . auth()->user()->avatar) : asset('images/default-avatar.png') }}" alt="avatar" style="width:48px;height:48px;border-radius:50%">
                    <div style="flex:1">
                        <textarea name="content" rows="2" placeholder="ماذا يدور في ذهنك؟" style="width:100%;border:1px solid #e7e7e7;border-radius:8px;padding:10px"></textarea>
                        <div style="display:flex;justify-content:space-between;align-items:center;margin-top:8px">
                            <input type="file" name="image">
                            <button type="submit" style="background:#1877f2;color:#fff;border:0;padding:8px 14px;border-radius:8px">نشر</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>

        {{-- posts loop --}}
        @forelse($posts as $post)
            <div class="post-card" data-post-id="{{ $post->id }}">
                <div class="post-header">
                    <div class="post-user">
                        <a href="{{ route('profileindex.show', $post->user->id) }}"><img src="{{ $post->user->avatar ? asset('storage/' . $post->user->avatar) : asset('images/default-avatar.png') }}" alt="avatar"></a>
                        <div class="post-info">
                            <strong><a href="{{ route('profileindex.show', $post->user->id) }}">{{ $post->user->name }}</a></strong>
                            <small>{{ $post->created_at->diffForHumans() }}</small>
                        </div>
                    </div>

                    <div class="post-menu">
                        <button type="button" onclick="toggleMenu(this)">⋮</button>
                        <div class="menu-dropdown">
                            @if(Auth::check() && Auth::id() === $post->user_id)
                                <a href="{{ route('posts.edit', $post->id) }}">تعديل المنشور</a>
                                <form action="{{ route('posts.destroy', $post->id) }}" method="POST" onsubmit="return confirm('هل تريد الحذف؟')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit">حذف</button>
                                </form>
                            @else
                                <a href="#">الإبلاغ</a>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="post-text">{!! nl2br(e($post->content)) !!}</div>

                @if($post->image)
                    <div class="post-media"><img src="{{ asset('storage/' . $post->image) }}" alt="post image"></div>
                @endif

                <div style="display:flex;justify-content:space-between;align-items:center;margin-top:8px">
                    <div class="reaction-count">{{ $post->likes->count() }} إعجاب • {{ $post->comments->count() }} تعليق</div>
                </div>

                <div class="post-actions">
                    <div class="left-actions">
                        <form class="like-form" data-post-id="{{ $post->id }}" method="POST" action="{{ route('posts.like', $post->id) }}">
                            @csrf
                            <button type="button" class="like-btn {{ $post->likes->where('user_id', auth()->id())->count() ? 'like-active' : '' }}">إعجاب</button>
                        </form>
                        <button class="open-comments-btn">تعليق</button>
                        <button class="share-btn">مشاركة</button>
                    </div>
                    <div>
                        <img src="{{ auth()->check() ? asset('storage/' . auth()->user()->avatar) : asset('images/default-avatar.png') }}" alt="me" style="width:36px;height:36px;border-radius:50%">
                    </div>
                </div>

                {{-- preview comments (last two) --}}
                {{-- <div id="comments-preview-{{ $post->id }}" class="comments-section">
                    @php
                        $lastComments = $post->comments()->with('user')->latest()->take(2)->get()->reverse();
                    @endphp
                    @forelse($lastComments as $comment)
                        <div class="comment" id="comment-{{ $comment->id }}" data-comment-id="{{ $comment->id }}">
                            <img src="{{ $comment->user->avatar ? asset('storage/' . $comment->user->avatar) : asset('images/default-avatar.png') }}" alt="avatar">
                            <div class="comment-body">
                                <strong>{{ $comment->user->name }}</strong>
                                <p>{!! e($comment->content) !!}</p>
                                <div class="comment-time">{{ $comment->created_at->diffForHumans() }}</div>
                            </div>
                        </div>
                    @empty
                        <div style="color:#6b6b6b;padding:6px">لا تعليقات بعد</div>
                    @endforelse

                    {{-- quick add under post --}
                    <form class="comment-form-ajax" data-post-id="{{ $post->id }}">
                        @csrf
                        <div class="comment-box">
                            <input type="text" name="content" placeholder="اكتب تعليقًا..." required>
                            <button type="submit">تعليق</button>
                        </div>
                    </form>
                </div> --}}
                <div id="comments-preview-{{ $post->id }}" class="comments-section">

    {{-- آخر تعليقين فقط --}}
    @php
        $lastComments = $post->comments()->with('user')->latest()->take(2)->get()->reverse();
    @endphp

    @foreach($lastComments as $comment)
        <div class="comment" id="comment-{{ $comment->id }}">
            <img src="{{ $comment->user->avatar ? asset('storage/' . $comment->user->avatar) : asset('images/default-avatar.png') }}" alt="avatar">
            <div class="comment-body">
                <strong>{{ $comment->user->name }}</strong>
                <p>{!! e($comment->content) !!}</p>
                <div class="comment-time">{{ $comment->created_at->diffForHumans() }}</div>
            </div>
        </div>
    @endforeach

    {{-- زر فتح كل التعليقات في Modal --}}
    @if($post->comments()->count() > 2)
        <button class="open-all-comments-btn" data-post-id="{{ $post->id }}"
            style="background:none;border:0;color:#1877f2;cursor:pointer;font-size:14px;margin-bottom:8px">
            عرض جميع التعليقات ({{ $post->comments()->count() }})
        </button>
    @endif

    {{-- الفورم أسفل التعليقات --}}
    <form class="comment-form-ajax" data-post-id="{{ $post->id }}">
        @csrf
        <div class="comment-box">
            <input type="text" name="content" placeholder="اكتب تعليقًا..." required>
            <button type="submit">تعليق</button>
        </div>
    </form>
</div>


            </div>
        @empty
            <div class="post-card">لا توجد منشورات حالياً.</div>
        @endforelse

    </div>
</div>

<!-- STORY modal -->
<div id="storyModal" style="display:none;position:fixed;inset:0;align-items:center;justify-content:center;background:rgba(0,0,0,.7);z-index:9999">
    <div style="background:#000;border-radius:10px;padding:10px;max-width:420px;width:90%;color:#fff;position:relative">
        <button id="closeStoryModal" style="position:absolute;top:8px;left:8px;background:transparent;border:0;color:#fff;font-size:24px">&times;</button>
        <div id="storyModalHeader" style="display:flex;gap:8px;align-items:center;padding:8px;border-bottom:1px solid rgba(255,255,255,.08)"></div>
        <div id="storyModalBody" style="padding:12px"></div>
    </div>
</div>

<script>
    // helper: close all menus when clicking outside
    document.addEventListener('click', function(e){
        document.querySelectorAll('.menu-dropdown').forEach(m => {
            const btn = m.previousElementSibling;
            if(btn && !btn.contains(e.target) && !m.contains(e.target)) m.style.display = 'none';
        });
    });

    function toggleMenu(btn){
        const menu = btn.nextElementSibling;
        menu.style.display = menu.style.display === 'block' ? 'none' : 'block';
    }

    // stories popup
    document.querySelectorAll('.story').forEach(story => {
        story.addEventListener('click', () => {
            if(story.classList.contains('story1')) return window.location.href = "{{ route('stories.create') }}";
            const user = story.dataset.storyUser;
            const avatar = story.dataset.storyAvatar;
            const image = story.dataset.storyImage;
            const video = story.dataset.storyVideo;
            const text = story.dataset.storyText;

            document.getElementById('storyModalHeader').innerHTML = `<img src="${avatar}" style="width:44px;height:44px;border-radius:50%"> <strong>${user}</strong>`;
            const body = document.getElementById('storyModalBody');
            body.innerHTML = '';
            if(image){ body.innerHTML = `<img src="${image}" style="width:100%;border-radius:8px">`; }
            else if(video){ body.innerHTML = `<video src="${video}" controls autoplay style="width:100%;border-radius:8px"></video>`; }
            else if(text){ body.innerHTML = `<div style="padding:16px;text-align:center">${text}</div>`; }
            else { body.innerHTML = `<div style="padding:16px;text-align:center">لا يوجد محتوى</div>`; }

            document.getElementById('storyModal').style.display = 'flex';
        });
    });
    document.getElementById('closeStoryModal').addEventListener('click', ()=> document.getElementById('storyModal').style.display = 'none');

    // Like (AJAX) — delegation
    document.addEventListener('click', async function(e){
        if(e.target.matches('.like-btn')){
            const btn = e.target;
            const form = btn.closest('.like-form');
            const postId = form.dataset.postId;
            const token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
            try{
                const res = await fetch(`/posts/${postId}/like`, {method:'POST',headers:{'X-CSRF-TOKEN':token}});
                if(!res.ok) throw new Error('Network');
                const json = await res.json();
                // expected { success: true, likes_count: N, liked: true/false, comments_count: N }
                if(json.liked) btn.classList.add('like-active'); else btn.classList.remove('like-active');
                // update count display (simple)
                const card = btn.closest('.post-card');
                if(card && typeof json.likes_count !== 'undefined') {
                    const commentsCount = typeof json.comments_count !== 'undefined' ? json.comments_count : card.querySelectorAll('.comment').length;
                    card.querySelector('.reaction-count').textContent = `${json.likes_count} إعجاب • ${commentsCount} تعليق`;
                }
            }catch(err){console.error(err);alert('حصل خطأ أثناء الإعجاب');}
        }

        // open comments
        if(e.target.matches('.open-comments-btn')){
            const card = e.target.closest('.post-card');
            const preview = card.querySelector('.comments-section');
            if(preview) preview.style.display = preview.style.display === 'block' ? 'none' : 'block';
        }

        // delete comment (delegated)
        if(e.target.matches('.btn-delete-comment')){
            if(!confirm('هل تريد حذف التعليق؟')) return;
            const commentId = e.target.dataset.commentId;
            const token = document.querySelector('meta[name="csrf-token"]').content;
            const res = await fetch(`/comments/${commentId}`, { method:'DELETE', headers:{'X-CSRF-TOKEN':token}});
            const json = await res.json();
            if(json.success){
                document.querySelector(`#comment-${commentId}`)?.remove();
                // update parent post count if provided
                if(typeof json.comments_count !== 'undefined'){
                    // find parent card by data-post-id if available
                    const anyCard = document.querySelector(`[data-post-id]`);
                    // safer: update all reaction-counts (or you can target specific)
                    document.querySelectorAll('.reaction-count').forEach(el => {
                        // won't set exact likes here; keep it simple
                        // optionally you can request a fresh post state
                    });
                }
            } else alert(json.message || 'خطأ في الحذف');
        }
    });

    // submit comment form (delegation)
    document.addEventListener('submit', async function(e){
        if(e.target.matches('.comment-form-ajax')){
            e.preventDefault();
            const form = e.target;
            const postId = form.dataset.postId;
            const input = form.querySelector('input[name="content"]');
            const content = input.value.trim();
            if(!content) return;
            const token = document.querySelector('meta[name="csrf-token"]').content;
            try{
                const res = await fetch(`/posts/${postId}/comments`, {
                    method:'POST',
                    headers:{'Content-Type':'application/json','X-CSRF-TOKEN':token},
                    body:JSON.stringify({content})
                });
                const json = await res.json();
                if(!json.success) throw new Error(json.message||'خطأ');
                // safe DOM insertion:
                const preview = document.getElementById(`comments-preview-${postId}`);
                if(preview){
                    const div = document.createElement('div');
                    div.className = 'comment';
                    div.id = `comment-${json.comment.id}`;
                    // json.comment.user.avatar should already be a full URL from backend
                    div.innerHTML = `<img src="${json.comment.user.avatar}" alt="avatar"><div class="comment-body"><strong>${escapeHtml(json.comment.user.name)}</strong><p>${escapeHtml(json.comment.content)}</p><div class="comment-time">الآن</div></div>`;

                    // try insert before the comment-box if it is a direct child of preview
                    const commentBox = preview.querySelector('.comment-box');
                    if(commentBox && commentBox.parentNode === preview){
                        preview.insertBefore(div, commentBox);
                    } else {
                        // fallback safe insert at top
                        preview.prepend(div);
                    }
                } else {
                    console.warn('preview container not found for post:', postId);
                }

                input.value = '';
                // update counts
                const card = document.querySelector(`.post-card[data-post-id='${postId}']`);
                if(card){
                    const commentsCount = typeof json.comments_count !== 'undefined' ? json.comments_count : card.querySelectorAll('.comment').length;
                    // keep likes as-is, just update comment count part
                    const reactionEl = card.querySelector('.reaction-count');
                    if(reactionEl){
                        // extract likes number from existing text if possible
                        const cur = reactionEl.textContent || '';
                        const likesMatch = cur.match(/^(\d+)\s*إعجاب/);
                        const likes = likesMatch ? likesMatch[1] : '';
                        reactionEl.textContent = (likes !== '' ? likes + ' إعجاب • ' : '') + `${commentsCount} تعليق`;
                    }
                }
            }catch(err){console.error(err);alert(err.message||'خطأ في الإرسال')}
        }
    });

    function escapeHtml(text){return String(text).replace(/&/g,'&amp;').replace(/</g,'&lt;').replace(/>/g,'&gt;').replace(/"/g,'&quot;').replace(/'/g,'&#039;');}
</script>
<!-- Modal عرض كل التعليقات -->
<div id="allCommentsModal"
     style="display:none;position:fixed;inset:0;background:rgba(0,0,0,.55);z-index:99999;align-items:center;justify-content:center">

    <div style="background:#fff;width:95%;max-width:600px;max-height:80vh;overflow-y:auto;
                border-radius:10px;padding:15px;position:relative">

        <button id="closeAllComments"
            style="position:absolute;top:10px;left:10px;border:0;background:none;font-size:26px;cursor:pointer">&times;</button>

        <h3 style="margin-bottom:10px;text-align:center;font-size:18px">كل التعليقات</h3>

        <div id="allCommentsContainer"></div>

    </div>
</div>
<script>
    document.addEventListener('click', async function(e){
        if(e.target.matches('.open-all-comments-btn')){
            const postId = e.target.dataset.postId;
            const modal = document.getElementById('allCommentsModal');
            const container = document.getElementById('allCommentsContainer');
            container.innerHTML = 'جار التحميل...';
            modal.style.display = 'flex';

            try{
                const res = await fetch(`/posts/${postId}/comments/all`);
                if(!res.ok) throw new Error('Network response was not ok');
                const json = await res.json();
                if(!json.success) throw new Error(json.message || 'خطأ في التحميل');

                // بناء التعليقات
                container.innerHTML = '';
                json.comments.forEach(comment => {
                    const div = document.createElement('div');
                    div.className = 'comment';
                    div.id = `comment-${comment.id}`;
                    div.innerHTML = `<img src="${comment.user.avatar ? comment.user.avatar : '{{ asset('images/default-avatar.png') }}'}" alt="avatar">
                                     <div class="comment-body">
                                         <strong></strong>${escapeHtml(comment.user.name)}</strong>
                                            <p>${escapeHtml(comment.content)}</p>
                                         </div>`;
                    container.appendChild(div);
                });
            }catch(err){
                console.error(err);
                container.innerHTML = 'فشل تحميل التعليقات.';
            }
        } else if(e.target.id === 'closeAllComments'){
            document.getElementById('allCommentsModal').style.display = 'none';
        }
    });
</script>
<script>
    // إغلاق المودال عند النقر خارجه
    document.getElementById('allCommentsModal').addEventListener('click', function(e){
        if(e.target === this){
            this.style.display = 'none';
        }
    });

</script>
<script>
    // إغلاق مودال القصة عند النقر خارجه
    document.getElementById('storyModal').addEventListener('click', function(e){
        if(e.target === this){
            this.style.display = 'none';
        }
    });
</script>
<script>
    // إغلاق مودال القصة عند النقر على زر الإغلاق
    document.getElementById('closeStoryModal').addEventListener('click', function(){
        document.getElementById('storyModal').style.display = 'none';
    });
</script>
<script>
    // إغلاق مودال التعليقات عند النقر على زر الإغلاق
    document.getElementById('closeAllComments').addEventListener('click', function(){
        document.getElementById('allCommentsModal').style.display = 'none';
    });
</script>
<script>
    // إغلاق مودال التعليقات عند النقر خارجه
    document.getElementById('allCommentsModal').addEventListener('click', function(e){
        if(e.target === this){
            this.style.display = 'none';
        }
    });
</script>
<script>
    // فتح مودال كل التعليقات
document.addEventListener("click", async function(e){

    if(e.target.matches(".open-all-comments-btn")){
        const postId = e.target.dataset.postId;

        // إظهار المودال
        const modal = document.getElementById("allCommentsModal");
        const container = document.getElementById("allCommentsContainer");

        modal.style.display = "flex";
        container.innerHTML = "<div style='padding:20px;text-align:center'>جاري التحميل...</div>";

        // طلب جلب التعليقات
        const res = await fetch(`/posts/${postId}/comments`);
        const json = await res.json();

        if(json.success){
            container.innerHTML = "";
            json.comments.forEach(c => {
                container.innerHTML += `
                <div class="comment" id="comment-${c.id}" style="margin-bottom:10px;background:#f4f6f8;padding:8px;border-radius:8px;display:flex;gap:10px">
                    <img src="${c.user.avatar}" style="width:36px;height:36px;border-radius:50%">
                    <div>
                        <strong>${c.user.name}</strong>
                        <p>${c.content}</p>
                        <div style="font-size:12px;color:#777">${c.created_at}</div>
                    </div>
                </div>`;
            });
        }
    }
});

// إغلاق المودال
document.getElementById("closeAllComments").onclick = () => {
    document.getElementById("allCommentsModal").style.display = "none";
};

</script>
</body>
</html>
@endsection
