<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Liste des Cours - LDS</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet" />
    <link href="https://ai-public.creatie.ai/gen_page/tailwind-custom.css" rel="stylesheet" />
    <script src="https://cdn.tailwindcss.com/3.4.5?plugins=forms@0.5.7,typography@0.5.13,aspect-ratio@0.4.2,container-queries@0.1.1"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body class="bg-gray-50">
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
    <nav id="sidebar" class="fixed top-16 left-0 bottom-0 w-64 bg-white border-r border-gray-200 transition-transform duration-300 ease-in-out z-40">
      <div class="py-4">
        <ul class="space-y-2">
          <li>
            <a href="{{ route('home') }}" class="nav-link flex items-center px-4 py-2 text-gray-700 hover:bg-gray-100">
              <i class="fas fa-home w-5"></i>
              <span class="ml-3">Accueil</span>
            </a>
          </li>
          <li>
            <a href="#" class="nav-link flex items-center px-4 py-2 text-gray-700 hover:bg-gray-100">
              <i class="fas fa-user-graduate w-5"></i>
              <span class="ml-3">Élèves</span>
            </a>
          </li>
          <li>
            <a href="#" class="nav-link flex items-center px-4 py-2 text-gray-700 hover:bg-gray-100">
              <i class="fas fa-history w-5"></i>
              <span class="ml-3">Session logs</span>
            </a>
          </li>
          <li>
            <a href="#" class="nav-link flex items-center px-4 py-2 text-gray-700 hover:bg-gray-100">
              <i class="fas fa-chart-line w-5"></i>
              <span class="ml-3">Activité élèves</span>
            </a>
          </li>
          <li>
            <a href="#" class="nav-link flex items-center px-4 py-2 text-gray-700 hover:bg-gray-100">
              <i class="fas fa-users w-5"></i>
              <span class="ml-3">Parent</span>
            </a>
          </li>
          <li>
            <a href="#" class="nav-link flex items-center px-4 py-2 text-gray-700 hover:bg-gray-100">
              <i class="fas fa-shopping-cart w-5"></i>
              <span class="ml-3">Commande en ligne</span>
            </a>
          </li>
          <li>
            <button type="button" class="w-full nav-link flex items-center justify-between px-4 py-2 text-gray-700 hover:bg-gray-100 cursor-pointer focus:outline-none" id="coursButton">
              <div class="flex items-center">
                <i class="fas fa-book w-5"></i>
                <span class="ml-3">Cours</span>
              </div>
              <i class="fas fa-chevron-down transition-transform duration-200" id="coursChevron"></i>
            </button>
            <ul id="coursSubmenu" class="pl-8 space-y-1 mt-1" style="display: none;">
              <li>
                <a href="{{ route('listecours') }}" class="nav-link flex items-center px-4 py-2 text-gray-700 hover:bg-gray-100">
                  <i class="fas fa-list w-5"></i>
                  <span class="ml-3">Liste</span>
                </a>
              </li>
              <li>
                <a href="{{ route('ajoutercours') }}" class="nav-link flex items-center px-4 py-2 text-gray-700 hover:bg-gray-100">
                  <i class="fas fa-plus w-5"></i>
                  <span class="ml-3">Ajouter cours</span>
                </a>
              </li>
            </ul>
          </li>
          <li>
            <a href="#" class="nav-link flex items-center px-4 py-2 text-gray-700 hover:bg-gray-100">
              <i class="fas fa-file-alt w-5"></i>
              <span class="ml-3">Examen</span>
            </a>
          </li>
          <li>
            <a href="#" class="nav-link flex items-center px-4 py-2 text-gray-700 hover:bg-gray-100">
              <i class="fas fa-gift w-5"></i>
              <span class="ml-3">Offre</span>
            </a>
          </li>
          <li>
            <a href="#" class="nav-link flex items-center px-4 py-2 text-gray-700 hover:bg-gray-100">
              <i class="fas fa-ticket-alt w-5"></i>
              <span class="ml-3">Coupon</span>
            </a>
          </li>
          <li>
            <a href="#" class="nav-link flex items-center px-4 py-2 text-gray-700 hover:bg-gray-100">
              <i class="fas fa-video w-5"></i>
              <span class="ml-3">Live</span>
            </a>
          </li>
          <li>
            <a href="#" class="nav-link flex items-center px-4 py-2 text-gray-700 hover:bg-gray-100">
              <i class="fas fa-layer-group w-5"></i>
              <span class="ml-3">Niveau</span>
            </a>
          </li>
          <li>
            <a href="#" class="nav-link flex items-center px-4 py-2 text-gray-700 hover:bg-gray-100">
              <i class="fas fa-tags w-5"></i>
              <span class="ml-3">Catégorie</span>
            </a>
          </li>
        </ul>
      </div>
    </nav>
    <main class="pt-16 pl-64 transition-all duration-300 ease-in-out" id="main-content">
        <div class="p-6">
            <div class="max-w-7xl mx-auto">
                <h1 class="text-3xl font-bold text-gray-900 mb-6">Liste des Cours</h1>
                
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6" id="courses-container">
                    @foreach($courses as $course)
                    <div class="bg-white rounded-lg shadow overflow-hidden course-card">
                        <div class="p-6">
                            <h2 class="text-xl font-semibold text-gray-900">{{ $course->title }}</h2>
                            <p class="text-sm text-gray-600 mt-2">{{ $course->teacher }}</p>
                            <div class="mt-2 flex items-center text-sm text-gray-500">
                                <i class="fas fa-layer-group mr-2"></i>
                                <span>{{ $course->level }}</span>
                            </div>
                            <div class="mt-2 flex items-center text-sm text-gray-500">
                                <i class="fas fa-folder mr-2"></i>
                                <span>{{ $course->category }}</span>
                            </div>
                            <div class="mt-4">
                                <span class="text-2xl font-bold text-custom">{{ $course->price }} DT</span>
                            </div>
                            <button class="mt-4 w-full bg-custom text-white px-4 py-2 rounded-lg hover:bg-custom-600 transition-colors duration-200 toggle-modules" data-course-id="{{ $course->id }}">
                                Voir le contenu
                            </button>
                            
                            <!-- Modules Section (Hidden by default) -->
                            <div class="mt-4 hidden modules-content" id="modules-{{ $course->id }}">
                                @foreach($course->modules as $module)
                                <div class="border-t pt-4">
                                    <h3 class="font-semibold text-gray-800">{{ $module->title }}</h3>
                                    <div class="ml-4">
                                        @foreach($module->chapters as $chapter)
                                        <div class="mt-2">
                                            <h4 class="text-gray-700">{{ $chapter->title }}</h4>
                                            <ul class="ml-4 list-disc text-sm text-gray-600">
                                                @foreach($chapter->lessons as $lesson)
                                                <li>{{ $lesson->title }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </main>

    <script src="{{ asset('js/sidebarHandler.js') }}"></script>
    <script src="{{ asset('js/listecoursscript.js') }}"></script>
</body>
</html>
