<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>SocialBook</title>

    <link rel="stylesheet" href="style.css" />


</head>

<body>
    <!-- <-----------------Nav Bar ------------------>
    <nav>
        <div class="nav-left">
            <h1 class="logo">Facebook</h1>
            <ul>
                <li>
                    {{-- <img src="./images/images/notification.png" alt="notification" /> --}}
                <li class="nav-item dropdown">
                    <a class="nav-link position-relative" href="{{ route('notifications.index') }}">
                        <img src="{{ asset('./images/images/notification.png') }}" alt="notifications" width="25">
                        <span id="notification-count"
                            class="badge bg-danger position-absolute top-0 start-100 translate-middle rounded-pill">
                        </span>
                    </a>
                </li>

                <script>
                    document.addEventListener('DOMContentLoaded', () => {
                        function fetchNotifications() {
                            fetch('{{ route('notifications.count') }}')
                                .then(response => response.json())
                                .then(data => {
                                    const badge = document.getElementById('notification-count');
                                    badge.textContent = data.count > 0 ? data.count : '';
                                });
                        }

                        fetchNotifications();
                        setInterval(fetchNotifications, 10000); // يحدث العدد كل 10 ثواني
                    });
                </script>

                </li>
                <li><a href="/messages"><img src="./images/images/inbox.png" alt="notification" /></a></li>
                {{-- <li><img src="./images/images/video.png" alt="notification" /></li> --}}
            </ul>
        </div>
        <div class="nav-right">
            <div class="search-box">
                <img src="./images/images/search.png" alt="" />
                <input type="text" placeholder="Search" />
            </div>
            <div class="nav-user-icon online" onclick="settingsMenuToggle()">
                {{-- <img src="./images/images/profile-pic.png" alt="" />
                @if (Route::has('login'))
                    <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                        @auth
                            <a href="{{ url('/dashboard') }}"
                                class="text-sm text-gray-700 dark:text-gray-500 underline">Dashboard</a>
                        @else
                            <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log
                                in</a>

                            @if (Route::has('register'))
                                <a href="{{ route('register') }}"
                                    class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
                            @endif
                        @endauth
                    </div>
                @endif --}}
                <div class="user-profile">
                    <div>
<div class="online"></div>

                        <a href="/profileindex"> <img src="{{ asset('storage/' . auth()->user()->avatar) }}"
                                alt="user">
                        </a>
                        @auth
                            <p>{{ Auth::user()->name }}</p>
                        @else
                            <p>Guest</p>
                        @endauth
                        <a href="#"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            تسجيل الخروج
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display:none;">
                            @csrf
                        </form>


                    </div>
                </div>

                <!-- <---------------------------Drop Down List ------------------------ -->
                <div class="settings-menu">

                    <div id="dark-btn">
                        <span>

                        </span>
                    </div>
                    <div class="settings-menu-inner">

                        <div class="user-profile">
                            <img src="{{ asset('storage/' . auth()->user()->avatar) }}" alt="profile-pic">
                            <div>
                                <p>John</p>
                                <a href="#"> See Your Profile</a>
                            </div>
                            <div class="user-profile">
                                <img src="./images/images/feedback.png" alt="profile-pic">
                                <div>
                                    <p>Give FeedBack</p>
                                    <a href="#">Help us to improve more</a>
                                </div>

                            </div>


                        </div>
                    </div>
    </nav>

    <!-- <------------------------Main --------------------------->
    <div class="container">
        <!--------- Left Side Bar -------------->
        <div class="left-side-bar">
            <div class="imp-links">
                <a href="#"><img src="./images/images/news.png" alt="news-image" />Latest
                    News</a>
                <a href="#"><img src="./images/images/friends.png" alt="news-image" />Friends</a>
                <a href="#"><img src="./images/images/group.png" alt="news-image" />Groups</a>
                <a href="#"><img src="./images/images/marketplace.png" alt="news-image" />Market Place</a>
                <a href="#"><img src="./images/images/watch.png" alt="news-image" />Watch</a>
                <a href="#">See More</a>
            </div>
            {{-- <div class="shortcut-links">
                <p>Your Shortcuts</p>
                <a href="#"><img src="./images/images/shortcut-1.png" alt="shortcut-image" />Web Developers</a>
                <a href="#"><img src="./images/images/shortcut-2.png" alt="shortcut-image" />Web Design Course</a>
                <a href="#"><img src="./images/images/shortcut-3.png" alt="shortcut-image" />Full Stack
                    Development</a>
                <a href="#"><img src="./images/images/shortcut-4.png" alt="shortcut-image" />Website Experts</a>
            </div> --}}
        </div>









        @yield('con')

