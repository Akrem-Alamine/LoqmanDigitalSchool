function collectModuleData() {
    const modules = [];
    const moduleElements = document.querySelectorAll('.module');
    
    moduleElements.forEach((moduleEl) => {
        const moduleTitleInput = moduleEl.querySelector('.module-title-input');
        const module = {
            title: moduleTitleInput ? moduleTitleInput.value : 'Untitled Module',
            chapters: []
        };

        const chapterElements = moduleEl.querySelectorAll('.chapter');
        chapterElements.forEach((chapterEl) => {
            const chapterTitleInput = chapterEl.querySelector('.chapter-title-input');
            const chapter = {
                title: chapterTitleInput ? chapterTitleInput.value : 'Untitled Chapter',
                lessons: []
            };

            const lessonElements = chapterEl.querySelectorAll('.lesson');
            lessonElements.forEach((lessonEl) => {
                const lessonTitleInput = lessonEl.querySelector('.lesson-title-input');
                if (lessonTitleInput) {
                    chapter.lessons.push({
                        title: lessonTitleInput.value || 'Untitled Lesson'
                    });
                }
            });

            module.chapters.push(chapter);
        });

        modules.push(module);
    });
    
    return modules;
}

const form = document.getElementById('courseForm');
if (form) {
    const newForm = form.cloneNode(true);
    form.parentNode.replaceChild(newForm, form);

    newForm.addEventListener('submit', function(event) {
        event.preventDefault();
        const formData = new FormData(this);
        
        try {
            const modules = collectModuleData();
            formData.delete('modules');
            formData.append('modules', JSON.stringify(modules));

            fetch('/courses/store', {
                method: 'POST',
                headers: {
                    'X-Requested-With': 'XMLHttpRequest',
                    'Accept': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
                body: formData
            })
            .then(response => {
                if (!response.ok) {
                    return response.text().then(text => {
                        console.error('Server response:', text);
                        const errorData = JSON.parse(text);
                        throw new Error(errorData.message || 'Server error');
                    });
                }
                return response.json();
            })
            .then(data => {
                alert('Course saved successfully!');
            })
            .catch(error => {
                console.error('Error:', error);
                alert(error.message || 'An error occurred while saving the course');
            });
        } catch (error) {
            console.error('Error collecting module data:', error);
            alert('An error occurred while preparing the course data');
        }
    });
}
