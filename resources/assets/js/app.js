var toolbarOptions = [
    ['bold', 'italic'],
    ['blockquote'],
    [{ 'header': 1 }, { 'header': 2 }],
    [{ 'list': 'ordered'}, { 'list': 'bullet' }],
    [{ 'color': [] }],        
    ['clean']
];

if (document.getElementById('changelog_index') !== null) {
    chaptersBeforeEdit = JSON.parse(JSON.stringify(chapters));

    // form
    let form = document.getElementById("form");

    // Current state: edit/view
    let edit = false;
    
    // Change log container
    let changelogEle = document.querySelector('[data-changelog-container]');

    // Edit button
    let editButton = document.querySelector('[data-edit-button]');

    // Cancel button
    let cancelButton = document.querySelector('[data-cancel-button]');

    // Save button
    let saveButton = document.querySelector('[data-save-button]');

    // New button
    let newButton = document.querySelector('[data-new-button]');

    function draw()
    {
        changelogEle.innerHTML = '';
        

        document.getElementById('new_chapter_button').style.display = (edit ? 'none' : 'block');

        for (let index in chapters) {
            let chapter = chapters[index];

            // Create chapter element
            let chapterEle = document.createElement('div');
            chapterEle.classList.add('changelog-chapter');
            chapterEle.id = 'chapter' + chapter.id;
            changelogEle.appendChild(chapterEle);
            

            // Create id hidden
            if ('id' in chapter) {
                let idEle = document.createElement('input');
                idEle.name = 'chapters[' + index + '][id]';
                idEle.value = chapter.id;
                idEle.type = 'hidden';
                chapterEle.appendChild(idEle);
            }

            // Create title
            let titleEle = document.createElement('H2');
            titleEle['innerHTML'] = chapter.title;
            titleEle.classList.add('edit-title');
            chapterEle.appendChild(titleEle);

            // Create edit button
            if (! edit){
                let buttonEle = document.createElement('a');
                buttonEle.innerHTML = 'Wijzigen';
                buttonEle.href = '/changelog/' + chapter.id;
                buttonEle.classList.add('title-button');
                chapterEle.appendChild(buttonEle);
            }

            // Create editor
            let editorEle = document.createElement('div');
            editorEle.innerHTML = chapter.body;
            chapterEle.appendChild(editorEle);

            let editor = new Quill(editorEle, {
                modules: {
                    toolbar: toolbarOptions
                },
                placeholder: 'Inhoud...',
                theme: 'bubble'
            });

            editor.enable(false);
        }

        cancelButton.style.display = (edit ? 'inline-block' : 'none');
        editButton.style.display = (edit ? 'none' : 'inline-block');
        saveButton.style.display = (edit ? 'inline-block' : 'none');
    }

    draw();


    function toggleEdit()
    {
        edit = (! edit);

        if (! edit) {
            chapters = chaptersBeforeEdit;
            chaptersBeforeEdit = JSON.parse(JSON.stringify(chapters));
        }
        draw();
    }

    editButton.addEventListener('mouseup', function(){toggleEdit();});
    cancelButton.addEventListener('mouseup', function(){toggleEdit();});
    saveButton.addEventListener('mouseup', function(){form.submit();})
}

if (document.getElementById('changelog_edit') !== null) {

    let editorEle = document.getElementById('body_text');

    let editor = new Quill(editorEle, {
        modules: {
            toolbar: toolbarOptions
        },
        placeholder: 'Inhoud...',
        theme: 'bubble',
        scrollingContainer: document.documentElement
    });

    let bodyInput = document.getElementById('body_input');

    editor.on('text-change', function(delta, oldDelta, source){
        bodyInput.value = editorEle.querySelector('.ql-editor').innerHTML;
    });

    editor.enable(true);

    window.deleteChapter = function(data) {
        var r = confirm("Weet je zeker dat je dit hoofdstuk wilt verwijderen?");
        if (r == true) {
            window.location.href = data.href;
        }
    }

    window.cancel = function(data) {
        var r = confirm("Weet je zeker dat je terug wilt gaan zonder op te slaan?");
        if (r == true) {
            window.location.href = data.href;
        }
    }
}
