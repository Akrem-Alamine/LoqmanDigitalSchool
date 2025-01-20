<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Ajouter Cours - LDS</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet" />
    <link href="https://ai-public.creatie.ai/gen_page/tailwind-custom.css" rel="stylesheet" />
    <script src="https://cdn.tailwindcss.com/3.4.5?plugins=forms@0.5.7,typography@0.5.13,aspect-ratio@0.4.2,container-queries@0.1.1"></script>
    <script src="https://ai-public.creatie.ai/gen_page/tailwind-config.min.js" data-color="#000000" data-border-radius="small"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
  </head>
  <body class="bg-gray-50">
    <!-- Header -->
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
            <button class="w-full nav-link flex items-center justify-between px-4 py-2 text-gray-700 hover:bg-gray-100 cursor-pointer" id="coursButton">
              <div class="flex items-center">
                <i class="fas fa-book w-5"></i>
                <span class="ml-3">Cours</span>
              </div>
              <i class="fas fa-chevron-down transform transition-transform duration-200" id="coursChevron"></i>
            </button>
            <ul id="coursSubmenu" class="pl-8 space-y-1 mt-1 hidden transition-all duration-300">
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
    <!-- Main Content -->
    <main class="pt-16 pl-64 transition-all duration-300 ease-in-out" id="main-content">
      <div id="page-content" class="p-6">
        <div class="max-w-4xl mx-auto">
          <h1 class="text-3xl font-bold text-gray-900">Créer un Nouveau Cours</h1>
          <p class="mt-2 text-sm text-gray-600">Remplissez les informations ci-dessous pour créer votre cours.</p>
          <div class="bg-white shadow mt-6">
            <div class="p-6">
              <!-- Détails du Cours -->
              <div class="mb-8">
                <h2 class="text-xl font-semibold text-gray-900 cursor-pointer">
                  <div class="flex items-center justify-between toggle-section" data-target="course-details">
                    <span>Détails du Cours</span>
                    <i class="fas fa-chevron-down transition-transform"></i>
                  </div>
                </h2>
                <div id="course-details" class="mt-6 space-y-6 hidden">
                  <form id="courseForm" method="POST" action="{{ route('courses.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="mt-6 space-y-6">
                      <div class="grid grid-cols-2 gap-6">
                        <div>
                          <label class="block text-sm font-medium text-gray-700">Titre du cours *</label>
                          <input name="title" type="text" class="mt-1 block w-full border-gray-300 shadow-sm rounded-lg" placeholder="Entrez le titre du cours" required />
                        </div>
                        <div>
                          <label class="block text-sm font-medium text-gray-700">Enseignants *</label>
                          <select name="teacher" class="mt-1 block w-full border-gray-300 shadow-sm rounded-lg" required>
                            <option value="">Choisir un enseignant</option>
                            <option value="Sami">Sami</option>
                            <option value="Ali">Ali</option>
                          </select>
                        </div>
                        <div>
                          <label class="block text-sm font-medium text-gray-700">Catégorie *</label>
                          <select name="category" class="mt-1 block w-full border-gray-300 shadow-sm rounded-lg" required>
                            <option value="">Choisir une catégorie</option>
                            <option value="Math">Math</option>
                            <option value="Physique">Physique</option>
                            <option value="Arabe">Arabe</option>
                          </select>
                        </div>
                        <div>
                          <label class="block text-sm font-medium text-gray-700">Niveau *</label>
                          <select name="level" class="mt-1 block w-full border-gray-300 shadow-sm rounded-lg" required>
                            <option value="">Choisir un niveau</option>
                            <option value="5eme">5ème</option>
                            <option value="6eme">6ème</option>
                          </select>
                        </div>
                        <div>
                          <label class="block text-sm font-medium text-gray-700">Direction</label>
                          <select name="direction" class="mt-1 block w-full border-gray-300 shadow-sm rounded-lg">
                            <option value="LTR">LTR</option>
                            <option value="RTL">RTL</option>
                          </select>
                        </div>
                        <div>
                          <label class="block text-sm font-medium text-gray-700">Prix *</label>
                          <input name="price" type="number" step="0.01" class="mt-1 block w-full border-gray-300 shadow-sm rounded-lg" placeholder="Prix du cours" required />
                        </div>
                      </div>
                      
                      <!-- Description and Image side by side -->
                      <div class="grid grid-cols-2 gap-6">
                        <div>
                          <label class="block text-sm font-medium text-gray-700">Description *</label>
                          <textarea name="description" rows="8" class="mt-1 block w-full border-gray-300 shadow-sm rounded-lg" placeholder="Décrivez votre cours" required></textarea>
                        </div>
                        <div>
                          <label class="block text-sm font-medium text-gray-700">Image *</label>
                          <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-lg h-[calc(100%-2rem)]">
                            <div class="space-y-1 text-center self-center">
                              <i class="fas fa-cloud-upload-alt text-gray-400 text-3xl"></i>
                              <div class="flex text-sm text-gray-600">
                                <label class="relative cursor-pointer bg-white rounded-lg font-medium text-custom hover:text-custom-600">
                                  <span>Drag and drop a file here or click</span>
                                  <input name="image" type="file" class="sr-only" required />
                                </label>
                              </div>
                              <p class="text-xs text-gray-500">PNG, JPG jusqu'à 10MB</p>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </form>
                </div>
              </div>

              <!-- Separator -->
              <div class="border-t border-gray-200 my-6"></div>

              <!-- Contenu du Cours -->
              <div>
                <h2 class="text-xl font-semibold text-gray-900">
                  <div class="flex items-center justify-between toggle-section" data-target="modules">
                    <span>Contenu du Cours</span>
                    <i class="fas fa-chevron-down transition-transform"></i>
                  </div>
                </h2>
                <div id="modules" class="mt-6 space-y-6 hidden">
                  <button class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-lg shadow-sm text-white bg-custom hover:bg-custom-600" onclick="addModule(event)">
                    <i class="fas fa-plus mr-2"></i> Ajouter un Module
                  </button>
                  <div id="modules-container">
                    <!-- Modules will be added here dynamically -->
                  </div>
                </div>
              </div>

              <!-- Submit Button - Outside of both sections -->
              <div class="mt-8 flex items-center justify-center">
                <button type="submit" form="courseForm" class="inline-flex items-center px-6 py-3 border border-transparent text-base font-medium rounded-lg shadow-sm text-white bg-custom hover:bg-custom-600">
                  Enregistrer
                </button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </main>
    <script src="{{ asset('js/ajoutercoursscript.js') }}"></script>
    <script src="{{ asset('js/courseFormHandler.js') }}"></script>
  </body>
</html>