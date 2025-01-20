document.addEventListener('DOMContentLoaded', function() {
    const menuToggle = document.getElementById('menuToggle');
    const sidebar = document.getElementById('sidebar');
    const mainContent = document.getElementById('main-content');

    if (menuToggle && sidebar && mainContent) {
        menuToggle.addEventListener('click', function() {
            const isHidden = !sidebar.classList.contains('-translate-x-full');
            
            if (isHidden) {
                sidebar.classList.add('-translate-x-full');
                mainContent.classList.remove('pl-64');
            } else {
                sidebar.classList.remove('-translate-x-full');
                mainContent.classList.add('pl-64');
            }
        });
    }

    // Toggle submenu for "Cours"
    const coursButton = document.getElementById('coursButton');
    const coursSubmenu = document.getElementById('coursSubmenu');
    const coursChevron = document.getElementById('coursChevron');
    
    if (coursButton && coursSubmenu && coursChevron) {
        coursButton.addEventListener('click', function() {
            coursSubmenu.classList.toggle('hidden');
            coursChevron.classList.toggle('rotate-180');
        });
    }
});
