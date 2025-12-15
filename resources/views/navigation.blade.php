<div class="container mt-4">
    <h3>🔔 إشعاراتك</h3>
    @foreach($notifications as $notification)
        <div class="card mb-2 p-3">
            {{ $notification->data['message'] }}
        </div>
    @endforeach
</div>

