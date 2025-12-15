@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h4 class="fw-bold mb-3 text-primary"><i class="fas fa-history"></i> القصص</h4>

    <div class="story-galary">
        {{-- ✅ أول مربع لإضافة قصة جديدة --}}
        <div class="story add-story" onclick="window.location.href='{{ route('stories.create') }}'">
            <div class="add-overlay">
                <i class="fas fa-plus-circle"></i>
                <p>أضف قصة</p>
            </div>
        </div>

        {{-- ✅ عرض القصص من قاعدة البيانات --}}
        @foreach ($stories as $story)
            <div class="story" onclick="openStoryModal('{{ $story->id }}')">
                {{-- صورة المستخدم --}}
                <img src="{{ asset('storage/' . $story->user->avatar) }}" alt="user" class="story-avatar">
                <p class="story-username">{{ $story->user->name }}</p>

                {{-- محتوى القصة --}}
                @if ($story->image)
                    <div class="story-background" style="background-image:url('{{ asset('storage/' . $story->image) }}')"></div>
                @elseif ($story->video)
                    <div class="story-background">
                        <video muted autoplay loop>
                            <source src="{{ asset('storage/' . $story->video) }}" type="video/mp4">
                        </video>
                    </div>
                @elseif ($story->text)
                    <div class="story-background story-text-only d-flex align-items-center justify-content-center">
                        <p class="story-text">{{ $story->text }}</p>
                    </div>
                @endif

                <div class="story-overlay"></div>
            </div>
        @endforeach
    </div>
</div>

{{-- ✅ نافذة عرض القصة --}}
<div class="modal fade" id="storyModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content story-modal-content">
            <div class="modal-header border-0">
                <h5 class="modal-title"><i class="fas fa-book-open"></i> عرض القصة</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="إغلاق"></button>
            </div>
            <div class="modal-body text-center story-modal-body">
                <div id="story-content"></div>
            </div>
        </div>
    </div>
</div>

{{-- ✅ تنسيقات احترافية تشبه فيسبوك --}}
<style>
body {
    background-color: #f0f2f5;
    font-family: 'Tajawal', sans-serif;
}

.story-galary {
    display: flex;
    gap: 15px;
    overflow-x: auto;
    padding: 10px 5px;
    scroll-behavior: smooth;
}

.story {
    flex: 0 0 120px;
    height: 200px;
    border-radius: 15px;
    position: relative;
    overflow: hidden;
    cursor: pointer;
    background: #ccc;
    transition: transform 0.3s ease;
}

.story:hover {
    transform: scale(1.03);
}

.story-background {
    position: absolute;
    top: 0; left: 0;
    width: 100%;
    height: 100%;
    background-size: cover;
    background-position: center;
}

.story-background video {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.story-avatar {
    position: absolute;
    top: 8px;
    left: 8px;
    width: 38px;
    height: 38px;
    border-radius: 50%;
    border: 3px solid #1877f2;
    z-index: 2;
    background-color: #fff;
}

.story-username {
    position: absolute;
    bottom: 8px;
    left: 0;
    width: 100%;
    text-align: center;
    color: #fff;
    font-weight: 600;
    font-size: 13px;
    text-shadow: 0 1px 3px rgba(0,0,0,0.6);
    z-index: 2;
}

.story-overlay {
    position: absolute;
    inset: 0;
    background: linear-gradient(to top, rgba(0,0,0,0.5), transparent 70%);
    z-index: 1;
}

/* ✅ القصة النصية فقط */
.story-text-only {
    background: linear-gradient(135deg, #1877f2, #42b72a);
    color: white;
    text-align: center;
    padding: 20px;
}

.story-text {
    font-size: 15px;
    font-weight: 500;
    line-height: 1.4;
}

/* ✅ إضافة قصة جديدة */
.add-story {
    background: #e4e6eb;
    display: flex;
    align-items: center;
    justify-content: center;
    color: #1877f2;
    border: 2px dashed #1877f2;
}

.add-story:hover {
    background: #f5f8ff;
}

.add-story i {
    font-size: 30px;
    margin-bottom: 5px;
}

.add-story p {
    font-size: 14px;
    font-weight: 600;
}

/* ✅ المودال */
.story-modal-content {
    background-color: #000;
    color: white;
    border-radius: 10px;
}

.story-modal-body img,
.story-modal-body video {
    max-width: 100%;
    border-radius: 10px;
}

.story-modal-body p {
    font-size: 18px;
    padding: 20px;
    color: #fff;
}
</style>

{{-- ✅ سكريبت عرض القصة في نافذة منبثقة --}}
<script>
function openStoryModal(id) {
    fetch(`/stories/${id}`)
        .then(res => res.json())
        .then(data => {
            const contentDiv = document.getElementById('story-content');
            contentDiv.innerHTML = '';
            if (data.image) {
                contentDiv.innerHTML = `<img src="/storage/${data.image}" alt="story">`;
            } else if (data.video) {
                contentDiv.innerHTML = `<video src="/storage/${data.video}" controls autoplay></video>`;
            } else if (data.text) {
                contentDiv.innerHTML = `<p>${data.text}</p>`;
            }
            new bootstrap.Modal(document.getElementById('storyModal')).show();
        });
}
</script>
@endsection
