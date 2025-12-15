<!DOCTYPE html>
<html lang="en">

<head>

    <title>Facebook</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="all.min.css">

    <link rel="stylesheet" href="/public/styleprofile.css">

</head>
<style>

</style>
<body>
    <div class="popop-background"></div>
    <div class="thim-div">
        <div class="hadr-thim-bar">
            <span id="thim-button" class="fas fa-caret-right"></span>

            <p>Backgroun</p>
            <div class="bg-color">
                <div id="bg-c-1" class="bg-color-1"></div>
                <div id="bg-c-2" class="bg-color-2"></div>
                <div id="bg-c-3" class="bg-color-3"></div>
                <div id="bg-c-4" class="bg-color-4"></div>
                <div id="bg-c-5" class="bg-color-5"></div>
                <div id="bg-c-6" class="bg-color-6"></div>
            </div>
            <br>
            <p>Text Color</p>
            <div class="bg-color">
                <div id="txt-c-1" class="bg-color-1"></div>
                <div id="txt-c-2" class="bg-color-2"></div>
                <div id="txt-c-3" class="bg-color-3"></div>
                <div id="txt-c-4" class="bg-color-4"></div>
                <div id="txt-c-5" class="bg-color-5"></div>
                <div id="txt-c-6" class="bg-color-6"></div>
            </div>

        </div>
    </div>



    <section class="cover-image-section">
        <header class="cover-hader-site">
            @if ($user->cover_photo)
                <img src="{{ asset('storage/' . $user->cover_photo) }}" alt="Cover Photo">
            @else
                <img src="{{ asset('images/default-cover.jpg') }}" alt="Default Cover">
            @endif

            <div class="cover-image-div">
                <div class="cover-image-edite-btn">
                    <button>
                        <i class="fas fa-camera"></i>
                    </button>
                    {{-- <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <textarea name="content" placeholder="What's on your mind?"></textarea>
                        <input type="file" name="image">
                        <button type="submit">Post</button>
                    </form> --}}

                </div>
            </div>

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

    @foreach($followersToShow as $index => $follower)
        <div class="firend-img {{ chr(97 + $index) }}"> {{-- a,b,c... --}}
            <a href="{{ route('profileindex.show', $follower->id) }}">
                <img
                    id="frind-image-{{ $index + 1 }}"
                    src="{{ $follower->avatar ? asset('storage/' . $follower->avatar) : asset('images/default-avatar.png') }}"
                    alt="{{ $follower->name }}"
                    title="{{ $follower->name }}"
                >
            </a>
        </div>
    @endforeach

    @if($hasMoreFollowers)
        <div class="firend-img last-fi-div h">
            <a href="{{ route('profile.followers', $user->id) }}">
                <img src="{{ asset('images/friends/00.jpg') }}" alt="More">
                <span class="fas fa-ellipsis-h"></span>
            </a>
        </div>
    @endif
