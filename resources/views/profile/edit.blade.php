@extends('layouts.app')

@section('content')
<style>
    .profile-edit-container {
        max-width: 750px;
        margin: 50px auto;
        background: #fff;
        border-radius: 15px;
        box-shadow: 0 4px 10px rgba(0,0,0,0.1);
        overflow: hidden;
    }

    .cover-preview {
        position: relative;
        width: 100%;
        height: 220px;
        background-color: #f0f0f0;
        overflow: hidden;
    }

    .cover-preview img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .change-cover {
        position: absolute;
        bottom: 10px;
        right: 10px;
        background: rgba(0,0,0,0.6);
        color: #fff;
        padding: 6px 15px;
        border-radius: 6px;
        cursor: pointer;
        font-size: 14px;
        transition: 0.3s;
    }

    .change-cover:hover {
        background: rgba(0,0,0,0.8);
    }

    .profile-content {
        padding: 30px;
    }

    .profile-edit-header {
        text-align: center;
        margin-bottom: 25px;
    }

    .profile-edit-header h2 {
        font-weight: bold;
        color: #333;
    }

    .avatar-preview {
        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: column;
    }

    .avatar-preview img {
        width: 120px;
        height: 120px;
        border-radius: 50%;
        object-fit: cover;
        border: 3px solid #198754;
        box-shadow: 0 0 5px rgba(0,0,0,0.2);
        margin-bottom: 10px;
        margin-top: -60px;
        background: #fff;
    }

    .form-label {
        font-weight: 600;
        color: #333;
    }

    .btn-save {
        background-color: #198754;
        color: white;
        font-weight: bold;
        padding: 10px 25px;
        border-radius: 8px;
        border: none;
        transition: 0.3s;
    }

    .btn-save:hover {
        background-color: #157347;
    }

    .form-control:focus {
        border-color: #198754;
        box-shadow: 0 0 5px rgba(25, 135, 84, 0.3);
    }
</style>

<div class="profile-edit-container">
    {{-- 🔹 عرض الكافر --}}
    <div class="cover-preview">
        @if ($user->cover_photo)
            <img src="{{ asset('storage/' . $user->cover_photo) }}" alt="Cover Photo">
        @else
            <img src="{{ asset('images/default-cover.jpg') }}" alt="Default Cover">
        @endif
        <label class="change-cover" for="cover">تغيير الغلاف</label>
    </div>

    <div class="profile-content">
        <div class="profile-edit-header">
            <h2>تعديل الملف الشخصي</h2>
            <p class="text-muted">قم بتحديث بياناتك وصورك.</p>
        </div>

        <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <input type="file" id="cover" name="cover_photo" class="form-control d-none">

            <div class="avatar-preview mb-4">
                @if ($user->avatar)
                    <img src="{{ asset('storage/' . $user->avatar) }}" alt="Avatar">
                @else
                    <img src="{{ asset('images/default-avatar.png') }}" alt="Default Avatar">
                @endif
                <label class="mt-2 text-muted">الصورة الشخصية الحالية</label>
            </div>

            <div class="mb-3">
                <label class="form-label">الاسم</label>
                <input type="text" name="name" value="{{ old('name', $user->name) }}" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">البريد الإلكتروني</label>
                <input type="email" name="email" value="{{ old('email', $user->email) }}" class="form-control" readonly>
            </div>

            <div class="mb-3">
                <label class="form-label">نبذة عنك</label>
                <textarea name="bio" rows="4" class="form-control" placeholder="اكتب شيئاً عن نفسك...">{{ old('bio', $user->bio) }}</textarea>
            </div>

            <div class="mb-4">
                <label class="form-label">تغيير الصورة الشخصية</label>
                <input type="file" name="avatar" class="form-control">
            </div>

            <div class="text-center">
                <button type="submit" class="btn-save">💾 حفظ التعديلات</button>
            </div>
        </form>
    </div>
</div>
@endsection
