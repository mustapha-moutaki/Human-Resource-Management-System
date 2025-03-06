<nav class="bg-primary text-white p-4 fixed w-full top-0 z-50 shadow-md">
    <div class="container mx-auto flex justify-between items-center">
        <button class="text-3xl md:hidden" onclick="toggleSidebar()">☰</button>
        <a href="#" class="text-xl font-bold">Dashboard</a>
        <div class="hidden md:flex space-x-4">
            <a href="#" class="hover:bg-blue-600 p-2 rounded">Profile</a>

            <div>
    <!-- Logout button -->
    <form action="{{ route('logout') }}" method="POST" id="logout-form">
        @csrf
        <button type="submit">Logout</button>
    </form>
</div>
        </div>
    </div>
</nav>