</div>



            </div>

            <div class="profile-button-site">
					<div class="btn-site-pro">
						<span>
							<i class="fas fa-plus-circle"></i>
							Add to Storry
						</span>
						<a href="{{ route('profile.edit') }}" class="edit-profile-btn">
							<i class="fas fa-pen"></i>
                            Edit Profile
						</a>
					</div>
				</div>

        </div>
    </section>


    <section class="full-navbar">
        <nav class="navbar-site">

            <ul compact="txt-color-c">
                <a href="#">
                    <li class=" txt-cc activ-navbar">Posts</li>
                </a>
                <a href="#">
                    <li class=" txt-cc">About</li>
                </a>
                <a href="#">
                    <li class=" txt-cc">Friends</li>
                </a>
                <a href="#" id="photo-nav">
                    <li class=" txt-cc">Photo</li>
                </a>
                <a href="#" id="video-nav">
                    <li class=" txt-cc">Video</li>
                </a>
                <a href="#" id="likes-nav">
                    <li class=" txt-cc">Likes</li>
                </a>
                <a href="#">
                    <li class=" txt-cc">More <i class="fas fa-caret-down"></i></li>
                </a>
            </ul>

            <div class="nav-btn">
                <i class="fas fa-ellipsis-h"></i>
            </div>

        </nav>


    </section>


    <section class="post-section">
        <div class="post-section-in">

            <section class="info-section">

                <div class="profile-lock-div">
                    <div class="icon-pld">
                        <i class="fab fa-keycdn"></i>
                    </div>
                    <div class="pld-text">
                        <h3>You locked your profile</h3>
                        <a href="#">Learn More</a>
                    </div>
                </div>
                {{--
                <div class="about-info">
                    <h4>Intro</h4>

                    <p id="bio-text">MD Mehedi Hasan</p>
                    <div class="bio-btn-click">
                        <input class="input-box" type="text" value="MD Mehedi Hasan">
                        <p class="length-count-txt">
                            <span id="length-count">101</span> characters remaining
                        </p>
                        <div class="putlic-c-o-btn">
                            <div>
                                <p><span class="fas fa-globe-europe"></span> Public</p>
                            </div>
                            <div class="button-site-js">
                                <button id="cencel-btn">Cencel</button>
                                <button id="save-btn">Save</button>
                            </div>
                        </div>
                    </div>
                    <button id="bio-edit-btn" class="edit-bio btn">Edit Bio</button>

                    <ul>
                        <li><i class="fas fa-briefcase"></i> Works at
                            <a href="#">Sad Mia</a>
                        </li>

                        <li><i class="fas fa-graduation-cap"></i> Went to
                            <a href="#">kamarkhali high school</a>
                        </li>

                        <li><i class="fas fa-home"></i> Lives in
                            <a href="#">Dhaka, Bangladesh</a>
                        </li>

                        <li><i class="fas fa-map-marker-alt"></i> From
                            <a href="#">Faridpur, Dhaka, Bangladesh</a>
                        </li>
                        <li><i class="fas fa-heart"></i> Single</li>
                        <li><i class="fas fa-globe"></i> <a href="#">
                                sadmia.com
                            </a></li>
                    </ul>

                    <button class="edit-bio btn">Edit Details</button>

                    <div class="Hobbies-show">
                        <span><i class="fas fa-laptop-code"></i> Learning to Code</span>

                        <span><i class="fas fa-laptop-code"></i>Code</span>

                        <span><i class="fas fa-book"></i>Learning</span>

                        <span><i class="fas fa-camera-retro"></i>Photography</span>
                    </div>

                    <button class="edit-bio btn">Edit Hobbies</button>

                    <div class="Featured-site">

                        <div class="Featured-img-div">
                            <img id="post-image-12" src="images/friends/0.jpg">
                        </div>

                        <div class="Featured-img-div">
                            <img id="post-image-11" src="images/friends/0.jpg">
                        </div>

                        <div class="Featured-img-div">
                            <img id="post-image-9" src="images/friends/0.jpg">
                        </div>

                        <div class="Featured-img-div">
                            <img id="post-image-8" src="images/friends/0.jpg">
                        </div>

                    </div>

                    <button class="edit-bio btn">Edit Featured</button>
                </div> --}}

                <div class="box-design images-site">

                    <span>Photos</span>

                    <div class="see-all-images"><a href="#">See All Photos</a></div>

                    <div class="at9-images">
                        @foreach ($posts as $post)
                            @if ($post->image)
                                <div class="images-div">
                                    <img src="{{ asset('storage/' . $post->image) }}" alt="">
                                </div>
                            @endif
                        @endforeach

                    </div>

                </div>

<div class="box-design friends-site">
    <div class="followers-info mt-4">
        <strong>المتابِعون:</strong> {{ $followers->count() }} <br>
        <strong>المتابَعون:</strong> {{ $followings->count() }}
    </div>

<div class="see-all-images">
    <a href="{{ route('profile.followers', $user->id) }}">عرض كل المتابعين</a> |
</div>

    <div class="at9-images">
        @forelse ($followers as $follower)
            <div class="images-div">
                <a href="{{ route('profileindex.show', $follower->id) }}">
                    <img src="{{ $follower->avatar ? asset('storage/'.$follower->avatar) : asset('/public/storage/avatars/user.jpg') }}" alt="{{ $follower->name }}">
                </a>
                <p><a href="{{ route('profileindex.show', $follower->id) }}">{{ $follower->name }}</a></p>
            </div>
        @empty
            <p class="text-center text-muted">لا يوجد متابعون بعد</p>
        @endforelse
    </div>
</div>
<div class="box-design friends-site mt-4">
    <span>يتابع</span>
    <div class="see-all-images">
    <a href="{{ route('profile.followings', $user->id) }}">عرض من يتابعهم</a>
