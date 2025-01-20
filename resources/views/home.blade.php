<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Accueil - LDS</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&amp;display=swap" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet" />
    <link href="https://ai-public.creatie.ai/gen_page/tailwind-custom.css" rel="stylesheet" />
    <script src="https://cdn.tailwindcss.com/3.4.5?plugins=forms@0.5.7,typography@0.5.13,aspect-ratio@0.4.2,container-queries@0.1.1"></script>
    <script src="https://ai-public.creatie.ai/gen_page/tailwind-config.min.js" data-color="#000000" data-border-radius="small"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/echarts/5.5.0/echarts.min.js"></script>
  </head>
  <body class="bg-gray-50">
    <header class="fixed top-0 left-0 right-0 h-16 bg-white border-b border-gray-200 z-50">
      <div class="flex items-center justify-between h-full px-4">
        <div class="flex items-center">
          <button id="menuToggle" class="p-2 hover:bg-gray-100 rounded-lg !rounded-button" onclick="toggleSidebar()">
            <i class="fas fa-bars text-gray-600"></i>
          </button>
          <img src="{{ asset('images/logo.jpeg') }}" alt="Logo" class="h-8 ml-4 rounded-full" />
        </div>
        <div class="flex items-center space-x-4">
          <button class="p-2 hover:bg-gray-100 rounded-lg relative !rounded-button">
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
            <a href="#" class="nav-link flex items-center px-4 py-2 text-gray-700 hover:bg-gray-100" data-page="accueil">
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
            <button class="w-full nav-link flex items-center justify-between px-4 py-2 text-gray-700 hover:bg-gray-100" data-submenu="cours">
              <div class="flex items-center">
                <i class="fas fa-book w-5"></i>
                <span class="ml-3">Cours</span>
              </div>
              <i class="fas fa-chevron-right transform transition-transform duration-200"></i>
            </button>
            <ul class="hidden pl-8 space-y-1 mt-1">
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
      <div class="p-6" id="page-content">
        <!-- Contenu dynamique sera injecté ici -->
      </div>
    </main>
    <template id="accueil-template">
      <div class="space-y-6">
        <div class="flex items-center justify-center h-[calc(100vh-4rem)] p-6">
          <div class="text-center">
            <h1 class="text-4xl font-bold text-gray-900 mb-4">Bienvenue sur votre plateforme E-learning</h1>
            <p class="text-xl text-gray-600">Commencez à gérer vos cours et vos élèves dès maintenant.</p>
          </div>
        </div>
      </div>
    </template>
    <script src="{{ asset('js/homescript.js') }}"></script>
  </body>
</html>