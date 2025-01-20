<nav id="sidebar" class="fixed top-16 left-0 bottom-0 w-64 bg-white border-r border-gray-200 transition-transform duration-300 ease-in-out z-40">
    <div class="py-4">
        <ul class="space-y-2">
            <li>
                <a href="{{ route('home') }}" class="nav-link flex items-center px-4 py-2 text-gray-700 hover:bg-gray-100 {{ request()->routeIs('home') ? 'bg-gray-100' : '' }}">
                    <i class="fas fa-home w-5"></i>
                    <span class="ml-3">Accueil</span>
                </a>
            </li>
            <li>
                <button class="w-full nav-link flex items-center justify-between px-4 py-2 text-gray-700 hover:bg-gray-100 cursor-pointer" id="coursButton">
                    <div class="flex items-center">
                        <i class="fas fa-book w-5"></i>
                        <span class="ml-3">Cours</span>
                    </div>
                    <i class="fas fa-chevron-down transform transition-transform duration-200" id="coursChevron"></i>
                </button>
                <ul id="coursSubmenu" class="pl-8 space-y-1 mt-1 {{ request()->routeIs('courses.*') || request()->routeIs('ajoutercours') ? '' : 'hidden' }}">
                    <li>
                        <a href="{{ route('courses.index') }}" class="nav-link flex items-center px-4 py-2 text-gray-700 hover:bg-gray-100 {{ request()->routeIs('courses.index') ? 'bg-gray-100' : '' }}">
                            <i class="fas fa-list w-5"></i>
                            <span class="ml-3">Liste</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('ajoutercours') }}" class="nav-link flex items-center px-4 py-2 text-gray-700 hover:bg-gray-100 {{ request()->routeIs('ajoutercours') ? 'bg-gray-100' : '' }}">
                            <i class="fas fa-plus w-5"></i>
                            <span class="ml-3">Ajouter cours</span>
                        </a>
                    </li>
                </ul>
            </li>
            // ...existing code...
        </ul>
    </div>
</nav>
