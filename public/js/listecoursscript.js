document.addEventListener('DOMContentLoaded', function () {
    console.log('DOM fully loaded and parsed.');

    // Sidebar toggle
    const menuToggle = document.getElementById('menuToggle');
    const sidebar = document.getElementById('sidebar');
    const mainContent = document.getElementById('main-content');

    if (menuToggle && sidebar && mainContent) {
        console.log('Sidebar toggle and main content found.');
        
        // Set initial state
        let isSidebarVisible = true;
        
        menuToggle.addEventListener('click', function () {
            isSidebarVisible = !isSidebarVisible;
            
            if (isSidebarVisible) {
                sidebar.classList.remove('-translate-x-full');
                mainContent.classList.remove('pl-0');
                mainContent.classList.add('pl-64');
            } else {
                sidebar.classList.add('-translate-x-full');
                mainContent.classList.add('pl-0');
                mainContent.classList.remove('pl-64');
            }
            console.log('Sidebar toggled.');
        });
    } else {
        console.error('Sidebar elements or toggle button not found.');
    }

    // Toggle submenu for "Cours" - Fixed version
    const coursButton = document.getElementById('coursButton');
    const coursSubmenu = document.getElementById('coursSubmenu');
    const coursChevron = document.getElementById('coursChevron');

    if (coursButton && coursSubmenu && coursChevron) {
        console.log('Cours elements found, setting up click handler');
        
        // Show initial state
        coursSubmenu.style.display = 'none';
        
        coursButton.addEventListener('click', function (e) {
            e.preventDefault();
            e.stopPropagation();
            
            // Toggle display instead of using classList
            if (coursSubmenu.style.display === 'none') {
                coursSubmenu.style.display = 'block';
                coursChevron.classList.add('rotate-180');
            } else {
                coursSubmenu.style.display = 'none';
                coursChevron.classList.remove('rotate-180');
            }
            
            console.log('Cours submenu toggled:', coursSubmenu.style.display);
        });
    } else {
        console.error('One or more Cours elements not found');
    }

    // Toggle course modules
    const toggleModuleButtons = document.querySelectorAll('.toggle-modules');
    if (toggleModuleButtons.length > 0) {
        console.log(`${toggleModuleButtons.length} toggle-modules buttons found.`);
        toggleModuleButtons.forEach(button => {
            button.addEventListener('click', function () {
                const courseId = this.getAttribute('data-course-id');
                console.log(`Toggle button clicked for course ID: ${courseId}`);
                const moduleContent = document.getElementById(`modules-${courseId}`);
                
                if (moduleContent) {
                    moduleContent.classList.toggle('hidden');
                    this.textContent = moduleContent.classList.contains('hidden') 
                        ? 'Voir le contenu' 
                        : 'Masquer le contenu';
                    console.log(`Module content toggled for course ID: ${courseId}`);
                } else {
                    console.error(`Module content with ID modules-${courseId} not found.`);
                }
            });
        });
    } else {
        console.error('No toggle-modules buttons found.');
    }

    // Add hover effect to course cards
    const courseCards = document.querySelectorAll('.course-card');
    if (courseCards.length > 0) {
        console.log(`${courseCards.length} course cards found.`);
        courseCards.forEach(card => {
            card.addEventListener('mouseenter', function () {
                this.classList.add('transform', 'scale-105', 'transition-transform');
                console.log('Course card hover effect applied.');
            });

            card.addEventListener('mouseleave', function () {
                this.classList.remove('transform', 'scale-105');
                console.log('Course card hover effect removed.');
            });
        });
    } else {
        console.error('No course cards found.');
    }
});
