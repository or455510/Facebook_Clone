    <style>

.cover-image-section {
	width: 100%;
	height: 250px;
	background-image: linear-gradient(#6FA702, #fff);

}
.cover-hader-site {
	position: relative;
	width: 70%;
	height: 100%;
	margin: auto;
}
.cover-hader-site img {
	width: 100%;
	height: 100%;
	object-fit: cover;
	cursor: pointer;
	border-radius: 0px 0px 10px 10px;
}

.cover-image-div {
	position: absolute;
	left: 0px;
	bottom: 0px;
	width: 100%;
	height: 50px;
}
.cover-image-edite-btn {
	text-align: right;
}
.cover-image-edite-btn button {
	padding: 7px 10px;
	border-radius: 5px;
	margin-top: 10px;
	margin-right: 20px;
	font-size: 13px;
	background-color: #fff;
	cursor: pointer;
	border: none;
	outline: none;
	color: #333;
}
.cover-image-edite-btn button:hover {
	background-color: #F2F2F2;
}
.cover-image-edite-btn button i {
	margin-right: 5px;
}


.profile-section {
	width: 100%;
}
.profile-section-in {
	width: 70%;
	height: 120px;
	border-bottom: 1px solid #3335;
	margin: auto;

	display: grid;
	grid-template-columns: 2fr 4fr 4fr;
}

.profile-image-div {
	position: relative;
	width: 125px;
	height: 125px;
	border: 3px solid #fff;
	margin-left: 20px;
	transform: translateY(-30px);
	background-color: #333;
	border-radius: 50%;
}
.profile-image-div img {
	width: 100%;
	height: 100%;
	border-radius: 50%;
	object-fit: cover;
	cursor: pointer;
	transition: 0.3s;
}
.profile-image-div img:hover {
	filter: brightness(0.9);
}

.profile-image-div span {
	position: absolute;
	right: 5px;
	bottom: 5px;
	cursor: pointer;
	padding: 5px 5px;
	border-radius: 50%;
	background-color: #d5d5d5;
	font-size: 18px;
	color: #333;
}

.profile-name-info h1 {
	margin-top: 20px;
	margin-left: 10px;
	font-size: 25px;
	color: #000;
}
.profile-name-info p {
	font-size: 14px;
	color: #333;
	margin-left: 10px;
}
.profile-name-info p span {
	cursor: pointer;
}
.friends-img-div {
	margin-left: 10px;
	margin-top: 5px;
	width: 200px;

	display: grid;
	grid-template-columns: repeat(8, 1fr);
}
.firend-img {
	width: 25px;
	height: 25px;
	border: 1px solid #fff;
	border-radius: 50%;
	background-color: #333;
	margin-left: -3px;
	cursor: pointer;
}
.firend-img img {
	width: 100%;
	height: 100%;
	object-fit: cover;
	border-radius: 50%;
	cursor: pointer;
}
.last-fi-div {
	position: relative;
	overflow: hidden;
	transform: translateX(-21px);
}

.b {
	transform: translateX(-3px);
}
.c {
	transform: translateX(-6px);
}
.d {
	transform: translateX(-9px);
}
.e {
	transform: translateX(-12px);
}
.f {
	transform: translateX(-15px);
}
.g {
	transform: translateX(-18px);
}
.last-fi-div span {
    position: absolute;
    top: -3px;
    left: -3px;
    width: 100%;
    height: 100%;
    border-radius: 50%;
    background-color: #3338;
    color: #fff8;
    padding: 8px 8px;
    font-size: 15px;
    cursor: pointer;
}

.btn-site-pro {
	width: 100%;
}

.profile-button-site span {
	padding: 7px 10px;
	border-radius: 5px;
	margin-top: 10px;
	margin-right: 5px;
	font-size: 13px;
	background-color: #1877F2;
	cursor: pointer;
	border: none;
	outline: none;
	color: #fff;
}
.profile-button-site span i {
	margin-right: 5px;
}
.profile-button-site span:hover {
	background-color: #1771E6;
}

.edit-profile-btn {
	background-color: #E4E6E9 !important;
	color: #333 !important;
}
.edit-profile-btn:hover {
	background-color: #D8DADF !important;
}

.btn-site-pro {
	margin-top: 75px;
	text-align: right;
}

.full-navbar {
	width: 100%;
	border-bottom: 1px solid #3335;
}
.navbar-site {
	width: 70%;
	margin: auto;
	display: grid;
	grid-template-columns: 4fr 1fr;
}
.navbar-site ul {
	padding: 0px;
	margin-bottom: 0px;
	margin-left: 5px;
}
.navbar-site ul a {
	text-decoration: none;
}
.navbar-site ul a li, .navbar-site ul li {
	display: inline-block;
	padding: 15px 12px;
	font-size: 14px;
	font-weight: bold;
	color: #707070;
	cursor: pointer;
	margin-left: -5px;
	transform: 0.3s;
}

.navbar-site ul a li:hover, .navbar-site ul li:hover {
	background-color: #E4E6E9;
}

.activ-navbar {
	position: relative;
	background-color: #fff !important;
	color: #1877F2 !important;
}
.activ-navbar i {
	color: #1877F2 !important;
}
.activ-navbar:after {
	position: absolute;
	content: '';
	bottom: 0px;
	left: 0px;
	width: 100%;
	height: 3px;
	background-color: #1877F2;
}

.nav-btn {
	text-align: right;
}
.nav-btn i {
	font-size: 16px;
	padding:7px 12px;
	background-color: #E4E6E9;
	border-radius: 5px;
	color: #707070;
	margin-top: 8px;
	cursor: pointer;
}
.nav-btn i:hover {
	background-color: #D8DADF;
	color: #333;
}

    </style>

    <section class="cover-image-section">
        <header class="cover-hader-site">
            @if ($user->cover_photo)
                <img src="{{ asset('storage/' . $user->cover_photo) }}" alt="Cover Photo">
            @else
                <img src="{{ asset('images/default-cover.jpg') }}" alt="Default Cover">
            @endif

            {{-- <div class="cover-image-div">
                <div class="cover-image-edite-btn">
                    <button>
                        <i class="fas fa-camera"></i>
                    </button>
                    {{-- <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <textarea name="content" placeholder="What's on your mind?"></textarea>
                        <input type="file" name="image">
                        <button type="submit">Post</button>
                    </form>

                </div>
            </div> --}}

        </header>
    </section>

    <section class="profile-section">
        <div class="profile-section-in">

            <div class="profile-image-site">
                <div class="profile-image-div">
                    <a href="#" id="profile-link">
                        <img id="Profile_images"
                            src="{{ $user->avatar ? asset('storage/' . $user->avatar) : asset('images/user.png') }}"
                            alt="profile-pic">
                    </a>
                    <span class="fas fa-camera"></span>
                </div>
            </div>
            <div class="profile-name-info">
                <h1>
                    <span class="pro-txt" id="profile_name">{{ $user->name }}</span>
                    <span id="nik-name"></span>
                </h1>
                <p>
                    <span class="fir-count-txt">

                        <div class="followers-info" style="display: flex;">

                            <strong>المتابِعون:</strong> {{ $followers->count() }} <br>
                            <strong>يتابع:</strong> {{ $followings->count() }}
                        </div>

                    </span>
                </p>
                @if (Auth::id() !== $user->id)
                    @if (Auth::user()->followings->contains($user->id))
                        <form action="{{ route('profile.unfollow', $user->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">إلغاء المتابعة</button>
                        </form>
                    @else
                        <form action="{{ route('profile.follow', $user->id) }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-primary">متابعة</button>
                        </form>
                    @endif
                @endif
                <div class="friends-img-div">
                    @php
                        $followersToShow = $user->followers->take(7); // أول 7 فقط
                        $hasMoreFollowers = $user->followers->count() > 7;
                    @endphp

                    @foreach ($followersToShow as $index => $follower)
                        <div class="firend-img {{ chr(97 + $index) }}"> {{-- a,b,c... --}}
                            <a href="{{ route('profileindex', $follower->id) }}">
                                <img id="frind-image-{{ $index + 1 }}"
                                    src="{{ $follower->avatar ? asset('storage/' . $follower->avatar) : asset('images/default-avatar.png') }}"
                                    alt="{{ $follower->name }}" title="{{ $follower->name }}">
                            </a>
                        </div>
                    @endforeach

                    @if ($hasMoreFollowers)
                        <div class="firend-img last-fi-div h">
                            <a href="{{ route('profile.followers', $user->id) }}">
                                <img src="{{ asset('images/friends/00.jpg') }}" alt="More">
                                <span class="fas fa-ellipsis-h"></span>
                            </a>
                        </div>
                    @endif
                </div>



            </div>

            <div class="btn-site-pro profile-button-site">
                @if (Auth::id() === $user->id)
                    <a href="{{ route('profile.edit', $user->id) }}">
                        <span class="edit-profile-btn btn">Edit Profile</span>
                    </a>
                    <a href="{{ route('stories.create') }}">
                        <span class="edit-profile-btn btn">add story</span>
                    </a>
                @endif
            </div>


        </div>
    </section>


    <section class="full-navbar">
        <nav class="navbar-site">

            <ul compact="txt-color-c">

                <a  href="{{ route('profileindex', $user->id) }}">
                    <li class=" txt-cc">posts</li>
                </a>
                <a  href="{{ route('profile.followers', $user->id) }}">
                    <li class=" txt-cc">Friends</li>
                </a>
                <a  href="{{ route('profile.seephoto', $user->id) }}" id="photo-nav">
                    <li class=" txt-cc">Photo</li>
                </a>

            </ul>

            <div class="nav-btn">
                <i class="fas fa-ellipsis-h"></i>
            </div>

        </nav>


    </section>
@yield('conpro')
