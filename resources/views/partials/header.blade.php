<header class="fixed top-0 left-0 right-0 h-16 bg-white border-b border-gray-200 z-50">
    <div class="flex items-center justify-between h-full px-4">
        <div class="flex items-center">
            <button id="menuToggle" class="p-2 hover:bg-gray-100 rounded-lg cursor-pointer">
                <i class="fas fa-bars text-gray-600"></i>
            </button>
            <img src="{{ asset('images/logo.jpeg') }}" alt="Logo" class="h-8 ml-4 rounded-full" />
        </div>
        <div class="flex items-center space-x-4">
            <button class="p-2 hover:bg-gray-100 rounded-lg relative">
                <i class="fas fa-bell text-gray-600"></i>
                <span class="absolute top-1 right-1 w-2 h-2 bg-red-500 rounded-full"></span>
            </button>
            <div class="flex items-center space-x-2">
                <img src="{{ asset('images/profile.jpeg') }}" alt="Profile" class="w-8 h-8 rounded-full object-cover" />
                <span class="text-sm font-medium text-gray-700">Akrem Alamine</span>
            </div>
        </div>
    </div>
</header>
