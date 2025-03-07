<nav class="bg-primary text-white p-4 fixed w-full top-0 z-50 shadow-md">
    <div class="container mx-auto flex justify-between items-center">
        <button class="text-3xl md:hidden" onclick="toggleSidebar()">☰</button>
        <a href="#" class="text-xl font-bold">Dashboard</a>
        <div class="hidden md:flex items-center space-x-4">
            @auth
            <div class="relative">
            <a href="{{ route('notifications') }}" class="text-white">
            <button onclick="toggleNotifications()" class="text-white">
    🔔 Notifications ({{ Auth::user()->unreadNotifications->count() }})
</button>
</a>
                <div id="notifications-dropdown" class="absolute right-0 bg-white text-black shadow-md hidden">
                    @foreach(Auth::user()->unreadNotifications as $notification)
                        <div class="p-2 border-b">
                            {{ $notification->data['message'] }}
                        </div>
                    @endforeach
                </div>
            </div>
            <span class="p-2">Hello, {{ Auth::user()->first_name }}!</span>
            @endauth
            <form action="{{ route('logout') }}" method="POST" id="logout-form" class="flex">
                @csrf
                <button type="submit" class="p-2 bg-red-500 hover:bg-red-600 rounded">Logout</button>
            </form>
        </div>
    </div>
</nav>

<script>
    function acceptLeave(leaveId) {
    fetch(`/leave/accept/${leaveId}`, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
        },
    })
    .then(response => response.json())
    .then(data => {
        // Update notification count dynamically
        document.getElementById('notification-count').innerText = `🔔 Notifications (${data.notificationCount})`;
        alert(data.message);
    })
    .catch(error => console.error('Error:', error));
}

function refuseLeave(leaveId) {
    fetch(`/leave/refuse/${leaveId}`, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
        },
    })
    .then(response => response.json())
    .then(data => {
        // Update notification count dynamically
        document.getElementById('notification-count').innerText = `🔔 Notifications (${data.notificationCount})`;
        alert(data.message);
    })
    .catch(error => console.error('Error:', error));
}

</script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
