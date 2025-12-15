@extends('layouts.app')

@section('content')
    <div class="container mt-5 story-create-container">
        <div class="story-card shadow-lg">
            <div class="story-header text-center mb-4">
                <h2 class="fw-bold text-primary"><i class="fas fa-plus-circle"></i> إنشاء قصة جديدة</h2>
            </div>

            <form id="storyForm" action="{{ route('stories.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

        {{-- <div class="mb-3">
            <label class="form-label fw-bold">✍️ نص القصة (اختياري)</label>
            <textarea name="text" id="storyText" class="form-control" rows="3" placeholder="اكتب شيئًا..."></textarea>
        </div>

        <div class="mb-3">
            <label class="form-label fw-bold">🖼️ صورة (اختياري)</label>
            <input type="file" name="image" id="storyImage" class="form-control" accept="image/*">
        </div>

        <div class="mb-3">
            <label class="form-label fw-bold">🎥 فيديو (اختياري)</label>
            <input type="file" name="video" id="storyVideo" class="form-control" accept="video/*">
        </div> --}}



                {{-- حقل نص القصة --}}
                <div class="mb-4">
                    <label class="form-label fw-semibold"><i class="fas fa-pen"></i> نص القصة (اختياري)</label>
                    <textarea name="text"  id="storyText" class="form-control story-textarea" rows="4" placeholder="اكتب شيئاً يعبر عنك..."></textarea>
                </div>

                {{-- صورة --}}
                <div class="mb-4 upload-section">
                    <label class="form-label fw-semibold d-block"><i class="fas fa-image"></i> صورة (اختياري)</label>
                    <div class="upload-box">
                        <input type="file" id="storyImage"  name="image" id="image" class="form-control story-upload">
                        <div class="preview-image mt-2 text-center"></div>
                    </div>
                </div>

                {{-- فيديو --}}
                <div class="mb-4 upload-section">
                    <label class="form-label fw-semibold d-block"><i class="fas fa-video"></i> فيديو (اختياري)</label>
                    <div class="upload-box">
                        <input type="file" id="storyVideo" name="video" id="video" class="form-control story-upload">
                        <div class="preview-video mt-2 text-center"></div>
                    </div>
                </div>


        </div>
    </div>

    {{-- ✅ استايل احترافي مثل فيسبوك --}}
    <style>
        body {
            background-color: #f0f2f5;
            font-family: 'Tajawal', sans-serif;
        }

        .story-create-container {
            display: flex;
            justify-content: center;
            align-items: flex-start;
        }

        .story-card {
            background: #fff;
            border-radius: 15px;
            padding: 30px;
            width: 100%;
            max-width: 550px;
            border: 1px solid #e4e6eb;
            transition: 0.3s;
        }

        .story-card:hover {
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.08);
        }

        .story-header h2 {
            font-size: 22px;
            color: #1877f2;
        }

        .story-header p {
            font-size: 14px;
        }

        .story-textarea {
            border-radius: 10px;
            resize: none;
            transition: border-color 0.3s;
        }

        .story-textarea:focus {
            border-color: #1877f2;
            box-shadow: 0 0 4px rgba(24, 119, 242, 0.3);
        }

        .upload-section {
            position: relative;
        }

        .upload-box {
            border: 2px dashed #d0d0d0;
            border-radius: 12px;
            padding: 15px;
            background-color: #fafafa;
            text-align: center;
            cursor: pointer;
            transition: all 0.3s;
        }

        .upload-box:hover {
            border-color: #1877f2;
            background-color: #f5f8ff;
        }

        .story-upload {
            border: none;
            background: transparent;
        }

        .preview-image img,
        .preview-video video {
            border-radius: 10px;
            margin-top: 10px;
            max-width: 100%;
        }

        .story-submit {
            font-weight: 600;
            background-color: #1877f2;
            border: none;
            border-radius: 10px;
            padding: 10px;
            transition: background 0.3s;
        }

        .story-submit:hover {
            background-color: #166fe5;
        }
        .ditels{

            display: flex;
    align-items: center;
    justify-content: space-between;
width: 10%;
        }
        .btn_gr{
                display: flex;
    align-items: center;
    justify-content: center;

    border: 2px solid #6ce344;
    border-radius: 25px;
    color: white;
    font-size: 18px;
    padding: 10px;
    background-color: #44e351;
    text-decoration: none;
        }
        .btn_cer{
                display: flex;
    align-items: center;
    justify-content: center;

    border: 2px solid #4454e3;
    border-radius: 25px;
    color: white;
    font-size: 18px;
    padding: 10px;
    background-color: #4454e3;
    text-decoration: none;
        }
    </style>
    {{--
{{-- ✅ عرض الصورة أو الفيديو قبل الرفع --}}
    {{-- <script>
document.addEventListener("DOMContentLoaded", function() {
    const imageInput = document.getElementById('image');
    const videoInput = document.getElementById('video');

    imageInput.addEventListener('change', e => {
        const preview = document.querySelector('.preview-image');
        preview.innerHTML = '';
        const file = e.target.files[0];
        if (file) {
            const img = document.createElement('img');
            img.src = URL.createObjectURL(file);
            img.style.maxHeight = '200px';
            preview.appendChild(img);
        }
    });

    videoInput.addEventListener('change', e => {
        const preview = document.querySelector('.preview-video');
        preview.innerHTML = '';
        const file = e.target.files[0];
        if (file) {
            const video = document.createElement('video');
            video.src = URL.createObjectURL(file);
            video.controls = true;
            video.style.maxHeight = '200px';
            preview.appendChild(video);
        }
    });
});
</script> --}}
    {{-- @endsection --}}

    <div class="ditels">
        <button type="button" id="previewStoryBtn" class="btn btn-secondary btn_cer w-50 me-2"> معاينة القصة</button>
        <button type="submit" class="btn btn-success btn_gr w-50"> نشر القصة</button>
    </div>
    </form>
    </div>

    <!-- نافذة المعاينة المنبثقة -->
    <div id="storyPreviewModal" class="modal fade" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content shadow-lg border-0" style="border-radius:15px; overflow:hidden;">
                <div class="modal-header" style="background-color:#1877f2; color:white;">
                    <h5 class="modal-title btn_cer"> معاينة القصة</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body text-center" id="previewContent" style="background:#f8f9fa;">
                    <p class="text-muted">لم يتم إضافة أي محتوى بعد</p>
                </div>
                <div class="modal-footer d-flex justify-content-between">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">❌ إغلاق</button>
                    <button type="submit" form="storyForm" class="btn_gr btn-primary">✅ نشر الآن</button>
                </div>
            </div>
        </div>
    </div>

    {{-- 💅 تنسيق احترافي --}}
    <style>
        .modal-content {
            animation: popIn 0.3s ease;
        }

        @keyframes popIn {
            from {
                transform: scale(0.8);
                opacity: 0;
            }

            to {
                transform: scale(1);
                opacity: 1;
            }
        }

        #previewContent img,
        #previewContent video {
            max-width: 100%;
            border-radius: 10px;
            margin-top: 10px;
        }

        #previewContent .story-text {
            font-size: 18px;
            font-weight: 600;
            color: #050505;
            background: #fff;
            padding: 15px;
            border-radius: 12px;
            margin-top: 10px;
            display: inline-block;
        }
    </style>

    {{-- 🧠 سكربت المعاينة --}}
    <script>
        document.getElementById('previewStoryBtn').addEventListener('click', function() {
            const text = document.getElementById('storyText').value;
            const imageFile = document.getElementById('storyImage').files[0];
            const videoFile = document.getElementById('storyVideo').files[0];
            const preview = document.getElementById('previewContent');

            preview.innerHTML = ''; // تفريغ المحتوى القديم

            if (text) {
                const textDiv = document.createElement('div');
                textDiv.classList.add('story-text');
                textDiv.textContent = text;
                preview.appendChild(textDiv);
            }

            if (imageFile) {
                const img = document.createElement('img');
                img.src = URL.createObjectURL(imageFile);
                preview.appendChild(img);
            }

            if (videoFile) {
                const video = document.createElement('video');
                video.src = URL.createObjectURL(videoFile);
                video.controls = true;
                preview.appendChild(video);
            }

            if (!text && !imageFile && !videoFile) {
                preview.innerHTML = '<p class="text-muted">لم تضف أي محتوى بعد 😅</p>';
            }

            const modal = new bootstrap.Modal(document.getElementById('storyPreviewModal'));
            modal.show();
        });
    </script>
@endsection
