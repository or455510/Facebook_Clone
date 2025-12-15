@extends('profile.master')
@section('conpro')
<style>
    .followers-container {
        max-width: 800px;
        margin: 40px auto;
        background: #fff;
        padding: 25px;
        border-radius: 15px;
        box-shadow: 0 4px 10px rgba(0,0,0,0.1);
    }

    .followers-container h2 {
        font-weight: bold;
        margin-bottom: 20px;
        text-align: center;
    }

    .followers-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(150px, 1fr));
        gap: 20px;
    }

    .follower-card {
        text-align: center;
        padding: 15px;
        border: 1px solid #eee;
        border-radius: 10px;
        transition: 0.3s;
    }

    .follower-card:hover {
        box-shadow: 0 2px 8px rgba(0,0,0,0.1);
        transform: scale(1.03);
    }

    .follower-card img {
        width: 90px;
        height: 90px;
        border-radius: 50%;
        object-fit: cover;
        margin-bottom: 10px;
    }

    .follower-card a {
        text-decoration: none;
        font-weight: bold;
        color: #198754;
    }
</style>

<div class="followers-container">
    <h2>المتابِعون لـ {{ $user->name }}</h2>

    @if($followers->count() > 0)
        <div class="followers-grid">
            @foreach($followers as $follower)
                <div class="follower-card">
                    <a href="{{ route('profileindex.show', $follower->id) }}">
                        <img src="{{ $follower->avatar ? asset('storage/'.$follower->avatar) : asset('images/default-avatar.png') }}" alt="{{ $follower->name }}">
                        <p>{{ $follower->name }}</p>
                    </a>
                </div>
            @endforeach
        </div>
    @else
        <p class="text-center text-muted">لا يوجد متابعين بعد 😅</p>
    @endif
</div>
@endsection
