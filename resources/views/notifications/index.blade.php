<style>
    /* الحاوية العامة */
.container.notifications-page {
  max-width: 600px;
  margin: 0 auto;
  padding: 20px;
  background: #f0f2f5;
  border-radius: 8px;
}

/* عنوان الصفحة */
.container.notifications-page h3 {
  font-size: 22px;
  margin-bottom: 20px;
  color: #050505;
}

/* قائمة الإشعارات */
ul.notification-list {
  list-style: none;
  padding: 0;
  margin: 0;
}

/* عنصر إشعار مفرد */
ul.notification-list li.notification-item {
  display: flex;
  align-items: center;
  background: #fff;
  padding: 12px 16px;
  border-radius: 8px;
  margin-bottom: 10px;
  position: relative;
  transition: background 0.3s;
}

ul.notification-list li.notification-item:hover {
  background: #e4e6eb;
}

/* إذا كان الإشعار غير مقروء */
ul.notification-list li.notification-item.unread {
  background: #eef3ff;
}

/* النقطة الزرقاء للإشعار غير المقروء */
ul.notification-list li.notification-item.unread::before {
  content: "";
  width: 8px;
  height: 8px;
  background: #1877f2;
  border-radius: 50%;
  position: absolute;
  left: 12px;
  top: 16px;
}

/* محتوى الإشعار (نص ووقت) */
ul.notification-list li.notification-item .notification-content {
  margin-left: 50px;
}

ul.notification-list li.notification-item .notification-content p {
  margin: 0;
  color: #050505;
  font-size: 15px;
  line-height: 1.4;
}

ul.notification-list li.notification-item .notification-content small {
  color: #65676b;
  font-size: 13px;
  display: block;
  margin-top: 4px;
}

</style>

@extends('layouts.app')

@section('content')
<div class="container notifications-page mt-4">
    <h3 class="mb-3">الإشعارات 🔔</h3>

    @if($notifications->count() > 0)
        <ul class="notification-list">
            @foreach($notifications as $notification)
                <li class="notification-item {{ $notification->read_at ? '' : 'unread' }}">
                    <div class="notification-content">
                        @if(isset($notification->data['message']))
                            <p>{{ $notification->data['message'] }}</p>
                        @else
                            <p>إشعار جديد 🎉</p>
                        @endif
                        <small>{{ $notification->created_at->diffForHumans() }}</small>
                    </div>
                </li>
            @endforeach
        </ul>
    @else
        <p class="text-muted">لا توجد إشعارات حالياً 😴</p>
    @endif
</div>
@endsection