<!-- Comments Modal -->
<div id="commentsModal" class="comments-modal" aria-hidden="true">
    <div class="comments-modal-inner">
        <button id="closeCommentsModal" class="close-modal">&times;</button>

        <div class="comments-modal-header">
            <h3>التعليقات</h3>
            <div class="modal-comment-count">(<span id="modalCommentCount">0</span>)</div>
        </div>

        <div id="commentsModalList" class="comments-modal-list">
            <!-- سيتم تحميل التعليقات هنا عبر Ajax -->
        </div>

        <form id="modalCommentForm" class="modal-comment-form" style="margin-top:12px;">
            @csrf
            <input type="hidden" id="modalPostId" value="">
            <div style="display:flex; gap:8px;">
                <input type="text" id="modalCommentInput" name="content" placeholder="اكتب تعليقك..." style="flex:1;" required>
                <button type="submit" class="btn_cer">نشر</button>
            </div>
        </form>
    </div>
</div>

<style>
/* بسيط ومرتب للـ modal + التعليقات */
.comments-modal {
  display: none;
  position: fixed;
  inset: 0;
  background: rgba(0,0,0,0.7);
  z-index: 99999;
  align-items: center;
  justify-content: center;
}
.comments-modal.active { display: flex; }
.comments-modal-inner {
  width: 100%;
  max-width: 680px;
  background: #fff;
  border-radius: 8px;
  padding: 16px;
  box-shadow: 0 6px 30px rgba(0,0,0,0.4);
  max-height: 80vh;
  overflow: auto;
}
.close-modal {
  position: absolute;
  right: 22px;
  top: 20px;
  background: #eee;
  border: 0;
  font-size: 20px;
  width: 36px;
  height: 36px;
  border-radius: 50%;
  cursor: pointer;
}
.comments-modal-list .comment-row {
  display:flex;
  gap:12px;
  align-items:flex-start;
  padding:10px 0;
  border-bottom: 1px solid #eee;
}
.comment-avatar { width:44px; height:44px; border-radius:50%; object-fit:cover; }
.comment-body { flex: 1; }
.comment-body .comment-author { display:block; font-weight:700; }
.comment-body .comment-text { margin:6px 0; }
.btn-delete-comment { background: transparent; border: 0; color: #c0392b; cursor: pointer; font-size: 13px; }
.comment-input { display:flex; gap:8px; margin-top:8px; }
.btn_cer { background:#1877f2; color:#fff; border:0; padding:6px 10px; border-radius:6px; cursor:pointer; }
.open-comments-btn { background: transparent; border: 0; color: #1877f2; cursor:pointer; }
</style>

























        <!--------- Right Side Bar ------------->
        <div class="right-side-bar">


            <div class="sidebar-title">
                <h4>Advertisements</h4>
                <a href="#">Close</a>
            </div>

            <img src="./images/images/advertisement.png" alt="adv-image" class="sidebar-ads" />

            <div class="sidebar-title">
                <h4>Conversation</h4>
                <a href="#">Hide Chat</a>
            </div>



            @forelse ($followers as $follower)
                <a href="{{ route('profileindex.show', $follower->id) }}">
                    <div class="online-list">
                        <div class="online">


                            <img src="{{ $follower->avatar ? asset('storage/' . $follower->avatar) : asset('/public/storage/avatars/user.jpg') }}"
                                alt="{{ $follower->name }}">

                        </div>
                        <p><a href="{{ route('profileindex', $follower->id) }}">{{ $follower->name }}</a></p>
                    </div>
                </a>
            @empty
                <p class="text-center text-muted">لا يوجد متابعون بعد</p>
            @endforelse

            {{--
            <div class="online-list">
                <div class="online">
                    <img src="./images/images/member-2.png" alt="image-of-person" />
                </div>
                <p>Jackson</p>
            </div>

            <div class="online-list">
                <div class="online">
                    <img src="./images/images/member-3.png" alt="image-of-person" />
                </div>
                <p>Samona</p>
            </div>
        </div>
    </div> --}}

            <div class="fotter">
                <p>&copy Copyright 2025 - ENG_Omar Ramadan</p>
            </div>



            <script src="script.js"></script>

</body>

</html>
