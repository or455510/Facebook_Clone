@extends('profile.master')
@section('conpro')
    <style>
        .followers-container {
            max-width: 800px;
            margin: 40px auto;
            background: #fff;
            padding: 25px;
            border-radius: 15px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
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
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
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

        .images-div img {
            width: 100%;
            height: 80px;
            cursor: pointer;
            object-fit: cover;
            border-radius: 5px;
        }


        .images-div p {
            font-size: 11px;
            padding: 3px 5px;
            text-align: left;
            padding-bottom: 10px;
        }

        .images-div p a {
            text-decoration: none;
            color: #333;
        }

        .images-div p a:hover {
            text-decoration: underline;
        }
    </style>

    <div class="followers-container">
        <h2> الصور الشخصية ل {{ $user->name }}</h2>

        @if ($seephoto->count() > 0)
            <div class="followers-grid">
                @foreach ($seephoto as $seephoto)
                    <div class="follower-card">
                        <div class="images-div">
                            <img src="{{ asset('/public/storage/' . $seephoto->image) }}" alt="">
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <p class="text-center text-muted">لا يوجد صور </p>
        @endif
    </div>
@endsection