</div>

    <div class="at9-images">
        @forelse ($followings as $following)
            <div class="images-div">
                <a href="{{ route('profileindex.show', $following->id) }}">
                    <img src="{{ $following->avatar ? asset('storage/'.$following->avatar) : asset('/public/storage/avatars/user.jpg') }}" alt="{{ $following->name }}">
                </a>
                <p><a href="{{ route('profileindex.show', $following->id) }}">{{ $following->name }}</a></p>
            </div>
        @empty
            <p class="text-center text-muted">لا يتابع أحد بعد</p>
        @endforelse
    </div>
</div>


            </section>


            <section class="post-info">

                <div class="box-design">

                    <div class="post-upload-T">
                        <div class="profil-ing-div">
                            <a href="#" id="profile-link">
                            <img id="Profile_images"
                            src="{{ $user->avatar ? asset('storage/' . $user->avatar) : asset('images/user.png') }}"
                            alt="profile-pic">
                            </a>
                        </div>
                        @if (Auth::id() === $user->id)
                            <form action="{{ route('profileindex.storePost') }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="text-post">
                                    <textarea class="content" name="content" style="width: 100%;" class="form-control"
                                        placeholder="           اكتب ما تفكر فيه..."></textarea>
                                    <style>
                                        .content {
                                            display: flex;
                                            justify-content: center;
                                            align-items: center;

                                            width: 100%;
                                            height: 100%;
                                            border-radius: 25px;

                                        }
                                    </style>
                                </div>
                                <input type="file" name="image" class="form-control mt-2">
                                <button class="btn btn-primary mt-2">نشر</button>
                            </form>
                        @endif
                    </div>

                </div>

                <div class="box-design post-filter">

                    <div class="filter-site">
                        <span>Posts</span>
                        <div class="fil-ter">
                            <button><i class="fas fa-sliders-h"></i> Filters</button>

                            <button><i class="fas fa-cog"></i> Manager Posts</button>
                        </div>
                    </div>

                    <div class="list-type">
                        <div class="fil-list activ-navbar">
                            <i class="fas fa-bars"></i> List View
                        </div>
                        <div class="fil-list">
                            <i class="fas fa-th-large"></i> Grid View
                        </div>
                    </div>

                </div>


                <!-- ************ Post ************ -->
                @if (isset($posts))

                    @foreach ($posts as $post)
                        <div class="box-design post-div">
                            <div class="post-infarmation">
                                <div>
                                    <div class="profil-ing-div post-profile-img">
                                        <a href="https://facebook.com/sadmia.page" id="profile-link">
                                            <img src="{{ asset('storage/' . $post->user->avatar) }}" alt="user">
                                        </a>
                                    </div>
                                </div>
                                <div class="post-three-dot">
                                    <p>{{ $post->user->name }}</p>
                                    <span>{{ $post->created_at->diffForHumans() }}</span>

                                </div>
                            </div>

                            <p class="post-text">{{ $post->content }}</p>
                            @if ($post->image)
                                <img class="post-img" src="{{ asset('storage/' . $post->image) }}" alt="Post image">
                            @endif

                            <div class="actavite">
                                <div><img src="{{ asset('images/like-blue.png') }}"> Like</div>
                                <div><img src="{{ asset('images/comment.png') }}"> Comment</div>
                                <div><img src="{{ asset('images/share.png') }}"> Share</div>
                            </div>
                            <div class="comment-site">
                                <div class="profil-ing-div">
                                    <a href="https://facebook.com/sadmia.page" id="profile-link">
                                            <img src="{{ asset('storage/' . $post->user->avatar) }}" alt="user">
                                    </a>
                                </div>
                                <div class="comment-input">
                                    <input type="text" placeholder="Write a comment…">
                                    <div class="comment-icon-div">
                                        <div>
                                            <i class="far fa-grin-alt"></i>
                                        </div>
                                        <div>
                                            <i class="fas fa-camera"></i>
                                        </div>
                                        <div>
                                            <img src="images/icon/gif.jpg">
                                        </div>
                                        <div>
                                            <img src="images/icon/sticer.jpg">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach

                @endif
                <!-- ************ End Post ************ -->


            </section>

        </div>

    </section>




    <script type="text/javascript" src="js/castom.js"></script>

    <style>

    </style>

</body>

</html>
