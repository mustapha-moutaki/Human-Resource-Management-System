<nav class="bg-primary text-white p-4 fixed w-full top-0 z-50 shadow-md">
    <div class="container mx-auto flex justify-between items-center">
        <button class="text-3xl md:hidden" onclick="toggleSidebar()">☰</button>
        <a href="#" class="text-xl font-bold">Dashboard</a>
        
        <!-- Flex container for Profile, Username, and Logout -->
        <div class="hidden md:flex items-center space-x-4">
          

            @auth
                <span class="p-2">Hello, {{ Auth::user()->first_name }}!</span>
            @endauth

            <!-- Logout button -->
            <form action="{{ route('logout') }}" method="POST" id="logout-form" class="flex">
                @csrf
                <button type="submit" class="p-2 bg-red-500 hover:bg-red-600 rounded">Logout</button>
            </form>
        </div>
    </div>
</nav>
