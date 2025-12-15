@extends('master')

@section('con')
<div class="main-content">

  {{-- إنشاء بوست جديد --}}
  <div class="write-post-container">
    <div class="user-profile">
      <img src="{{ asset('images/images/profile-pic.png') }}" alt="profile-pic">
      <div>
        <p>{{ Auth::user()->name ?? 'Guest' }}</p>
        <small>Public</small>
      </div>
    </div>

    <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
      @csrf
      <div class="post-input-conotainer">
        <textarea name="content" rows="3" placeholder="What's on your mind?"></textarea>
        <div class="add-post-links">
          <label>
        <button class="btnnewpost" type="submit" class="btn btn-primary mt-2">Post</button>
        <style>
            .btnnewpost{
                display: flex;
                justify-content: center;
                align-items: center;
                width: 70px;
                height: 30px;
                background-color:green ;
                font-size: 15px;
                padding: 10px;
                color:white;
                border-radius: 25px;
            }
        </style>

          </label>
        </div>
      </div>
    </form>
  </div>


</div>
@endsection
