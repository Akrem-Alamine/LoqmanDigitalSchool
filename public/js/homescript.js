function toggleSection(contentId, icon) {
  const content = document.getElementById(contentId);
  if (content) {
    content.classList.toggle('hidden');
    if (icon) {
      icon.style.transform = content.classList.contains('hidden') ? 'rotate(0deg)' : 'rotate(180deg)';
    }
  }
}

function addLesson(chapter) {
  const lessonsContainer = chapter.querySelector('.lessons-container');
  const lessonHTML = `
      
      
      <div class='lesson'>
          <input type='text' class='w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-custom focus:border-custom' placeholder='Titre de la leçon'/>
      </div>`;
  lessonsContainer.insertAdjacentHTML('beforeend', lessonHTML);
}

function addChapter(module) {
  const chaptersContainer = module.querySelector('.chapters-container');
  const chapterCount = chaptersContainer.children.length + 1;
  const chapterHTML = `
      
      
      <div class='chapter bg-white p-4 rounded-lg'>
          <div class='flex items-center justify-between mb-2'>
              <h4 class='font-medium'>Chapitre ${chapterCount}</h4>
              <button type='button' class='text-custom hover:text-custom-dark' onclick='addLesson(this.closest(".chapter"))'>
                  <i class='fas fa-plus'></i> Ajouter leçon
              
              
              </button>
          </div>
          <div class='lessons-container space-y-2 pl-4'></div>
      </div>`;
  chaptersContainer.insertAdjacentHTML('beforeend', chapterHTML);
}

function addModule() {
  const modulesContainer = document.querySelector('.modules-container');
  const moduleCount = modulesContainer.children.length + 1;
  const moduleHTML = `
      
      
      <div class='module bg-gray-50 p-4 rounded-lg'>
          <div class='flex items-center justify-between mb-4'>
              <h3 class='text-lg font-medium'>Module ${moduleCount}</h3>
              <button type='button' class='text-custom hover:text-custom-dark' onclick='addChapter(this.closest(".module"))'>
                  <i class='fas fa-plus'></i> Ajouter chapitre
              
              
              </button>
          </div>
          <div class='chapters-container space-y-4 pl-4'></div>
      </div>`;
  modulesContainer.insertAdjacentHTML('beforeend', moduleHTML);
}

function toggleSidebar() {
  const sidebar = document.getElementById('sidebar');
  const mainContent = document.getElementById('main-content');
  sidebar.classList.toggle('-translate-x-full'); // Toggles visibility of the sidebar
  mainContent.classList.toggle('pl-64'); // Adjusts main content padding when sidebar is visible
}
document.addEventListener('DOMContentLoaded', function() {
  const menuToggle = document.getElementById('menuToggle');
  const sidebar = document.getElementById('sidebar');
  const mainContent = document.getElementById('main-content');
  const pageContent = document.getElementById('page-content');
  menuToggle.addEventListener('click', function() {
    sidebar.classList.toggle('-translate-x-full');
    mainContent.classList.toggle('pl-64');
  });
  const coursButton = document.querySelector('[data-submenu="cours"]');
  if (coursButton) {
    coursButton.addEventListener('click', function() {
      const submenu = this.nextElementSibling;
      const icon = this.querySelector('.fa-chevron-right');
      submenu.classList.toggle('hidden');
      icon.classList.toggle('rotate-90');
    });
  }

  function loadTemplate(templateId) {
    const template = document.getElementById(templateId);
    if (template) {
      pageContent.innerHTML = template.innerHTML;
      if (templateId === 'ajouter-cours-template') {
        // Initialize any specific logic for Ajouter cours
      }
    }
  }
  document.querySelectorAll('.nav-link').forEach(link => {
    link.addEventListener('click', function(e) {
      e.preventDefault();
      const page = this.dataset.page;
      if (page) {
        loadTemplate(page + '-template');
      } else {
        const href = this.getAttribute('href');
        if (href) {
          window.location.href = href; // Redirect to the appropriate route
        }
      }
    });
  });

  function initCharts() {
    if (document.getElementById('inscriptions-chart') && document.getElementById('cours-chart')) {
      const inscriptionsChart = echarts.init(document.getElementById('inscriptions-chart'));
      const coursChart = echarts.init(document.getElementById('cours-chart'));
    }
  }
  loadTemplate('accueil-template');
});
document.addEventListener('DOMContentLoaded', function() {
  const menuToggle = document.getElementById('menuToggle');
  const sidebar = document.getElementById('sidebar');
  const mainContent = document.getElementById('main-content');
  menuToggle.addEventListener('click', toggleSidebar);
  // Ensure initial state based on screen size
  if (window.innerWidth < 768) {
    sidebar.classList.add('-translate-x-full'); // Sidebar hidden for small screens
    mainContent.classList.remove('pl-64'); // Remove padding for small screens
  } else {
    sidebar.classList.remove('-translate-x-full'); // Sidebar visible for large screens
    mainContent.classList.add('pl-64'); // Add padding for large screens
  }
  // Adjust behavior on window resize
  window.addEventListener('resize', function() {
    if (window.innerWidth < 768) {
      sidebar.classList.add('-translate-x-full');
      mainContent.classList.remove('pl-64');
    } else {
      sidebar.classList.remove('-translate-x-full');
      mainContent.classList.add('pl-64');
    }
  });
});