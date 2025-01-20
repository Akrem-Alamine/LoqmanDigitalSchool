document.addEventListener('DOMContentLoaded', function () {
    // Sidebar toggle
    const menuToggle = document.getElementById('menuToggle');
    const sidebar = document.getElementById('sidebar');
    const mainContent = document.getElementById('main-content');

    if (menuToggle && sidebar && mainContent) {
        let isSidebarVisible = true;
        
        menuToggle.addEventListener('click', function () {
            isSidebarVisible = !isSidebarVisible;
            
            if (!isSidebarVisible) {
                sidebar.classList.add('-translate-x-full');
                mainContent.classList.remove('pl-64');
                mainContent.classList.add('pl-0');
            } else {
                sidebar.classList.remove('-translate-x-full');
                mainContent.classList.remove('pl-0');
                mainContent.classList.add('pl-64');
            }
        });
    }

    // Toggle submenu for "Cours"
    const coursButton = document.getElementById('coursButton');
    const coursSubmenu = document.getElementById('coursSubmenu');
    const coursChevron = document.getElementById('coursChevron');
    coursButton.addEventListener('click', function () {
        coursSubmenu.classList.toggle('hidden');
        coursChevron.classList.toggle('rotate-180'); // Rotate the chevron icon
    });

    // Expand/Collapse sections
    document.querySelectorAll('.toggle-section').forEach((toggle) => {
        toggle.addEventListener('click', function () {
            const targetId = this.getAttribute('data-target');
            const target = document.getElementById(targetId);
            const icon = this.querySelector('.fa-chevron-down');
            
            if (target && icon) {
                target.classList.toggle('hidden');
                icon.style.transform = target.classList.contains('hidden') 
                    ? 'rotate(0deg)' 
                    : 'rotate(180deg)';
            }
        });
    });

    // Remove auto-expand functionality
    // The rest of the initialization code remains unchanged
});

let moduleCount = 0;
let lessonUniqueId = 0; // Add this at the top with moduleCount

function addModule(event) {
    event.preventDefault();
    moduleCount++;
    const modulesContainer = document.getElementById('modules');
    const moduleHTML = `
    <div class="border rounded-lg p-4 space-y-4 module">
        <div class="flex items-center justify-between">
        <div class="flex-1 mr-4">
            <input type="text" 
                class="module-title-input w-full border-gray-300 shadow-sm rounded-lg"
                placeholder="Titre du module"
                value="Module ${moduleCount}"
                required>
        </div>
        <button class="text-gray-400 hover:text-gray-500" onclick="removeModule(this)">
            <i class="fas fa-times"></i>
        </button>
        </div>
        <button class="inline-flex items-center px-3 py-1.5 border border-gray-300 text-sm font-medium rounded-lg text-gray-700 bg-white hover:bg-gray-50" onclick="addChapter(event, this)">
        <i class="fas fa-plus mr-2"></i>Ajouter un Chapitre
        </button>
        <div class="space-y-3 chapter-container"></div>
    </div>`;
    modulesContainer.insertAdjacentHTML('beforeend', moduleHTML);
}

function addChapter(event, moduleButton) {
    event.preventDefault();
    const chapterContainer = moduleButton.nextElementSibling;
    const chapters = chapterContainer.querySelectorAll('.chapter');
    const chapterCount = chapters.length + 1;
    const chapterHTML = `
    <div class="border-l-2 pl-4 space-y-3 chapter">
        <div class="flex items-center justify-between">
        <div class="flex-1 mr-4">
            <input type="text" 
                class="chapter-title-input w-full border-gray-300 shadow-sm rounded-lg"
                placeholder="Titre du chapitre"
                value="Chapitre ${chapterCount}"
                required>
        </div>
        <button class="text-gray-400 hover:text-gray-500" onclick="removeChapter(this)">
            <i class="fas fa-times"></i>
        </button>
        </div>
        <button class="inline-flex items-center px-3 py-1.5 border border-gray-300 text-sm font-medium rounded-lg text-gray-700 bg-white hover:bg-gray-50" onclick="addLesson(event, this)">
        <i class="fas fa-plus mr-2"></i>Ajouter une Leçon
        </button>
        <div class="space-y-2 lesson-container"></div>
    </div>`;
    chapterContainer.insertAdjacentHTML('beforeend', chapterHTML);
}

