@extends('layouts.app')

@section('content')
<div class="container" style="max-width:800px;">
    <h2 class="mb-4">تعديل البروفايل</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $err)
                    <li>{{ $err }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
        @csrf
        {{-- لو بتستخدم method PUT في الروت: @method('PUT') --}}

        <div class="mb-3">
            <label for="name" class="form-label">الاسم</label>
            <input type="text" name="name" id="name"
                   class="form-control" value="{{ old('name', $user->name) }}" required>
        </div>

        <div class="mb-3">
            <label for="bio" class="form-label">السيرة (Bio)</label>
            <textarea name="bio" id="bio" rows="4" class="form-control" maxlength="500">{{ old('bio', $user->bio) }}</textarea>
            <small class="form-text text-muted">حد أقصى 500 حرف</small>
        </div>

        <div class="mb-3">
            <label class="form-label">الصورة الحالية</label>
            <div class="mb-2">
                @if($user->avatar)
                    <img id="avatarPreview" src="{{ asset('storage/'.$user->avatar) }}" alt="avatar" style="width:110px; height:110px; object-fit:cover; border-radius:8px;">
                @else
                    <img id="avatarPreview" src="{{ asset('images/default-avatar.png') }}" alt="avatar" style="width:110px; height:110px; object-fit:cover; border-radius:8px;">
                @endif
            </div>

            <label for="avatar" class="form-label">تغيير الصورة الشخصية</label>
            <input type="file" name="avatar" id="avatar" accept="image/*" class="form-control">
            <small class="text-muted">JPG/PNG - حجم أقصى: 2MB</small>
        </div>

        <div class="d-flex gap-2">
            <button type="submit" class="btn btn-primary">حفظ التعديلات</button>
            <a href="{{ url()->previous() }}" class="btn btn-secondary">إلغاء</a>
        </div>
    </form>
</div>

{{-- صورة المعاينة --}}
<script>
document.getElementById('avatar')?.addEventListener('change', function(e){
    const input = e.target;
    if (!input.files || !input.files[0]) return;
    const file = input.files[0];
    const reader = new FileReader();
    reader.onload = function(ev){
        const img = document.getElementById('avatarPreview');
        if(img) img.src = ev.target.result;
    };
    reader.readAsDataURL(file);
});
</script>
@endsection