function addLesson(event, chapterButton) {
    event.preventDefault();
    const lessonContainer = chapterButton.nextElementSibling;
    const lessons = lessonContainer.querySelectorAll('.lesson');
    const lessonCount = lessons.length + 1;
    lessonUniqueId++; 
    const currentLessonId = `lesson-${lessonUniqueId}`; 

    const lessonHTML = `
    <div class="border rounded-lg p-4 space-y-4 lesson" id="${currentLessonId}">
        <div class="flex items-center justify-between">
            <div class="flex-1 mr-4">
                <input type="text" 
                    class="lesson-title-input w-full border-gray-300 shadow-sm rounded-lg"
                    name="lessons[${currentLessonId}][title]"
                    placeholder="Titre de la leçon"
                    value="Leçon ${lessonCount}"
                    required>
            </div>
            <button class="text-gray-400 hover:text-gray-500" onclick="removeLesson(this)">
                <i class="fas fa-times"></i>
            </button>
        </div>
        <div class="space-y-4">
            <!-- Type -->
            <div>
                <label class="block text-sm font-medium text-gray-700">Type *</label>
                <select class="lesson-type mt-1 block w-full border-gray-300 shadow-sm rounded-lg" 
                        name="lessons[${currentLessonId}][type]"
                        data-lesson-id="${currentLessonId}"
                        onchange="handleLessonTypeChange(this)">
                    <option value="pdf">PDF</option>
                    <option value="video">Vidéo</option>
                </select>
            </div>

            <!-- Lien (Link) -->
            <div class="link-input-${currentLessonId} hidden">
                <label class="block text-sm font-medium text-gray-700">Lien *</label>
                <input type="url" 
                       name="lessons[${currentLessonId}][link]"
                       class="mt-1 block w-full border-gray-300 shadow-sm rounded-lg" 
                       placeholder="https://example.com" />
            </div>

            <!-- Durée (Duration) -->
            <div class="duration-input-${currentLessonId} hidden">
                <label class="block text-sm font-medium text-gray-700">Durée (minutes) *</label>
                <input type="number" 
                       name="lessons[${currentLessonId}][duration]"
                       class="mt-1 block w-full border-gray-300 shadow-sm rounded-lg" 
                       placeholder="Entrez la durée" />
            </div>

            <!-- Fichier -->
            <div class="file-input-${currentLessonId}">
                <label class="block text-sm font-medium text-gray-700">Fichier *</label>
                <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-lg">
                    <div class="space-y-1 text-center">
                        <i class="fas fa-cloud-upload-alt text-gray-400 text-3xl"></i>
                        <div class="flex text-sm text-gray-600">
                            <label class="relative cursor-pointer bg-white rounded-lg font-medium text-custom hover:text-custom-600">
                                <span>Télécharger un fichier</span>
                                <input type="file" 
                                       name="lessons[${currentLessonId}][file]"
                                       class="sr-only" />
                            </label>
                        </div>
                        <p class="text-xs text-gray-500">PDF, MP4 jusqu'à 10MB</p>
                    </div>
                </div>
            </div>

            <!-- Gratuit -->
            <div class="flex items-center">
                <input type="checkbox" 
                       name="lessons[${currentLessonId}][free]"
                       id="gratuit-${currentLessonId}" 
                       class="h-4 w-4 text-custom border-gray-300 rounded focus:ring-custom">
                <label for="gratuit-${currentLessonId}" 
                       class="ml-2 block text-sm text-gray-700">Gratuit</label>
            </div>
        </div>
    </div>`;

    lessonContainer.insertAdjacentHTML('beforeend', lessonHTML);
}

function removeModule(button) {
    const module = button.closest('.module');
    module.remove();
    moduleCount--; // Decrement global module count
    updateModuleNumbers();
}

function removeChapter(button) {
    const chapter = button.closest('.chapter');
    const chapterContainer = chapter.parentElement;
    chapter.remove();
    updateChapterNumbers(chapterContainer);
}

function removeLesson(button) {
    const lesson = button.closest('.lesson');
    const lessonContainer = lesson.parentElement;
    lesson.remove();
    updateLessonNumbers(lessonContainer);
}

function updateModuleNumbers() {
    document.querySelectorAll('.module').forEach((module, index) => {
        const titleInput = module.querySelector('.module-title-input');
        if (titleInput && !titleInput.value) {
            titleInput.value = `Module ${index + 1}`;
        }
    });
}

function updateChapterNumbers(chapterContainer) {
    chapterContainer.querySelectorAll('.chapter').forEach((chapter, index) => {
        const titleInput = chapter.querySelector('.chapter-title-input');
        if (titleInput && !titleInput.value) {
            titleInput.value = `Chapitre ${index + 1}`;
        }
    });
}

function updateLessonNumbers(lessonContainer) {
    lessonContainer.querySelectorAll('.lesson').forEach((lesson, index) => {
        const titleInput = lesson.querySelector('.lesson-title-input');
        if (titleInput && !titleInput.value) {
            titleInput.value = `Leçon ${index + 1}`;
        }
    });
}

function handleLessonTypeChange(selectElement) {
    const lessonId = selectElement.getAttribute('data-lesson-id');
    const durationInput = document.querySelector(`.duration-input-${lessonId}`);
    const linkInput = document.querySelector(`.link-input-${lessonId}`);
    const fileInput = document.querySelector(`.file-input-${lessonId}`);
    
    if (selectElement.value === 'video') {
        durationInput.classList.remove('hidden');
        linkInput.classList.remove('hidden');
        fileInput.classList.add('hidden');
    } else {
        durationInput.classList.add('hidden');
        linkInput.classList.add('hidden');
        fileInput.classList.remove('hidden');
    }
}